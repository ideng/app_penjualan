<?php
include 'config/default_config.php';

$tmp_folder = 'templates/admin_tpl/';
include $tmp_folder.'head.php';
include $tmp_folder.'header.php';
include $tmp_folder.'sidebar.php';
echo '<!-- Content Wrapper. Contains page content -->';
echo '<div class="content-wrapper">';
	include $tmp_folder.'isi.php';
echo '</div>';
include $tmp_folder.'footer.php';
include $tmp_folder.'footer_js.php';