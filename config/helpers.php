<?php
function datatables_conn() {
	// SQL server connection information
	$conn = array(
		'user' => 'root',
		'pass' => '',
		'db'   => 'db_app_penjualan',
		'host' => 'localhost'
	);

	return $conn;
}

function input_post($input_name = '', $is_array = FALSE) {
	if ($is_array) {
		$filter = filter_input(INPUT_POST, $input_name, FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);
	} else {
		$filter = filter_input(INPUT_POST, $input_name);
	}
	return $filter;
}

function input_get($input_name = '', $is_array = FALSE) {
	if ($is_array) {
		$filter = filter_input(INPUT_GET, $input_name, FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);
	} else {
		$filter = filter_input(INPUT_GET, $input_name);
	}
	return $filter;
}

function format_date($date, $format){
	$tgl = new DateTime($date);
	$tgl_formatted = $tgl->format($format);
	return $tgl_formatted;
}

function get_btn($btn_properties = array()) {
	$is_access = true;
	$icon = 'dashboard';
	$title = 'Example';
	$btn = '<li><a href=\'javascript:void(0);\'';
	foreach ($btn_properties as $var => $val) :
		if ($var == 'icon') :
			$icon = $val;
			$btn .= '';
		elseif ($var == 'title') :
			$title = $val;
			$btn .= ' '.$var.'="'.$val.'"';
		elseif ($var == 'access') :
			$is_access = $val;
		else :
			$btn .= ' '.$var.'="'.$val.'"';
		endif;
	endforeach;
	$btn .= '><i class=\'fa fa-'.$icon.'\'></i> '.$title.'</a></li>';

	return $is_access?$btn:'';
}

function get_btn_divider() {
	return '<li class=\'divider\'></li>';
}

function group_btns($btns, $btn_name = 'Opsi') {
	if (!empty($btns)) :
		$btn_group = '<div align=\'center\'>';
		$btn_group .= '<div class=\'btn-group\'>';
		$btn_group .= '<button type=\'button\' class=\'btn btn-info btn-flat dropdown-toggle\' data-toggle=\'dropdown\'>';
		$btn_group .= $btn_name.' <span class=\'caret\'></span>';
		$btn_group .= '</button><ul class=\'dropdown-menu\'>';
		foreach($btns as $btn) :
			$btn_group .= $btn;
		endforeach;
		$btn_group .= '</ul></div></div>';
	else :
		$btn_group = '<center>-</center>';
	endif;

	return $btn_group;
}