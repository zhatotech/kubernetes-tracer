<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Pembayaran</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('info/') ?>" class="text-muted">Detail</a>
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
						<b>Daftar Pembayaran </b>
						<span class="text-muted" style="margin-left: 5px;">Daftar Pembayaran </span>
					</div>
					<?php if ($this->ion_auth->in_group(array('admin', 'karyawan', 'members'))) : ?>
						<div class="col">
							<a href="<?php echo base_url('info/tambah') ?>" class="btn btn-light-primary btn-sm float-right"> <span class="svg-icon svg-icon-primary svg-icon-sm">
									<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
											<path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Tambah pembayaran</a>
						</div>
					<?php endif ?>
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