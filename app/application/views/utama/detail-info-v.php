<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
		selector: '#mytextarea'
	});
</script>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<b><h2><?php echo $detail->nm_info; ?></h2></b><br/>
				<p><?php echo 'Tanggal '.date('d F Y',strtotime($detail->tgl_info)); ?></p>
			</div>
			<div class="card-body">
				<p><?php echo $detail->isi_info; ?></p>
				<?php if ($detail->file == TRUE): ?>
					<a href="<?php echo base_url('assets/dokumen/'.$detail->file) ?>" class="pcoded-badge label label-success"><?php echo $detail->file; ?></a><br/>
				<?php else: ?>
					<span class="pcoded-badge label label-info">Tidak ada Dokumen ditambahkan</span><br/>
				<?php endif ?>
				</form>
			</div>
		</div>
	</div>
</div>