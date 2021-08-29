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
  <link rel="shortcut icon" href="<?= base_url('assets/templatedope/smart-opl/assets/images/'.$infopt->logo_kecil_pt) ?>">
  <link href="<?php echo base_url('assets/templatedope/smart-opl/assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
  <!--begin::Main-->
  <!--begin::Header Mobile-->
  <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="<?= base_url() ?>">
      <img alt="Logo" width="150px" src="<?php echo base_url('assets/img/lembaga/'.$infopt->logo_pt) ?>" />
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
                  <img alt="Logo" width="150px" src="<?php echo base_url('assets/img/lembaga/'.$infopt->logo_pt) ?>" />
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
                  <?php foreach ($halaman as $data): ?>
                    <?php $getlaman = $this->Admin_m->detail_data('laman','s_laman',$data->id_laman) ?>
                    <?php if ($getlaman == FALSE): ?>
                      <?php if ($data->s_laman == '0'): ?>
                        <?php if ($data->link =='none'): ?>
                          <li class="menu-item menu-item-submenu menu-item-rel ">
                            <a href="<?php echo base_url('index.php/utama/laman/'.$data->alias_laman) ?>" class="menu-link">
                              <span class="menu-text"><?php echo $data->judul_laman; ?></span>
                            </a>
                          </li>
                          <?php else: ?>
                            <li class="menu-item menu-item-submenu menu-item-rel ">
                              <a href="<?php echo $data->link ?>" target="_blank" class="menu-link">
                                <span class="menu-text"><?php echo $data->judul_laman; ?></span>
                              </a>
                            </li>
                          <?php endif ?>
                        <?php endif ?>
                        <?php else: ?>
                          <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                            <a href="#" class="menu-link menu-toggle">
                              <span class="menu-text"><?php echo $data->judul_laman; ?></span>
                              <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Angle-down.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon points="0 0 24 0 24 24 0 24"/>
                                  <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999) "/>
                                </g>
                              </svg><!--end::Svg Icon--></span>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                              <?php $sublaman = $this->Admin_m->sub_laman($data->id_laman) ?>
                              <ul class="menu-subnav">
                                <?php foreach ($sublaman as $laman): ?>
                                  <?php if ($laman->link =='none'): ?>
                                    <li class="menu-item" aria-haspopup="true">
                                      <a href="<?php echo base_url('index.php/utama/laman/'.$laman->alias_laman) ?>" class="menu-link">
                                        <span class="menu-text"><?php echo $laman->judul_laman; ?></span>
                                      </a>
                                    </li>
                                    <?php else: ?>
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
              <?php $this->load->view($page); ?>
              <!-- begin::link -->
              <div class="container mb-4">
                <div class="row">
                  <?php foreach ($link as $data): ?>
                    <div class="col-md-3 mb-4">
                      <img src="<?php echo base_url('assets/img/link/'.$data->img_link) ?>" width="100%">
                    </div>
                  <?php endforeach ?>
                </div>
              </div>
              <!-- end::link -->
              <!--begin::Footer-->
              <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                  <!--begin::Copyright-->
                  <div class="text-dark order-2 order-md-1">
                    <span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?>©</span>
                    <a href="https://unidayan.ac.id" target="_blank" class="text-dark-75 text-hover-primary"><?php echo $infopt->nama_info_pt; ?></a>
                  </div>
                  <!--end::Copyright-->
                  <!--begin::Nav-->
                  <div class="nav nav-dark">
      <!-- <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
      <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
      <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a> -->
    </div>
    <!--end::Nav-->
  </div>
  <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
  <span class="svg-icon">
    <!--begin::Svg Icon | path:<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/media/svg/icons/Navigation/Up-2.svg-->
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24" />
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
      </g>
    </svg>
    <!--end::Svg Icon-->
  </span>
</div>
<!--end::Scrolltop-->
<!--begin::Sticky Toolbar-->
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/plugins/custom/gmaps/gmaps.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo base_url('assets/metronic_v7.1.8/theme/html/demo1/dist/') ?>assets/js/pages/widgets.js"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>