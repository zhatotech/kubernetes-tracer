<!-- Breadcrumbs -->
<section class="breadcrumbs">
	<div class="container">

	</div>
</section>
<!--/ End Breadcrumbs -->

<!-- Blogs Area -->
<section class="blogs-main archives single section">
	<div class="container">
	<div class="row">
		<div class="col-12 col-lg-8">
		    <div class="blog-posts-area">

		        <!-- Single Featured Post -->
		        <div class="single-blog-post featured-post single-post">
		            <div class="post-thumb">
		                <a href="#"><img src="img/bg-img/25.jpg" alt=""></a>
		            </div>
		            <div class="post-data">
		                <a href="#" class="post-catagory"><?php echo date('d F Y',strtotime($detail->tgl_info)); ?></a>
		                <a href="#" class="post-title">
		                    <h6><?php echo $detail->nm_info; ?></h6>
		                </a>
		                <div class="post-meta">
		                    <p class="post-author">By <a href="#"><?php echo $this->Admin_m->detail_data('users','id',$detail->id_users)->username; ?></a></p>
		                    <p><?php echo $detail->isi_info; ?></p>
		                </div>
			               <?php if ($detail->file == TRUE): ?>
			               	<div class="mt-4">
			               		<h2 class="">Dokumen</h2>
			               		<div class="col-lg-12">
			               			<div class="services-2 d-flex">
			               				<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
			               				<div class="text pl-3">
			               					<h3><a href="<?php echo base_url('assets/dokumen/'.$detail->file) ?>" target="_blank"><?php echo $detail->file; ?></a></h3>
			               					<p><?php echo date('d F Y',strtotime($detail->tgl_info)); ?></p>
			               				</div>
			               			</div>
			               		</div>
			               	</div>
			               <?php endif ?>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="col-12 col-lg-4">
			<!-- Popular News Widget -->
			<div class="popular-news-widget mt-4 mb-30">
				<h3>Pengumuman Terbaru</h3>
				<?php $noinfo = '1' ?>
				<?php foreach ($infor as $data): ?>
					<div class="single-popular-post">
						<a href="<?php echo base_url('index.php/utama/info/'.$data->alias_info) ?>">
							<h6><span><?php echo $noinfo; ?>.</span> <?php echo $data->nm_info; ?></h6>
						</a>
						<p><?php echo date('d F Y',strtotime($data->tgl_info)); ?></p>
					</div>
					<?php $noinfo++ ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
</section>
<!--/ End Blogs Area -->