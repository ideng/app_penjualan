<?php
$base_path = isset($base_path)?$base_path:'../../';
include_once $base_path.'config/helpers.php';

class M_tipe_produk {
	private $title_name = 'Tipe Produk';
	private $tbl_name = 'tipe_produk';
	private $p_key = 'kd_tipe_produk';
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
					return $this->tbl_btn($d, $row[2]);
				} ),
			array( 'db' => 'a.'.$this->p_key, 'dt' => 2, 'field' => $this->p_key ),
			array( 'db' => 'b.nm_tipe_produk AS nm_parent', 'dt' => 3, 'field' => 'nm_parent',
				'formatter' => function($d) {
					return empty_replace($d);
				} ),
			array( 'db' => 'a.nm_tipe_produk', 'dt' => 4, 'field' => 'nm_tipe_produk' ),
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

		$data['joinQuery'] = 'FROM '. $this->tbl_name .' a LEFT JOIN '. $this->tbl_name .' b ON b.'. $this->p_key .' = a.kd_parent_tipe';
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
			$data = (object) ['kd_tipe_produk' => $row->kd_tipe_produk, 'kd_parent_tipe' => $row->kd_parent_tipe, 'nm_tipe_produk' => $row->nm_tipe_produk, 'tgl_input' => format_date($row->tgl_input, 'd-m-Y H:i:s'), 'tgl_edit' => format_date($row->tgl_edit, 'd-m-Y H:i:s')];
		else :
			$data = (object) ['kd_tipe_produk' => '', 'kd_parent_tipe' => '', 'nm_tipe_produk' => '', 'tgl_input' => date('d-m-Y H:i:s'), 'tgl_edit' => date('d-m-Y H:i:s')];
		endif;
		return $data;
	}

	public function chk_nama_tipe_produk($new_userid = '', $old_userid = '') {
		$query = 'SELECT * FROM '.$this->tbl_name.' WHERE nm_tipe_produk = ? AND kd_tipe_produk != ?';
		$stmt = $this->db->prepare($query);
		$stmt->execute([$new_userid, $old_userid]);
		$num_rows = $stmt->rowCount();
		return $num_rows;
	}

	public function insert($data = []) {
		if (!empty($data)) {
			$query = 'INSERT INTO '.$this->tbl_name.' SET ';
			foreach ($data as $column => $value) {
				$querys[] = $column.' = ?';
				$val[] = $value;
			}
			$query .= implode(', ', $querys);
			$stmt = $this->db->prepare($query);
			$data['query'] = $query;
			$data['result'] = $stmt->execute($val);
		} else {
			$data['query'] = 'Are you mad vroh?!?';
			$data['result'] = FALSE;
		}
		return $data;
	}

	public function update($data = [], $params = []) {
		if (!empty($data) && !empty($params)) {
			$query = 'UPDATE '.$this->tbl_name.' SET ';
			foreach ($data as $column => $value) {
				$querys[] = $column.' = ?';
				$val[] = $value;
			}
			$query .= implode(', ', $querys);
			$query .= ' WHERE ';
			foreach ($params as $column => $value) {
				$param[] = $column.' = ?';
				$val[] = $value;
			}
			$query .= implode(', ', $param);

			$stmt = $this->db->prepare($query);
			$data['query'] = $query;
			$data['result'] = $stmt->execute($val);
		} else {
			$data['query'] = 'Are you mad vroh?!?';
			$data['result'] = FALSE;
		}
		return $data;
	}

	public function submit_data($data = []) {
		/**
		 * Jika Data Primary Key Kosong
		 * Maka Sistem akan menjalankan fungsi insert
		 * Selain itu Update Data dengan Paramater Primary Key
		 */
		if (empty($data[$this->p_key])) {
			$label = 'Menambahkan';
			$data = array_merge($data, ['tgl_input' => date('Y-m-d H:i:s')]);
			$act = self::insert($data);
		} else {
			$label = 'Mengubah';
			$data = array_merge($data, ['tgl_edit' => date('Y-m-d H:i:s')]);
			$act = self::update($data, [$this->p_key => $data[$this->p_key]]);
		}
		$err_msg = $act['result']?'Berhasil':'Gagal';
		$is_success = $act['result']?'success':'danger';
		$icon = $act['result']?'fa-check':'fa-ban';
		$alert = $err_msg.' '.$label.' '.$this->title_name;
		$msg['act'] = $act;
		$msg['alert'] = render_alert($is_success, TRUE, $icon, $label, $alert);
		return $msg;
	}

	public function get_parent($my_id = '') {
		$query = 'SELECT * FROM '. $this->tbl_name .' WHERE '. $this->p_key .' != ?';
		$stmt = $this->db->prepare($query);
		$stmt->execute([$my_id]);
		return $stmt;
	}
}