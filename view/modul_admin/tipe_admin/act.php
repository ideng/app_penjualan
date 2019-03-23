<?php
$base_path = '../../../';
include_once $base_path.'config/helpers.php';
include_once $base_path.'models/master/M_Tipe_Admin.php';
include_once $base_path.'config/koneksi.php';

$database = new Database();
$db = $database->getKoneksi();

$M_Tipe_Admin = new M_Tipe_Admin($db);
$get_act = input_get('act');
$post_act = input_post('act');

if ($get_act == 'view_table') {
	$data = $M_Tipe_Admin->ssp_datatables();

	require( $base_path.'config/ssp.class.php' );
	echo json_encode(
		SSP::simple( $_GET, $data['sql_details'], $data['table'], $data['primaryKey'], $data['columns'], $data['joinQuery'], $data['extraWhere'], $data['groupBy'], $data['having'] )
	);
}

if ($post_act == 'view_form') {
	// Ambil data berdasarkan primary_key
	// Jika primary key kosong, load form kosong
	$primary_key = input_post('primary_key');
	$tipe_admin = $M_Tipe_Admin->get_row($primary_key);
	include_once 'v_form.php';
}
