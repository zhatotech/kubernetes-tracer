<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/lembaga/' . $infopt->logo_kecil_pt) ?>">
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside d-flex flex-column flex-row-auto">
				<!--begin::Aside Top-->
				<!-- <img src="#"> -->
				<!--begin::Aside Bottom-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center">
					<!--begin::Signin-->
					<div class="login-form login-signin">
						<!--begin::Form-->
						<form action="<?php echo base_url('login/prosesregistrasi/') ?>" class="form" novalidate="novalidate" method="post">
							<!--begin::Title-->
							<div class="pb-13 pt-lg-0 pt-5">
								<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg text-center"><?php echo $title; ?></h3>
							</div>
							<!--begin::Title-->
							<?php if ($this->session->flashdata('msgsukses') == TRUE) : ?>
								<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
									<div class="alert-icon"><i class="flaticon-warning"></i></div>
									<div class="alert-text"><?php echo $this->session->flashdata('msgsukses'); ?></div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="ki ki-close"></i></span>
										</button>
									</div>
								</div>
							<?php endif ?>
							<?php if ($this->session->flashdata('msgeror') == TRUE) : ?>
								<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
									<div class="alert-icon"><i class="flaticon-warning"></i></div>
									<div class="alert-text"><?php echo $this->session->flashdata('msgeror'); ?></div>
									<div class="alert-close">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="ki ki-close"></i></span>
										</button>
									</div>
								</div>
							<?php endif ?>
							<!--begin::Form group-->
							<div class="alert alert-info">
								Masukan NIM anda dan pastikan data seperti nama sudah sesuai dengan Ijazah anda.
							</div>
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">Masukan NIM</label>
								<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="username" autocomplete="off" placeholder="Masukan Nomor Induk Mahasiswa Anda dulu" />
							</div>
							<!--end::Form group-->
							<!--begin::Action-->
							<div class="pb-lg-0 pb-5">
								<button type="submit" name="submit" value="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Cek NIM</button>
								<a href="<?= base_url('login/') ?>" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
								<span class="svg-icon svg-icon-md">
								</span>Kembali Ke Login ?</a>
							</div>
							<!--end::Action-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Signin-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer-->
				<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
					<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
						<span class="mr-1"><?php echo date('Y') . ' @ '; ?></span>
						<a href="#" target="_blank" class="text-dark-75 text-hover-primary"><?php echo $infopt->nama_info_pt; ?></a>
					</div>
				</div>
				<!--end::Content footer-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->
	<!-- <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script> -->
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1400
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#3699FF",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#E4E6EF",
						"dark": "#181C32"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#E1F0FF",
						"secondary": "#EBEDF3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#3F4254",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#EBEDF3",
					"gray-300": "#E4E6EF",
					"gray-400": "#D1D3E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#7E8299",
					"gray-700": "#5E6278",
					"gray-800": "#3F4254",
					"gray-900": "#181C32"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/js/pages/custom/login/login-general.js"></script>
	<!--end::Page Scripts-->
	<script src="https://www.google.com/recaptcha/api.js?hl=id"></script>
</body>
<!--end::Body-->

</html>