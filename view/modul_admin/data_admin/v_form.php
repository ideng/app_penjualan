<!-- Default box -->
<div id="idContainerForm" class="box box-primary cl-container-form">
	<div class="box-header with-border">
		<h3 class="box-title">Form Data Admin</h3>
		<div class="box-tools pull-right">
			<!-- <button class="btn btn-box-tool" id="idBtnAdd" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-pencil"></i></button> -->
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" id="idBtnClose" data-widget="remove" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body" id="idBoxForm">
		INPUT DATA ADMIN
	</div><!-- /.box-body -->
	  <!-- form start -->
	<form id="idForm" action="" method="POST" role="form">
		<div class="box-body">
			<div class="form-group">
				<label for="userID">Tipe Admin</label>
				<select name="selTipeAdmin" id="idSelTipeAdmin" class="form-control">
					<option value="">-- Pilih Tipe Admin --</option>
					<?php
					// Query untuk ambil data tipe admin
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="userID">Nama User</label>
				<input type="text" name="txtUserName" id="idTxtUserName" class="form-control" placeholder="User ID" value="<?php echo $data_admin['user_name']; ?>">
			</div>
			<div class="form-group">
				<label for="userID">User ID</label>
				<input type="text" name="txtUserId" id="idTxtUserId" class="form-control" placeholder="User ID" value="<?php echo $data_admin['user_id']; ?>">
			</div>
			<div class="form-group">
				<label for="username">Password</label>
				<input type="password" name="txtPassword" id="idTxtPassword" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="username">Confirm Password</label>
				<input type="password" name="txtConfPassword" id="idTxtConfPassword" class="form-control" placeholder="Confirm Password">
			</div>
			<div class="form-group">
				<label>Tanggal Input</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="txtTglInput" id="idTxtTglInput" class="form-control datepicker" value="<?php echo $data_admin['tgl_input']; ?>">
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label>Tanggal Edit</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="txtTglEdit" id="idTxtTglEdit" class="form-control datepicker" value="<?php echo $data_admin['tgl_edit']; ?>">
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
  