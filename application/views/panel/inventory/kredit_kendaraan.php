<?php
	$user = $this->User_model->get_session();
	$array_jenis_unit = $this->Jenis_Unit_model->get_array();
	$array_jenis_warna = $this->Jenis_Warna_model->get_array();
	$array_jenis_leasing = $this->Jenis_Leasing_model->get_array();
	$array_jenis_angsuran = $this->Jenis_Angsuran_model->get_array();
	$array_jenis_pembayaran = $this->Jenis_Pembayaran_model->get_array();
	
	$page_data['user_id'] = $user['id'];
	$page_data['STATUS_PENJUALAN_PENDING'] = STATUS_PENJUALAN_PENDING;
	$page_data['STATUS_PENJUALAN_DITOLAK'] = STATUS_PENJUALAN_DITOLAK;
?>
<?php $this->load->view( 'panel/common/meta', array( 'title' => 'Kredit Kendaraan' ) ); ?>
<body>
<?php $this->load->view( 'panel/common/header'); ?>

<div class="content">
	<?php $this->load->view( 'panel/common/sidebar'); ?>
	<div class="hide cnt-data"><?php echo json_encode($page_data); ?></div>
	
  	<div class="mainbar">
	    <div class="page-head">
			<h2 class="pull-left">Kredit Kendaraan</h2>
			<div class="clearfix"></div>
		</div>
		
	    <div class="matter"><div class="container">
            <div class="row"><div class="col-md-12">
				
				<div class="widget grid-main">
					<div class="widget-head">
						<div class="pull-left">
							<button class="btn btn-info btn-xs btn-add-kredit-kendaraan">Tambah</button>
						</div>
						<div class="widget-icons pull-right">
							<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
							<a href="#" class="wclose"><i class="fa fa-times"></i></a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="widget-content">
						<table id="datatable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Sales</th>
									<th>Jenis Unit</th>
									<th>Jenis Pembayaran</th>
									<th>Tanggal Order</th>
									<th>Status Penjualan</th>
									<th>Control</th></tr>
							</thead>
							<tbody></tbody>
						</table>
						
						<div class="widget-foot">
							<br /><br />
							<div class="clearfix"></div> 
						</div>
					</div>
				</div>
				
				<div class="widget hide" id="form-kredit-kendaraan">
					<div class="widget-head">
						<div class="pull-left">Form Kredit Kendaraan</div>
						<div class="widget-icons pull-right">
							<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
							<a href="#" class="wclose"><i class="fa fa-times"></i></a>
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="widget-content">
						<div class="padd"><form class="form-horizontal">
							<input type="hidden" name="action" value="update" />
							<input type="hidden" name="id" value="0" />
							
							<div class="form-group">
								<label class="col-lg-2 control-label">Jenis Unit</label>
								<div class="col-lg-10">
									<select class="form-control" name="jenis_unit_id">
										<?php echo ShowOption(array( 'Array' => $array_jenis_unit )); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jenis Warna</label>
								<div class="col-lg-10">
									<select class="form-control" name="jenis_warna_id">
										<?php echo ShowOption(array( 'Array' => $array_jenis_warna )); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jenis Pembayaran</label>
								<div class="col-lg-10">
									<select class="form-control" name="jenis_pembayaran_id">
										<?php echo ShowOption(array( 'Array' => $array_jenis_pembayaran )); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Lama Angsuran</label>
								<div class="col-lg-10">
									<select class="form-control" name="jenis_angsuran_id">
										<?php echo ShowOption(array( 'Array' => $array_jenis_angsuran )); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jenis Leasing</label>
								<div class="col-lg-10">
									<select class="form-control" name="jenis_leasing_id">
										<?php echo ShowOption(array( 'Array' => $array_jenis_leasing )); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Nama</label>
								<div class="col-lg-10">
									<input type="text" name="name" class="form-control" placeholder="Nama" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">NIK</label>
								<div class="col-lg-10">
									<input type="text" name="nik" class="form-control" placeholder="NIK" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Telepon / HP</label>
								<div class="col-lg-10">
									<input type="text" name="phone" class="form-control" placeholder="Telepon / HP" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Tanggal Lahir</label>
								<div class="col-lg-10">
									<div class="input-append datepicker">
										<input name="birth_date" type="text" class="form-control dtpicker" placeholder="Tanggal Lahir" data-format="dd-MM-yyyy" />
										<span class="add-on"><i data-time-icon="fa fa-time" data-date-icon="fa fa-calendar" class="btn btn-info"></i></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Potongan</label>
								<div class="col-lg-10">
									<input type="text" name="discount" class="form-control" placeholder="Potongan" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">DP Konsumen</label>
								<div class="col-lg-10">
									<input type="text" name="dp_customer" class="form-control" placeholder="DP Konsumen" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">DP Gros</label>
								<div class="col-lg-10">
									<input type="text" name="dp_gross" class="form-control" placeholder="DP Konsumen" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">SUB</label>
								<div class="col-lg-10">
									<input type="text" name="sub" class="form-control" placeholder="SUB" />
								</div>
							</div>
							<hr />
							<div class="form-group form-btn">
								<div class="col-lg-offset-2 col-lg-9">
									<button type="submit" class="btn btn-info">Save</button>
									<button type="button" class="btn btn-info btn-show-grid">Cancel</button>
								</div>
							</div>
						</form></div>
					</div>
				</div>  
				
			</div></div>
        </div></div>
    </div>
	<div class="clearfix"></div>
