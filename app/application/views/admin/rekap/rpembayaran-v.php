
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Rekap</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('rekap/rpembayaran') ?>" class="text-muted">Pembayaran</a>
					</li>
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page Heading-->
		</div>
		<!--end::Info-->
	</div>
</div>
<!--end::Subheader-->
<div class="d-flex flex-column-fluid">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col">
						<b>Daftar Rekap </b>
						<span class="text-muted" style="margin-left: 5px;">Daftar Rekap Per Pembayaran </span>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('info/index') ?>" method="post">
					<div class="row">
						<div class="col-md-11 mb-4">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Cari Pembayaran..." <?php if (!empty($post['string'])) : ?> value="<?php echo $post['string'] ?>" <?php endif ?> />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
							<small class="form-text text-muted" style="margin-top: 10px;">Tekan enter untuk melakukan pencarian</small>
						</div>
						<div class="col-md-1">
							<button type="submit" name="submit" value="submit" class="btn btn-light-primary btn-sm" style="margin-left: -7px; padding: 9px 21px;">Cari</button>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col">
						<!-- <?php echo $pagination; ?> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>