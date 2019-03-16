<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Modul Administator
		<small>Tipe Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Blank page</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Title</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></button>
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
				<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body" id="idBoxTable">
			Start creating your amazing application!
		</div><!-- /.box-body -->
	</div><!-- /.box -->

</section><!-- /.content -->

<script type="text/javascript">
	load_table();

	function load_table() {
		$('#idBoxTable').slideUp(function() {
			$.ajax({
				type: 'POST',
				url: 'view/modul_admin/tipe_admin/v_table.php',
				success: function(html) {
					$('#idBoxTable').html(html);
					$('#idBoxTable').slideDown();
				}
			});
		});
	}
</script>