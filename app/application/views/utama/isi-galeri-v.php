<!-- Breadcrumbs -->
<section class="breadcrumbs">
	<div class="container">
		<
	</div>
</section>
<!--/ End Breadcrumbs -->
<div class="p-4">
	<div class="card" style="margin-top: 100px;">
		<div class="card-header"><b>Album <?php echo $detail->judul_kategori; ?></b></div>
		<div class="card-body">
			<div class="row">
				<?php if ($hasil == TRUE): ?>
					<?php foreach ($hasil as $data): ?>
						<div class="col-md-3">
							<div class="card">
								<img src="<?php echo base_url('assets/img/galeri/'.$data['isi_galeri']) ?>" class="card-img-top" alt="<?php echo $data['isi_galeri'] ?>">
								<div class="card-body">
									<h5 class="card-title"><?php echo $data['nama_galeri']; ?></h5>
									<p><?php echo $data['ket_galeri']; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				<?php else: ?>
					<div class="col-md-12">
						<div class="alert alert-info">TIdak ada Foto dalam album</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>