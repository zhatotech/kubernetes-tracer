<!-- Breadcrumbs -->
<section class="breadcrumbs">
	<div class="container">

	</div>
</section>
<!--/ End Breadcrumbs -->

<section id="portfolio" class="portfolio section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h1>GALERI VIDEO</h1>
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

		<div class="portfolio-inner">
			<div class="row">
				<div class="col-12">
					<div>

						<?php foreach ($videor as $data){
							$parts = explode('v=', $data->link_video);
							$id = end($parts);
							?>
							<!-- Single portfolio -->
							<div class="cbp-item akuntansi">
								<div class="portfolio-single">
									<div class="portfolio-head">
										<img src="http://img.youtube.com/vi/<?php echo $id;?>/hqdefault.jpg" alt="<?php echo $data->judul_video; ?>">
									</div>
									<div class="portfolio-hover">
										<h4><a href="javascript:void(0)"><?php echo $data->judul_video; ?></a></h4>
										<p><?php echo $data->ket_video; ?></p>
										<div class="button">									
											<a href="<?php echo $data->link_video; ?>" class="video-popup mfp-fade">
												<i class="fa fa-play"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!--/ End portfolio -->
						<?php } ?>

					</div>
				</div>
			</div>
		</div>

	</div>
</section>
