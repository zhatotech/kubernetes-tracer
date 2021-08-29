<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Tracer</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('Tracer/') ?>" class="text-muted">Daftar</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('Tracer/tambah/') ?>" class="text-muted">Tambah</a>
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
						<b><?php echo $title ?> </b><br/>
						<span class="text-muted" style="margin-left: 5px;"><?php echo $title ?> </span>
					</div>
				</div>
			</div>
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<!--begin::Form-->
				<form class="form" action="<?php echo base_url('tracer/prosestambah/') ?>" method="post">
					<div class="card-body">
						<div class="form-group">
							<div class="alert alert-custom alert-default" role="alert">
								<div class="alert-icon">
									<span class="svg-icon svg-icon-primary svg-icon-xl">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
												<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
								<div class="alert-text">Form ini digunakan untuk membuat Perhitungan Tracer Studi baru berdasarkan tahun dan Periode yang di tentukan, Sehingga ketika Alumni mengakses halaman trancer langsung mengarah ke trancer yang sedang di aktifkan</div>
								</div>
							</div>
							<div class="form-group">
								<label>Nama Tracer Studi</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-band-aid"></i>
										</span>
									</div>
									<input type="text" name="nm_periode" class="form-control" placeholder="Masukan Nama Tracer Studi" />
								</div>
								<span class="form-text text-muted">Hanya dapat menggunakan Huruf angka dan simbol garis miring</span>
								<div class="alert alert-primary mt-1">
									Nama Tracer Studi adalah pelabelan pada "tracer Studi". contoh : Tracer Studi Tahun 2020/2021 Periode II 
								</div>
							</div>
							<div class="form-group">
								<label>Masukan Tahun</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-clipboard-list"></i>
										</span>
									</div>
									<input type="number" name="tahun" class="form-control" placeholder="Masukan Tahun" />
								</div>
								<span class="form-text text-muted">Hanya dapat menggunakan angka</span>
							</div>
							<div class="form-group">
								<label>Masukan Periode</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-clipboard-check"></i>
										</span>
									</div>
									<input type="number" name="periode" class="form-control" placeholder="Masukan Periode" />
								</div>
								<span class="form-text text-muted">Hanya dapat menggunakan angka</span>
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" name="submit" value="submit" class="btn btn-primary mr-2">Tambah</button>
						</div>
					</form>
					<!--end::Form-->
				</div>
				<!--end::Card-->
			</div>
		</div>
	</div>