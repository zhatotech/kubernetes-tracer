<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
		selector: '#mytextarea'
	});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>Edit Info</b>
				<span class="text-muted">Edit info</span>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/info/update/'.$detail->id_info) ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nm_merk">Judul Info</label>
						<input type="text" class="form-control" name="nm_info" placeholder="Judul Info" value="<?php echo $detail->nm_info ?>">
						<small id="nm_merk" class="form-text text-muted">Semua karakter (Huruf dan Angka) Dapat digunakan</small>
					</div>
					<div class="form-group">
						<label for="kode_merk">Isi Info</label>
						<textarea name="isi_info" id="mytextarea" placeholder="Masukan isi" row="10"><?php echo $detail->isi_info; ?></textarea>
						<small id="kode_merk" class="form-text text-muted">Hanya dapat menggunakan gabungan angka dan huruf</small>
					</div>
					
					<div class="border border-dark p-2">
						<?php if ($detail->file == TRUE): ?>
							<span class="pcoded-badge label label-info"><?php echo $detail->file; ?></span><br/>
						<?php endif ?>
						<label for="kode_merk">Masukan File</label><br/>
						<input type="file" name="logopt">
					</div>
					<button class="btn btn-grd-success btn-sm float-right mt-4">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>
</div>