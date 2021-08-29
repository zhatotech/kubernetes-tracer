<!-- Breadcrumbs -->
<section class="breadcrumbs">
	<div class="container">

	</div>
</section>
<!--/ End Breadcrumbs -->

<!-- Blogs Area -->
<section id="portfolio" class="portfolio section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h1>GALERI FOTO</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- portfolio Nav -->
				<div class="portfolio-nav">
				</div>
				<!--/ End portfolio Nav -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form action="<?php echo base_url('index.php/utama/allgaleri/') ?>" method="post">
					<div class="form-group" style="text-align: left;">
						<label>Pencarian Galeri</label>
						<input type="text" name="string" class="form-control" placeholder="Cari galeri">
						<small class="form-text text-muted">cari galeri yang inginkan disini</small>
					</div>
				</form>
				<div class="portfolio-inner">
					<div class="row">
						<?php foreach ($hasil as $data): ?>
							<div class="col-4">
								<div class="cbp-item development package">
									<div class="portfolio-single">
										<div class="portfolio-head">
											<img src="<?php echo base_url('assets/img/galeri/default.png') ?>" alt="default.png"/>
										</div>
										<div class="portfolio-hover">
											<h4><a href="<?php echo base_url('index.php/utama/listalbum/'.$data['alias_kategori']) ?>"><?php echo $data['judul_kategori']; ?></a></h4>
											<div class="button">
												<a class="primary cbp-lightbox" href="<?php echo base_url('index.php/utama/listalbum/'.$data['alias_kategori']) ?>"><i class="fa fa-search"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<!--Tampilkan pagination-->
						<?php echo $pagination; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blogs Area -->