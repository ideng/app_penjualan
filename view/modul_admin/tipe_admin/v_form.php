<!-- Default box -->
<div id="idContainerForm" class="box box-primary cl-container-form">
	<div class="box-header with-border">
		<h3 class="box-title">Form Tipe Admin</h3>
		<div class="box-tools pull-right">
			<!-- <button class="btn btn-box-tool" id="idBtnAdd" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-pencil"></i></button> -->
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" id="idBtnClose" data-widget="remove" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
		</div>
	</div>

	  <!-- form start -->
	<form id="idForm" action="" method="POST" role="form">
		<div class="box-body">
			<div class="form-group">
				<label for="NamaTipeAdmin">Nama Tipe Admin</label>
				<input type="text" name="txtNamaTipeAdmin" id="idNamaTipeAdmin" class="form-control" placeholder="Nama Tipe Admin" value="<?php echo $tipe_admin['nm_tipe_admin']; ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Input</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="txtTglInput" id="idTxtTglInput" class="form-control datepicker" value="<?php echo $tipe_admin['tgl_input']; ?>">
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label>Tanggal Edit</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="txtTglEdit" id="idTxtTglEdit" class="form-control datepicker" value="<?php echo $tipe_admin['tgl_edit']; ?>">
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div><!-- /.box-body -->
	</form>
	<!-- <div class="box-footer">
		Footer
	</div> --><!-- /.box-footer-->
</div><!-- /.box -->

<script type="text/javascript">	
    //Date range picker
    $(document).ready(function() {
	    $('.datepicker').daterangepicker({
	    	'singleDatePicker': true,
	    	'timePicker': true,
		    'locale': {
		      format: 'DD-MM-YYYY hh:mm:ss'
		    },
	    });
    });
</script>
  