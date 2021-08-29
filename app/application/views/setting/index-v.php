<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<!--begin::Subheader asdasdasd-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Setting</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="" class="text-muted">Pengaturan dasar, Biaya dan periode <?php echo $infopt->nama_info_pt; ?></a>
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
<div class="container">
	<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
		<div class="alert-icon">
			<span class="svg-icon svg-icon-primary svg-icon-xl">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"></rect>
						<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
						<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<div class="alert-text">Menu setting
			digunakan untuk melakukan pengaturan awal pada halaman <b><?php echo $infopt->nama_info_pt; ?></b>, Terutama untuk pengaturan Angkatan, Tahun , Gelombang dan Biaya yang digunakan saat dijalankan.
		</div>
	</div>
	<!-- setting logo -->
	<form action="<?php echo base_url('setting/update/') ?>" method="post" enctype="multipart/form-data">
		<div class="card card-custom gutter-b">
			<div class="card-header">
				<div class="card-title">
					<h3 class="card-label">Logo
						<span class="d-block text-muted pt-2 font-size-sm">Setting Tampilan Logo</span>
					</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-lg-4 col-form-label text-right">Logo Navigasi</label>
					<div class="col-lg-6">
						<img class="mt-3" id="preview" width="130px" src="<?php echo base_url('assets/img/lembaga/' . $infopt->logo_pt) ?>" width="100%" alt="default"> <br>
						<input type="file" class="form-control p-2 mt-5" id="uploadBtn" name="logopt" />
						<span class="form-text text-muted">Silahkan Upload File</span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-4 col-form-label text-right">Logo Bar</label>
					<div class="col-lg-6">
						<img class="mt-3" id="preview2" width="130px" src="<?php echo base_url('assets/img/lembaga/' . $infopt->logo_kecil_pt) ?>" width="100%" alt="default"> <br>
						<input type="file" class="form-control p-2 mt-5" id="uploadBtn2" name="logopt2" />
						<span class="form-text text-muted">Silahkan Upload File</span>
					</div>
				</div>
			</div>
		</div>
		<!-- setting informasi Perusahaan -->
		<div class="card card-custom gutter-b">
			<div class="card-header">
				<div class="card-title">
					<h3 class="card-label">Info Perusahaan
						<span class="d-block text-muted pt-2 font-size-sm">Setting Informasi Dasar Perusahaan</span>
					</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="mb-15">
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Nama Perusahaan:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="nama_info_pt" value="<?php echo $infopt->nama_info_pt ?>" placeholder="Masukkan Nama Perusahaan" />
							<span class="form-text text-muted">Silahkan Input Nama Perusahaan Anda</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Kode Perusahaan:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="kode_pt" value="<?php echo $infopt->kode_pt ?>" placeholder="Masukkan Kode Perusahaan" />
							<span class="form-text text-muted">Silahkan Input Kode Perusahaan Anda</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Slogan Perusahaan:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="slogan" value="<?php echo $infopt->slogan ?>" placeholder="Masukkan Kode Perusahaan" />
							<span class="form-text text-muted">Silahkan Input Slogan Perusahaan Anda</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Kontak 1:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="kontak_1" value="<?php echo $infopt->kontak_1 ?>" placeholder="Masukkan No HP" />
							<span class="form-text text-muted">Silahkan Input Nama & No Telepon Utama (Tidak Boleh Kosong)</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Kontak 2:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="kontak_2" value="<?php echo $infopt->kontak_2 ?>" placeholder="Masukkan No HP" />
							<span class="form-text text-muted">Silahkan Input Nama & No Telepon Utama (Tidak Boleh Kosong)</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Kontak 3:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="kontak_3" value="<?php echo $infopt->kontak_3 ?>" placeholder="Masukkan No HP" />
							<span class="form-text text-muted">Silahkan Input Nama & No Telepon Utama (Tidak Boleh Kosong)</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Kontak 4:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="kontak_4" value="<?php echo $infopt->kontak_4 ?>" placeholder="Masukkan No HP" />
							<span class="form-text text-muted">Silahkan Input Nama & No Telepon Utama (Tidak Boleh Kosong)</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Alamat Perusahaan:</label>
						<div class="col-lg-6">
							<textarea class="form-control" name="alamat_pt" placeholder="Masukkan Alamat Perusahaan" rows="4"><?php echo $infopt->alamat_pt ?></textarea>
							<span class="form-text text-muted">Silahkan Input Alamat Lengkap Perusahaan Anda (Jalan,Kota,Provinsi)</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- setting informasi pendaftaran -->
		<div class="card card-custom gutter-b">
			<div class="card-header">
				<div class="card-title">
					<h3 class="card-label">Info Pendaftaran
						<span class="d-block text-muted pt-2 font-size-sm">Setting Info Pendaftaran</span>
					</h3>
				</div>
			</div>
			<div class="card-body" style="margin-bottom: -42px;">
				<div class="mb-15">
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Tahun:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="angkatan" value="<?php echo $infopt->angkatan ?>" placeholder="Angkatan Peserta/Tahun Saat Ini" />
							<span class="form-text text-muted">Hanya boleh menggunakan angka</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Angkatan:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="tahun" value="<?php echo $infopt->tahun ?>" placeholder="2 digit terakhir tahun, misal 2021 di tulis 21" />
							<span class="form-text text-muted">Hanya boleh menggunakan angka</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Gelombang:</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" name="gelombang" value="<?php echo $infopt->gelombang ?>" placeholder="Gelombang Pendaftaran" />
							<span class="form-text text-muted">Hanya boleh menggunakan angka</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Biaya Pendaftaran:</label>
						<div class="col-lg-6">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text text-light bg-primary">Rp.</span></div>
								<input type="text" class="form-control" name="biaya" value="<?php echo $infopt->biaya ?>" placeholder="Masukan Biaya Pendaftaran" />
							</div>
							<span class="form-text text-muted">Hanya boleh menggunakan angka</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 col-form-label text-right">Batas Verifikasi Pembayaran:</label>
						<div class="col-lg-6">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text text-light bg-primary">Jam</span></div>
								<input type="text" class="form-control" name="batas_bayar" value="<?php echo $infopt->batas_bayar ?>" placeholder="max 24 Jam" />
							</div>
							<span class="form-text text-muted">Hanya boleh menggunakan angka</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group row">
					<div class="col-lg-7">
						<button class="btn btn-light-primary float-right">Simpan Data</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#preview2').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#uploadBtn").change(function() {
		readURL(this);
	});
	$("#uploadBtn2").change(function() {
		readURL2(this);
	});
</script>