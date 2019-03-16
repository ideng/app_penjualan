<?php
$base_path = isset($base_path)?$base_path:'../../';
include_once $base_path.'config/helpers.php';

class M_Admin {
	private $title_name = 'Data Admin';
	private $tbl_name = 'tm_user';
	private $p_key = 'kd_user';
	private $db = NULL;

	public function __construct($db) {
		$this->db = $db;
	}

	public function ssp_datatables() {
		// Nama Table yang digunakan
		$data['table'] = $this->tbl_name;

		// Kolom Primary dalam Tabel
		$data['primaryKey'] = $this->p_key;

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$data['columns'] = array(
			array( 'db' => 'a.'.$this->p_key, 'dt' => 1, 'field' => $this->p_key,
				'formatter' => function($d, $row) {
					return $this->tbl_btn($d, $row[3]);
				} ),
			array( 'db' => 'a.user_id', 'dt' => 2, 'field' => 'user_id' ),
			array( 'db' => 'b.nm_tipe_admin', 'dt' => 3, 'field' => 'nm_tipe_admin' ),
			array( 'db' => 'a.user_name', 'dt' => 4, 'field' => 'user_name' ),
			array( 'db' => 'a.tgl_input', 'dt' => 5, 'field' => 'tgl_input',
				'formatter' => function($d) {
					return format_date($d, 'd-m-Y H:i:s');
				} ),
			array( 'db' => 'a.tgl_edit', 'dt' => 6, 'field' => 'tgl_edit',
				'formatter' => function($d) {
					return format_date($d, 'd-m-Y H:i:s');
				} ),
		);

		// SQL server connection information
		$data['sql_details'] = datatables_conn();

		$data['joinQuery'] = 'FROM '.$this->tbl_name.' a LEFT JOIN tb_tipe_admin b ON b.kd_tipe_admin = a.tipe_admin_kd';
		$data['extraWhere'] = '';
		$data['groupBy'] = '';
		$data['having'] = '';

		return $data;
	}

	private function tbl_btn($id = '', $var = '') {
		$is_read_access = true;
		$is_update_access = true;
		$is_delete_access = true;

		$btns = array();
		$btns[] = get_btn(array('access' => $is_read_access, 'title' => 'Detail '.$this->title_name, 'icon' => 'search', 'onclick' => 'view_detail(\''.$id.'\')'));
		$btns[] = get_btn(array('access' => $is_update_access, 'title' => 'Ubah', 'icon' => 'pencil', 'onclick' => 'load_formcontainer(\''.$id.'\')'));
		$btns[] = get_btn_divider();
		$btns[] = get_btn(array('access' => $is_delete_access, 'title' => 'Hapus', 'icon' => 'trash',
			'onclick' => 'return confirm(\'Anda akan menghapus '.$this->title_name.' = '.$var.'?\')?hapus_data(\''.$id.'\'):false'));
		$btn_group = group_btns($btns, 'Opsi');

		return $btn_group;
	}

	public function get_row($p_key = '') {
		$query = 'SELECT * FROM '.$this->tbl_name.' WHERE '.$this->p_key.' = ?';
		$stmt = $this->db->prepare($query);
		$stmt->execute([$p_key]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!empty($row)) :
			$data = ['kd_user' => $row['kd_user'], 'tipe_admin_kd' => $row['tipe_admin_kd'], 'user_id' => $row['user_id'], 'user_pass' => $row['user_pass'], 'user_name' => $row['user_name'], 'user_img' => $row['user_img'], 'tgl_input' => $row['tgl_input'], 'tgl_edit' => $row['tgl_edit']];
		else :
			$data = ['kd_user' => '', 'tipe_admin_kd' => '', 'user_id' => '', 'user_pass' => '', 'user_name' => '', 'user_img' => '', 'tgl_input' => date('d-m-Y H:i:s'), 'tgl_edit' => date('d-m-Y H:i:s')];
		endif;
		return $row;
	}
}