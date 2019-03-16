<?php
class Database {
	//id login utk database
	private $host = "localhost";
	private $db_name = "db_app_penjualan";
	private $username = "root";
	private $password = "";

	public $koneksi;

	public function getKoneksi(){
		$this->koneksi = null;

		try{
			$this->koneksi = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			?>
			<script type="text/javascript">
				alert("Gagal untuk menyambungkan Database : <?php echo $exception->getMessage(); ?>");
			</script>
			<?php
		}
		return $this->koneksi;
	}	
}