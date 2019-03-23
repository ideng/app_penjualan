<?php
$base_path = isset($base_path)?$base_path:'../../';
include_once $base_path.'config/helpers.php';

class M_tipe_admin {
	private $title_name = 'Tipe Admin';
	private $tbl_name = 'tb_tipe_admin';
	private $p_key = 'kd_tipe_admin';
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
			array( 'db' => $this->p_key, 'dt' => 1, 'field' => $this->p_key,
				'formatter' => function($d, $row) {
					return $this->tbl_btn($d, $row[2]);
				} ),
			array( 'db' => 'nm_tipe_admin', 'dt' => 2, 'field' => 'nm_tipe_admin' ),
			array( 'db' => 'tgl_input', 'dt' => 3, 'field' => 'tgl_input',
				'formatter' => function($d) {
					return format_date($d, 'd-m-Y H:i:s');
				} ),
			array( 'db' => 'tgl_edit', 'dt' => 4, 'field' => 'tgl_edit',
				'formatter' => function($d) {
					return format_date($d, 'd-m-Y H:i:s');
				} ),
		);

		// SQL server connection information
		$data['sql_details'] = datatables_conn();

		$data['joinQuery'] = '';
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
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		if (!empty($row)) :
			$data = (object) ['kd_tipe_admin' => $row->kd_tipe_admin, 'nm_tipe_admin' => $row->nm_tipe_admin, 'tgl_input' => $row->tgl_input, 'tgl_edit' => $row->tgl_edit];
		else :
			$data = (object) ['kd_tipe_admin' => '', 'nm_tipe_admin' => '', 'tgl_input' => date('d-m-Y H:i:s'), 'tgl_edit' => date('d-m-Y H:i:s')];
		endif;
		return $data;
	}

	public function get_all() {
		$query = 'SELECT * FROM '.$this->tbl_name;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function render_option($selected = '') {
		$option[] = '<option value=\'\'>-- Pilih Tipe Admin --</option>';
		$result = self::get_all();
		while ($row = $result->fetch(PDO::FETCH_OBJ)) :
			$select = $selected == $row->{$this->p_key}?'selected':'';
			$option[] = '<option value=\''.$row->{$this->p_key}.'\' '.$select.'>'.$row->nm_tipe_admin.'</option>';
		endwhile;
		return $option;
	}
}