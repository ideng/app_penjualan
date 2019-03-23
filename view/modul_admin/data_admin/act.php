<?php
session_start();
$base_path = '../../../';
include_once $base_path.'config/koneksi.php';
include_once $base_path.'config/helpers.php';
include_once $base_path.'models/master/M_admin.php';
include_once $base_path.'models/master/M_tipe_admin.php';

$database = new Database();
$db = $database->getKoneksi();

$m_admin = new M_admin($db);
$m_tipe_admin = new M_tipe_admin($db);
$get_act = input_get('act');
$post_act = input_post('act');

if ($get_act == 'view_table') {
	$data = $m_admin->ssp_datatables();

	require( $base_path.'config/ssp.class.php' );
	echo json_encode(
		SSP::simple( $_GET, $data['sql_details'], $data['table'], $data['primaryKey'], $data['columns'], $data['joinQuery'], $data['extraWhere'], $data['groupBy'], $data['having'] )
	);
}

if ($post_act == 'view_form') {
	// Ambil data berdasarkan primary_key
	// Jika primary key kosong, load form kosong
	$primary_key = input_post('primary_key');
	$_SESSION['data_admin']['kd_user_lama'] = $primary_key;
	$data_admin = $m_admin->get_row($primary_key);
	$opt_tipe_admin = $m_tipe_admin->render_option($data_admin->tipe_admin_kd);
	include_once 'v_form.php';
} elseif ($post_act == 'submit_form') {
	/**
 	 * Check username admin
	 */
	$chk_password = TRUE;
	$chk_username = $m_admin->chk_username(input_post('txtUserId'), $_SESSION['data_admin']['kd_user_lama']);
	if (!empty(input_post('txtPassword'))) :
		$chk_password = $m_admin->chk_password(input_post('txtPassword'), input_post('txtConfPassword'));
	endif;
	if ($chk_username > 0 || !$chk_password || (empty(input_post('txtKode')) && empty(input_post('txtPassword')))) {
		if ($chk_username > 0) {
			$data['alert'] = 'User ID sudah digunakan, gunakan User ID lain!';
		} elseif (!$chk_password) {
			$data['alert'] = 'Password tidak sama dengan Konfirmasi Password!';
		} elseif (empty(input_post('txtKode')) && empty(input_post('txtPassword'))) {
			$data['alert'] = 'Password Harus Diisi!';
		}
	} else {
		$submit_data = [
			'kd_user' => input_post('txtKode'),
			'tipe_admin_kd' => input_post('selTipeAdmin'),
			'user_id' => input_post('txtUserId'),
			'user_name' => input_post('txtUserName'),
		];
		if (!empty(input_post('txtPassword'))) :
			$submit_data = array_merge($submit_data, ['user_pass' => hash_text(input_post('txtPassword'))]);
		endif;
		$data = $m_admin->submit_data($submit_data);
	}

	header('Content-Type: application/json');
	echo json_encode($data);

}

if (empty($get_act) && empty($post_act)) {
	echo 'COK HACKER WE!!!';
}
