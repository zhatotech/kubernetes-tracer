<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../">
	<meta charset="utf-8" />
	<title><?php echo $title; ?></title>
	<meta name="description" content="No aside layout examples" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendors Styles(used by this page)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="<?= base_url('assets/templatedope/smart-opl/assets/images/anjaylogo.png') ?>">
	<link href="<?php echo base_url('assets/templatedope/smart-opl/assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

	<!--====== Bootstrap css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/bootstrap.min.css">

	<!--====== Line Icons css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/LineIcons.css">

	<!--====== Magnific Popup css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/magnific-popup.css">

	<!--====== Slick css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/slick.css">

	<!--====== Animate css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/animate.css">

	<!--====== Default css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/default.css">

	<!--====== Style css ======-->
	<link rel="stylesheet" href="<?php echo base_url('assets/templatedope/smart-opl/') ?>assets/css/style.css">
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
	<!--begin::Main-->
	<!--begin::Header Mobile-->
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<!--begin::Logo-->
		<a href="<?= base_url() ?>">
			<img alt="Logo" width="150px" src="<?php echo base_url('assets/img/lembaga/logo-und-black.png') ?>" />
		</a>
		<!--end::Logo-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Header Menu Mobile Toggle-->
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<!--end::Header Menu Mobile Toggle-->
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header Mobile-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Header-->
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
							<!--begin::Header Logo-->
							<div class="header-logo">
								<a href="<?= base_url() ?>">
									<img alt="Logo" width="150px" src="<?php echo base_url('assets/img/lembaga/logo-und-black.png') ?>" />
								</a>
							</div>
							<!--end::Header Logo-->
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">
									<li class="menu-item menu-item-submenu menu-item-rel">
										<a href="<?php echo base_url() ?>" class="menu-link menu-toggle">
											<span class="menu-text">Beranda</span>
										</a>
									</li>
									<?php foreach ($halaman as $data) : ?>
										<?php $getlaman = $this->Admin_m->detail_data('laman', 's_laman', $data->id_laman) ?>
										<?php if ($getlaman == FALSE) : ?>
											<?php if ($data->s_laman == '0') : ?>
												<?php if ($data->link == 'none') : ?>
													<li class="menu-item menu-item-submenu menu-item-rel ">
														<a href="<?php echo base_url('index.php/utama/laman/' . $data->alias_laman) ?>" class="menu-link">
															<span class="menu-text"><?php echo $data->judul_laman; ?></span>
														</a>
													</li>
												<?php else : ?>
													<li class="menu-item menu-item-submenu menu-item-rel ">
														<a href="<?php echo $data->link ?>" target="_blank" class="menu-link">
															<span class="menu-text"><?php echo $data->judul_laman; ?></span>
														</a>
													</li>
												<?php endif ?>
											<?php endif ?>
										<?php else : ?>
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
												<a href="#" class="menu-link menu-toggle">
													<span class="menu-text"><?php echo $data->judul_laman; ?></span>
													<span class="svg-icon">
														<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Angle-down.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999) " />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<?php $sublaman = $this->Admin_m->sub_laman($data->id_laman) ?>
													<ul class="menu-subnav">
														<?php foreach ($sublaman as $laman) : ?>
															<?php if ($laman->link == 'none') : ?>
																<li class="menu-item" aria-haspopup="true">
																	<a href="<?php echo base_url('index.php/utama/laman/' . $laman->alias_laman) ?>" class="menu-link">
																		<span class="menu-text"><?php echo $laman->judul_laman; ?></span>
																	</a>
																</li>
															<?php else : ?>
																<li class="dropdown-item"><a href="<?php echo $laman->link ?>" taget="_blank"><b><?php echo $laman->judul_laman; ?></b></a></li>
																<li class="menu-item" aria-haspopup="true">
																	<a href="<?php echo $laman->link ?>" taget="_blank" class="menu-link">
																		<span class="menu-text"><?php echo $laman->judul_laman; ?></span>
																	</a>
																</li>
															<?php endif ?>
														<?php endforeach ?>
													</ul>
												</div>
											</li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
								<!--end::Header Nav-->
							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">
							<!--begin::User-->

							<!--end::User-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--end::Header-->