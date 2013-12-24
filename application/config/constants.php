<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SHA_SECRET',							'OraNgerti');

define('KENDARAAN',								'kendaraan');
define('JENIS_LEASING',							'jenis_leasing');
define('JENIS_PEMBAYARAN',						'jenis_pembayaran');
define('JENIS_UNIT',							'jenis_unit');
define('JENIS_WAKTU_KREDIT',					'jenis_waktu_kredit');
define('JENIS_WARNA',							'jenis_warna');
define('PAGE_STATIC',							'page_static');
define('PENJUALAN',								'penjualan');
define('USER',									'user');
define('USER_TYPE',								'user_type');