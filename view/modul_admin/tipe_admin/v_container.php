<?php
$base_url = 'view/modul_admin/tipe_admin';
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Modul Administator
		<small>Tipe Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Modul Administator</a></li>
		<li class="active">Tipe Admin</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Tabel Tipe Admin</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" id="idBtnAdd" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-pencil"></i></button>
				<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div id="idBoxLoader" class="cl-box-loader" style="color: #337ab7; text-align: center;">
				<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
			</div>
			<div id="idTableAlert"></div>
			<div id="idBoxTable"></div>
		</div><!-- /.box-body -->
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
			$('#idBoxLoader').fadeIn(function() {
				$.ajax({
					type: 'POST',
					url: '<?php echo $base_url.'/v_table.php'; ?>',
					success: function(html) {
						$('#idBoxTable').html(html);
						$('#idBoxLoader').fadeOut(function() {
							$('#idBoxTable').slideDown();
						});
					}
				});
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
			url: <?php echo $base_url.'/act.php'; ?>,
			data: {'act': 'view_form', 'primary_key': p_key},
			success: function(html) {
				$('.content').prepend(html);
			}
		});
	}
</script>