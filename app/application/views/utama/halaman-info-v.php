		<!-- Breadcrumbs -->
		<section class="breadcrumbs">
			<div class="container">
				
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		<!-- Blogs Area -->
		<section class="blogs-main archives section">
			<div class="container">
				<div class="row">
					<?php foreach ($hasil as $data): ?>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-blog">
							
							<div class="blog-bottom">
								<div class="blog-inner">
									<h4><a href="<?php echo base_url('index.php/utama/allinfo/'.$data['alias_info']) ?>"><?php echo $data['nm_info'] ?></a></h4>
									<p><?php echo ($data['isi_info']); ?></p>
									<div class="meta">
										
                                        <span><i class="fa fa-calendar"></i><?php echo date('d F Y',strtotime($data['tgl_info']))  ?></span>
                                  <!--  <span><i class="fa fa-eye"></i><a href="#">333k</a></span> -->
									</div>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					<?php endforeach ?>
					
				</div>
				<div class="row">
					<div class="col-12">
						<!-- Start Pagination -->
						<?php echo $pagination; ?>
						<!--/ End Pagination -->
					</div>
				</div>			
			</div>
		</section>
		<!--/ End Blogs Area -->
	