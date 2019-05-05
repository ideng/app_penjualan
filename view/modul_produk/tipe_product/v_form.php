<!-- Default box -->
<div id="idContainerForm" class="box box-primary cl-container-form">
	<div class="box-header with-border">
		<h3 class="box-title">Form Tipe Produk</h3>
		<div class="box-tools pull-right">
			<!-- <button class="btn btn-box-tool" id="idBtnAdd" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-pencil"></i></button> -->
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Sembunyikan"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" id="idBtnClose" data-widget="remove" data-toggle="tooltip" title="Tutup"><i class="fa fa-times"></i></button>
		</div>
	</div>

	  <!-- form start -->
	<div class="box-body">
		<div id="idFormAlert">
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Alert!</h4>
				Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
			</div>
		</div>
		<form id="idForm" action="" method="POST" role="form">
			<div class="form-group">
				<label for="NamaTipeProduk">Nama Tipe Produk</label>
				<input type="hidden" name="act" value="submit_form">
				<input type="hidden" name="txtKode" value="<?php echo $tipe_produk->kd_tipe_produk; ?>">
				<input type="text" name="txtNamaTipeProduk" id="idNamaTipeProduk" class="form-control" placeholder="Nama Tipe Produk" value="<?php echo $tipe_produk->nm_tipe_produk; ?>">
			</div>
			<div class="form-group">
				<label for="idSelTipeParent">Nama Parent</label>
				<select name="selTipeParent" id="idSelTipeParent" class="form-control">
					<option value="">-- Pilih Parent --</option>
					<?php
					while ($row = $opts_parents->fetch(PDO::FETCH_OBJ)) {
						# code...
						$selected = $tipe_produk->kd_tipe_parent == $row->kd_tipe_produk?'selected':'';
						echo '<option value=\''.$row->kd_tipe_produk.'\' '.$selected.'>'.$row->nm_tipe_produk.'</option>';
					}
					?>
				</select>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
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
  