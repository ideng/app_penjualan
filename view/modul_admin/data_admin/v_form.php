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
		<div id="idFormAlert"></div>
		<div class="row">
			<div class="col-md-12">
				<!-- form start -->
				<form id="idForm" action="" method="POST" enctype="multipart/form-data" role="form">
					<div class="form-group">
						<label for="userID">Tipe Admin</label>
						<input type="hidden" name="act" value="submit_form">
						<input type="hidden" name="txtKode" value="<?php echo $data_admin->kd_user; ?>">
						<select name="selTipeAdmin" id="idSelTipeAdmin" class="form-control">
							<?php
							foreach ($opt_tipe_admin as $opt) :
								echo $opt;
							endforeach;
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="userID">Nama User</label>
						<input type="text" name="txtUserName" id="idTxtUserName" class="form-control" placeholder="User ID" value="<?php echo $data_admin->user_name; ?>">
					</div>
					<div class="form-group">
						<label for="userID">User ID</label>
						<input type="text" name="txtUserId" id="idTxtUserId" class="form-control" placeholder="User ID" value="<?php echo $data_admin->user_id; ?>">
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
						<label for="idTxtTglInput">Tanggal Input</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="txtTglInput" id="idTxtTglInput" class="form-control datepicker" value="<?php echo $data_admin->tgl_input; ?>">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label for="idTxtTglEdit">Tanggal Edit</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="txtTglEdit" id="idTxtTglEdit" class="form-control datepicker" value="<?php echo $data_admin->tgl_edit; ?>">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<hr>
					<div class="form-group">
						<div class="col-md-2 col-md-offset-10">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-primary pull-right">Submit</button>
						</div>
					</div>
				</form><!-- /.form -->
			</div>
		</div>
	</div><!-- /.box-body -->
	<!-- <div class="box-footer">
		Footer
	</div> --><!-- /.box-footer-->
</div><!-- /.box -->

<script type="text/javascript">	
    //Date range picker
    $(document).ready(function() {
	    $('.datepicker').daterangepicker({
	    	'singleDatePicker': true,
	    	'autoApply': true,
	    	'timePicker': true,
		    'locale': {
		      format: 'DD-MM-YYYY hh:mm:ss'
		    },
	    });
    });

    $(document).off('submit', '#idForm').on('submit', '#idForm', function(event) {
    	submit_form(event, this);
    });
</script>
  