<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Administrator
		<small>Data Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Administrator</a></li>
		<li class="active">Data Admin</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Tabel Data Admin</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" id="idBtnAdd" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-pencil"></i></button>
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
				<!-- <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button> -->
			</div>
		</div>
		<div class="box-body" id="idBoxTable"></div><!-- /.box-body -->
		
		<!-- <div class="box-footer">
			Footer
		</div> --><!-- /.box-footer-->
	</div><!-- /.box -->

</section><!-- /.content -->

<script type="text/javascript">
	load_table();

	$(document).off('click', '#idBtnAdd').on('click', '#idBtnAdd', function() {
		$(this).slideUp(function() {
			load_formcontainer('');
		});
	});

	$(document).off('click', '#idBtnClose').on('click', '#idBtnClose', function() {
		$('#idBtnAdd').slideDown();
	});

	function load_table() {
		$('#idBoxTable').slideUp(function() {
			$.ajax({
				type: 'POST',
				url: 'view/modul_admin/data_admin/v_table.php',
				success: function(html) {
					$('#idBoxTable').html(html);
					$('#idBoxTable').slideDown();
				}
			});
		});
	}

	function load_formcontainer(p_key) {
		if (p_key != '') {
			$('#idBtnAdd').slideDown();
		}
		$('.cl-container-form').slideUp(function() {
			$(this).remove();
		});
		$.ajax({
			type: 'POST',
			url: 'view/modul_admin/data_admin/act.php',
			data: {'act': 'view_form', 'primary_key': p_key},
			success: function(html) {
				$('.content').prepend(html);
			}
		});
	}
</script>
