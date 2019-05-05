<?php
$page = filter_input(INPUT_GET, 'p');
$folder_view = 'view/';

if (empty($page)) :
	$url_view = $folder_view.'home.php';
else :
	if ($page == 'dashboard') :
		$url_view = $folder_view.'home.php';
	elseif ($page == 'data_admin' || $page == 'tipe_admin') :
		$url_view = $folder_view.'modul_admin/'.$page.'/v_container.php';
	elseif ($page == 'tipe_product') :
		$url_view = $folder_view.'modul_produk/'.$page.'/v_container.php';
	endif;
endif;

if (isset($url_view)) :
	include $url_view;
else :
	include $folder_view.'errors/404.php';
endif;