</div>

<?php $this->load->view( 'panel/common/footer' ); ?>
<?php $this->load->view( 'panel/common/library_js'); ?>

<script>
$(document).ready(function() {
	var dt = null;
	var page = {
		show_grid: function() {
			$('.grid-main').show();
			$('#form-kredit-kendaraan').hide();
		},
		show_form_kredit_kendaraan: function() {
			$('.grid-main').hide();
			$('#form-kredit-kendaraan').show();
		},
		init: function() {
			var temp = $('.cnt-data').html();
			eval('var data = ' + temp);
			page.data = data;
		}
	}
	
	// global
	$('.btn-show-grid').click(function() {
		page.show_grid();
	});
	
	// grid
	var param = {
		id: 'datatable', aaSorting: [[ 3, "DESC" ]],
		source: web.host + 'panel/inventory/kredit_kendaraan/grid',
		column: [ { }, { }, { }, { sClass: "center" }, { sClass: "center" }, { bSortable: false, sClass: "center", sWidth: "15%" } ],
		callback: function() {
			$('#datatable .btn-edit').click(function() {
				var raw_record = $(this).siblings('.hide').text();
				eval('var record = ' + raw_record);
				
				Func.ajax({ url: web.host + 'panel/inventory/kredit_kendaraan/action', param: { action: 'get_by_id', id: record.id }, callback: function(result) {
					
					$('#form-kredit-kendaraan [name="id"]').val(result.id);
					$('#form-kredit-kendaraan [name="jenis_unit_id"]').val(result.jenis_unit_id);
					$('#form-kredit-kendaraan [name="jenis_warna_id"]').val(result.jenis_warna_id);
					$('#form-kredit-kendaraan [name="jenis_pembayaran_id"]').val(result.jenis_pembayaran_id);
					$('#form-kredit-kendaraan [name="jenis_angsuran_id"]').val(result.jenis_angsuran_id);
					$('#form-kredit-kendaraan [name="jenis_leasing_id"]').val(result.jenis_leasing_id);
					$('#form-kredit-kendaraan [name="name"]').val(result.name);
					$('#form-kredit-kendaraan [name="nik"]').val(result.nik);
					$('#form-kredit-kendaraan [name="phone"]').val(result.phone);
					$('#form-kredit-kendaraan [name="birth_date"]').val(Func.SwapDate(result.birth_date));
					$('#form-kredit-kendaraan [name="discount"]').val(result.discount);
					$('#form-kredit-kendaraan [name="dp_customer"]').val(result.dp_customer);
					$('#form-kredit-kendaraan [name="dp_gross"]').val(result.dp_gross);
					$('#form-kredit-kendaraan [name="sub"]').val(result.sub);
					
					// editable only for pending status
					if (result.status_penjualan_id != page.data.STATUS_PENJUALAN_PENDING) {
						$('#form-kredit-kendaraan .form-btn [type="submit"]').hide();
					} else {
						$('#form-kredit-kendaraan .form-btn [type="submit"]').show();
					}
					
					page.show_form_kredit_kendaraan();
				} });
			});
			
			$('#datatable .btn-approve').click(function() {
				var raw_record = $(this).siblings('.hide').text();
				eval('var record = ' + raw_record);
				
				var param = {
					action: 'update_approve',
					id: record.id,
					order_date: record.order_date,
					jenis_unit_id: record.jenis_unit_id,
					jenis_warna_id: record.jenis_warna_id
				};
				Func.ajax({ url: web.host + 'panel/inventory/kredit_kendaraan/action', param: param, callback: function(result) {
					if (result.status == 1) {
						dt.reload();
						noty({ text: result.message, layout: 'topRight', type: 'success', timeout: 1500 });
					} else {
						noty({ text: result.message, layout: 'topRight', type: 'warning', timeout: 1500 });
					}
				} });
			});
			
			$('#datatable .btn-reject').click(function() {
				var raw_record = $(this).siblings('.hide').text();
				eval('var record = ' + raw_record);
				
				var param = {
					action: 'update',
					id: record.id,
					status_penjualan_id: page.data.STATUS_PENJUALAN_DITOLAK
				};
				Func.ajax({ url: web.host + 'panel/inventory/kredit_kendaraan/action', param: param, callback: function(result) {
					noty({ text: result.message, layout: 'topRight', type: 'success', timeout: 1500 });
					if (result.status == 1) {
						dt.reload();
					}
				} });
			});
			
			$('#datatable .btn-delivery').click(function() {
				var raw_record = $(this).siblings('.hide').text();
				eval('var record = ' + raw_record);
				
				var param = {
					action: 'update_delivery',
					id: record.id,
					is_deliver: 1
				};
				Func.ajax({ url: web.host + 'panel/inventory/kredit_kendaraan/action', param: param, callback: function(result) {
					noty({ text: result.message, layout: 'topRight', type: 'success', timeout: 1500 });
					if (result.status == 1) {
						dt.reload();
					}
				} });
			});
			
			$('#datatable .btn-delete').click(function() {
				var raw_record = $(this).siblings('.hide').text();
				eval('var record = ' + raw_record);
				
				if (record.status_penjualan_id == page.data.STATUS_PENJUALAN_PENDING) {
					Func.confirm_delete({
						data: { action: 'delete', id: record.id },
						url: web.host + 'panel/inventory/kredit_kendaraan/action', callback: function() { dt.reload(); }
					});
				} else {
					noty({ text: 'Data sudah diproses tidak dapat dihapus / diubah.', layout: 'topRight', type: 'success', timeout: 1500 });
				}
			});
		}
	}
	dt = Func.init_datatable(param);
	
	// form jenis leasing
	$('.btn-add-kredit-kendaraan').click(function() {
		page.show_form_kredit_kendaraan();
		$('#form-kredit-kendaraan form')[0].reset();
		$('#form-kredit-kendaraan [name="id"]').val(0);
		
		// show button
		$('#form-kredit-kendaraan .form-btn [type="submit"]').show();
	});
	$('#form-kredit-kendaraan form').validate({
		rules: {
			jenis_unit_id: { required: true },
			jenis_warna_id: { required: true },
			jenis_pembayaran_id: { required: true },
			name: { required: true },
			phone: { required: true },
			birth_date: { required: true }
		}
	});
	$('#form-kredit-kendaraan form').submit(function() {
		if (! $('#form-kredit-kendaraan form').valid()) {
			return false;
		}
		
		var param = Site.Form.GetValue('form-kredit-kendaraan');
		param.birth_date = Func.SwapDate(param.birth_date);
		Func.ajax({ url: web.host + 'panel/inventory/kredit_kendaraan/action', param: param, callback: function(result) {
			if (result.status == 1) {
				dt.reload();
				page.show_grid();
				$('#form-kredit-kendaraan form')[0].reset();
			}
		} });
		
		return false;
	});
	
	page.init();
});

function set_kredit() {
	$('[name="jenis_unit_id"]').val('13');
	$('[name="jenis_warna_id"]').val('2');
	$('[name="jenis_pembayaran_id"]').val('2');
	$('[name="jenis_angsuran_id"]').val('1');
	$('[name="jenis_leasing_id"]').val('4');
	$('[name="name"]').val('Pembeli No 1');
	$('[name="nik"]').val('NIK temp');
	$('[name="phone"]').val('0341');
	$('[name="birth_date"]').val('15-12-2013');
	$('[name="discount"]').val('0');
	$('[name="dp_customer"]').val('1000000');
	$('[name="dp_gross"]').val('100000');
	$('[name="sub"]').val('0');
}
</script>
</body>
</html>