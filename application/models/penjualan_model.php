<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan_model extends CI_Model {
    function __construct() {
        parent::__construct();
		
        $this->field = array(
			'id', 'sales_id', 'jenis_unit_id', 'jenis_warna_id', 'jenis_leasing_id', 'jenis_angsuran_id', 'jenis_pembayaran_id', 'status_penjualan_id', 'name', 'nik',
			'phone', 'birth_date', 'discount', 'dp_customer', 'dp_gross', 'sub', 'is_deliver', 'order_date', 'admin_id', 'user_delivery_id'
		);
    }

    function update($param) {
        $result = array();
       
        if (empty($param['id'])) {
            $insert_query  = GenerateInsertQuery($this->field, $param, PENJUALAN);
            $insert_result = mysql_query($insert_query) or die(mysql_error());
           
            $result['id'] = mysql_insert_id();
            $result['status'] = '1';
            $result['message'] = 'Data berhasil disimpan.';
        } else {
            $update_query  = GenerateUpdateQuery($this->field, $param, PENJUALAN);
            $update_result = mysql_query($update_query) or die(mysql_error());
           
            $result['id'] = $param['id'];
            $result['status'] = '1';
            $result['message'] = 'Data berhasil diperbaharui.';
        }
       
        return $result;
    }
	
    function get_by_id($param) {
        $array = array();
       
        if (isset($param['id'])) {
            $select_query  = "SELECT * FROM ".PENJUALAN." WHERE id = '".$param['id']."' LIMIT 1";
        } 
		
        $select_result = mysql_query($select_query) or die(mysql_error());
        if (false !== $row = mysql_fetch_assoc($select_result)) {
            $array = $this->sync($row);
        }
       
        return $array;
    }
	
    function get_array($param = array()) {
        $array = array();
		
		$param['field_replace']['jenis_unit_name'] = 'JenisUnit.name';
		$param['field_replace']['order_date_swap'] = 'Penjualan.order_date';
		
		$string_filter = GetStringFilter($param, @$param['column']);
		$string_sorting = GetStringSorting($param, @$param['column'], 'order_date DESC');
		$string_limit = GetStringLimit($param);

		// additional sort
		if (strtoupper($string_sorting) == strtoupper('Penjualan.order_date desc')) {
			$string_sorting = 'Penjualan.order_date DESC, Penjualan.id DESC';
		} else if (strtoupper($string_sorting) == strtoupper('Penjualan.order_date asc')) {
			$string_sorting = 'Penjualan.order_date ASC, Penjualan.id ASC';
		}
		
		$select_query = "
			SELECT SQL_CALC_FOUND_ROWS Penjualan.*,
				User.fullname sales_name, JenisUnit.name jenis_unit_name, JenisPembayaran.name jenis_pembayaran_name,
				StatusPenjualan.name status_penjualan_name
			FROM ".PENJUALAN." Penjualan
			LEFT JOIN ".USER." User ON User.id = Penjualan.sales_id
			LEFT JOIN ".JENIS_UNIT." JenisUnit ON JenisUnit.id = Penjualan.jenis_unit_id
			LEFT JOIN ".JENIS_PEMBAYARAN." JenisPembayaran ON JenisPembayaran.id = Penjualan.jenis_pembayaran_id
			LEFT JOIN ".STATUS_PENJUALAN." StatusPenjualan ON StatusPenjualan.id = Penjualan.status_penjualan_id
			WHERE 1 $string_filter
			ORDER BY $string_sorting
			LIMIT $string_limit
		";
		
        $select_result = mysql_query($select_query) or die(mysql_error());
		while ( $row = mysql_fetch_assoc( $select_result ) ) {
			$array[] = $this->sync($row, $param);
		}
		
        return $array;
    }

    function get_count($param = array()) {
		$select_query = "SELECT FOUND_ROWS() TotalRecord";
		$select_result = mysql_query($select_query) or die(mysql_error());
		$row = mysql_fetch_assoc($select_result);
		$TotalRecord = $row['TotalRecord'];
		
		return $TotalRecord;
    }
	
	function get_rekap_penjualan($param = array()) {
		$array = array();
		
		$select_query = "
			SELECT JenisUnit.name jenis_unit_name,
				(	SELECT COUNT(*)
					FROM ".PENJUALAN." PenjualanKredit
					WHERE
						PenjualanKredit.jenis_unit_id = Penjualan.jenis_unit_id
						AND PenjualanKredit.jenis_pembayaran_id = '".JENIS_PEMBAYARAN_KREDIT."'
						AND PenjualanKredit.status_penjualan_id = '".STATUS_PENJUALAN_DITERIMA."'
						AND PenjualanKredit.order_date >= '".$param['date_start']."'
						AND PenjualanKredit.order_date <= '".$param['date_end']."'
				) kredit,
				(	SELECT COUNT(*)
					FROM ".PENJUALAN." PenjualanTunai
					WHERE
						PenjualanTunai.jenis_unit_id = Penjualan.jenis_unit_id
						AND PenjualanTunai.jenis_pembayaran_id = '".JENIS_PEMBAYARAN_TUNAI."'
						AND PenjualanTunai.status_penjualan_id = '".STATUS_PENJUALAN_DITERIMA."'
						AND PenjualanTunai.order_date >= '".$param['date_start']."'
						AND PenjualanTunai.order_date <= '".$param['date_end']."'
				) tunai
			FROM ".PENJUALAN." Penjualan
			LEFT JOIN ".JENIS_UNIT." JenisUnit ON JenisUnit.id = Penjualan.jenis_unit_id
			WHERE
				Penjualan.status_penjualan_id = '".STATUS_PENJUALAN_DITERIMA."'
				AND Penjualan.order_date >= '".$param['date_start']."'
				AND Penjualan.order_date <= '".$param['date_end']."'
			GROUP BY JenisUnit.name
			ORDER BY JenisUnit.name ASC
			LIMIT 25
		";
		
        $select_result = mysql_query($select_query) or die(mysql_error());
		while ( $row = mysql_fetch_assoc( $select_result ) ) {
			$array[] = $row;
		}
		
        return $array;
    }
	
	function get_rekap_sales($param = array()) {
		$array = array();
		
		$select_query = "
			SELECT User.fullname label, COUNT(*) value
			FROM ".PENJUALAN." Penjualan
			LEFT JOIN ".USER." User ON User.id = Penjualan.sales_id
			LEFT JOIN ".JENIS_UNIT." JenisUnit ON JenisUnit.id = Penjualan.jenis_unit_id
			WHERE
				Penjualan.status_penjualan_id = '".STATUS_PENJUALAN_DITERIMA."'
				AND Penjualan.order_date >= '".$param['date_start']."'
				AND Penjualan.order_date <= '".$param['date_end']."'
			GROUP BY User.fullname
			ORDER BY User.fullname ASC
			LIMIT 25
		";
        $select_result = mysql_query($select_query) or die(mysql_error());
		while ( $row = mysql_fetch_assoc( $select_result ) ) {
			$array[] = $row;
		}
		
        return $array;
    }
	
    function delete($param) {
		$delete_query  = "DELETE FROM ".PENJUALAN." WHERE id = '".$param['id']."' LIMIT 1";
		$delete_result = mysql_query($delete_query) or die(mysql_error());
		
		$result['status'] = '1';
		$result['message'] = 'Data berhasil dihapus.';

        return $result;
    }
	
	function sync($row, $param = array()) {
		$row = StripArray($row, array( ));
		$row['order_date_swap'] = ExchangeFormatDate($row['order_date']);
		
		// status penjualan
		if ($row['status_penjualan_id'] == STATUS_PENJUALAN_DITERIMA) {
			$row['status_penjualan_name'] .= (empty($row['is_deliver'])) ? '' : ' - Terkirim';
		}
		
		if (count(@$param['column']) > 0) {
			// generate button
			if (!empty($param['kredit_penjualan_grid'])) {
				$param['is_custom']  = '<button class="btn btn-xs btn-edit btn-success"><i class="fa fa-pencil"></i></button> ';
				
				// approve / reject button
				if (@$param['user_type_id'] == USER_ID_ADMINISTRATOR && $row['status_penjualan_id'] == STATUS_PENJUALAN_PENDING) {
					$param['is_custom'] .= '<button class="btn btn-xs btn-approve btn-success"><i class="fa fa-check"></i></button> ';
					$param['is_custom'] .= '<button class="btn btn-xs btn-reject btn-warning"><i class="fa fa-adjust"></i></button> ';
				}
				
				// delivery button
				if (@$param['user_type_id'] == USER_ID_ADMINISTRATOR && $row['status_penjualan_id'] == STATUS_PENJUALAN_DITERIMA && empty($row['is_deliver'])) {
					$param['is_custom'] .= '<button class="btn btn-xs btn-delivery btn-success"><i class="fa fa-envelope"></i></button> ';
				}
				
				// delete button
				if($row['status_penjualan_id'] == STATUS_PENJUALAN_PENDING) {
					$param['is_custom'] .= '<button class="btn btn-xs btn-delete btn-danger"><i class="fa fa-times"></i></button> ';
				}
			}
			
			$row = dt_view_set($row, $param);
		}
		
		return $row;
	}
}