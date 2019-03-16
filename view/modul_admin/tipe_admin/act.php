<?php
$base_path = '../../../';
include_once $base_path.'config/helpers.php';
include_once $base_path.'models/master/M_Tipe_Admin.php';

$tipe_admin = new M_Tipe_Admin();
$get_act = input_get('act');

if ($get_act == 'view_table') {
	$data = $tipe_admin->ssp_datatables();

	require( $base_path.'config/ssp.class.php' );
	echo json_encode(
		SSP::simple( $_GET, $data['sql_details'], $data['table'], $data['primaryKey'], $data['columns'], $data['joinQuery'], $data['extraWhere'], $data['groupBy'], $data['having'] )
	);
}
