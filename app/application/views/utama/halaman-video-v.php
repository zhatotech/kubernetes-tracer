		<!-- Breadcrumbs -->
		<section class="breadcrumbs">
			<div class="container">
				
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		<!-- Blogs Area -->
		<section class="about-us section">
			<div class="container">
				<div class="bg-white cari-box">
					<h3><p>Video lainya</p></h3></br>
					<div class="row">
						<?php foreach ($hasil as $data): ?>
							<div class="col-md-4">
								<div><?php echo $data['isi_video']; ?></div>
								<a href="<?php echo base_url('index.php/utama/video/'.$data['alias_video']) ?>"><h6 class="text-bawaan"><?php echo $data['judul_video']; ?></h6></a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blogs Area -->
