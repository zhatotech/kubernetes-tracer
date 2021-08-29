 navbar area -->

<div id="home" class="slider-area" style="margin-top: -150px;">
    <div class="bd-example">
        <div id="carouselOne" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $noslider = 0 ?>
                <?php foreach ($slider as $data) : ?>
                    <?php if ($noslider == 0) : ?>
                        <li data-target="#carouselOne" data-slide-to="<?php echo $noslider ?>" class="active"></li>
                    <?php else : ?>
                        <li data-target="#carouselOne" data-slide-to="<?php echo $noslider ?>"></li>
                    <?php endif ?>
                    <?php $noslider++ ?>
                <?php endforeach ?>
            </ol>

            <div class="carousel-inner">
                <?php $sliders = 0 ?>
                <?php foreach ($slider as $data) : ?>
                    <?php if ($sliders == 0) : ?>
                        <div class="carousel-item bg_cover active" style="background-image: url(<?= base_url('assets/img/slider/' . $data->img_slider) ?>)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title" style="font-size: 35px;color: white;-webkit-text-fill-color: #43cee8;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color: white;"><?= $data->jdl_slider; ?></h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="<?= base_url('daftar') ?>">Daftar Sekarang</a></li>
                                                <li><a class="main-btn rounded-three" href="https://pmb.unidayan.ac.id/assets/dokumen/panduan-spmb-unidayan-tahun-2021-01.pdf" target="_blank">Unduh Panduan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- container -->
                            </div>
                            <!-- carousel caption -->
                        </div>
                        <!-- carousel-item -->
                    <?php else : ?>
                        <div class="carousel-item bg_cover" style="background-image: url(<?= base_url('assets/img/slider/' . $data->img_slider) ?>)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title" style="font-size: 35px;"><?= $data->jdl_slider; ?></h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="<?= base_url('daftar') ?>">Daftar Sekarang</a></li>
                                                <li><a class="main-btn rounded-one" href="#">Unduh Panduan</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- container -->
                            </div>
                            <!-- carousel caption -->
                        </div>
                        <!-- carousel-item -->
                    <?php endif ?>
                    <?php $sliders++ ?>
                <?php endforeach ?>
            </div>
            <!-- carousel-inner -->

            <a class="carousel-control-prev" href="#carouselOne" role="button" data-slide="prev">
                <i class="lni-arrow-left-circle"></i>
            </a>

            <a class="carousel-control-next" href="#carouselOne" role="button" data-slide="next">
                <i class="lni-arrow-right-circle"></i>
            </a>
        </div>
        <!-- carousel -->
    </div>
    <!-- bd-example -->
</div>



<!--====== NAVBAR PART ENDS ======-->

<!--====== SAIDEBAR PART START ======-->

<div class="sidebar-right">
    <div class="sidebar-close">
        <a class="close" href="#close"><i class="lni-close"></i></a>
    </div>
    <div class="sidebar-content">
        <div class="sidebar-logo text-center">
            <a href="#"><img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/logo-alt.png" alt="Logo"></a>
        </div>
        <!-- logo -->
        <div class="sidebar-menu">
            <ul>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">SERVICES</a></li>
                <li><a href="#">RESOURCES</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>
        <!-- menu -->
        <div class="sidebar-social d-flex align-items-center justify-content-center">
            <span>FOLLOW US</span>
            <ul>
                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
            </ul>
        </div>
        <!-- sidebar social -->
    </div>
    <!-- content -->
</div>
<div class="overlay-right"></div>

<!--====== SAIDEBAR PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about" class="about-area">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>teknik.png" alt="services">
                </div> -->
                <!-- <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">Keunggulan kampus unidayan</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">berikut adalah keunggulan kampus unidayan daripada kampus lain</p>
                    </div> -->
                <!-- section title -->
            <!-- </div>
            <div class="col-lg-6">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>fkip2.png" alt="services">
                </div>
            </div>
        </div> -->
        <!-- <div class="row justify-content-center">
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>sospol.png" alt="services">
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>pertanian.png" alt="services">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>perikanan.png" alt="services">
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>ekonomi.png" alt="services">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>hukum.png" alt="services">
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                    <img src="<?= base_url('assets/templatedope/') ?>fkm.png" alt="services">
                </div>
            </div>
        </div> -->
        <!-- row -->

       <!--  <div class="row">
            <div class="col-lg-6">
                <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <div class="about-icon">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/icon-1.png" alt="Icon">
                    </div>
                    <div class="about-content media-body">
                        <h4 class="about-title">Kampus Swasta Terbaik</h4>
                        <p class="text">Unidayan mencetak sejarah sebagai perguruan tinggi swasta pertama yang mengelola Program Pascasarjana di wilayah Provinsi Kepulauan Buton. Unidayan pada awal tahun 2012, menduduki peringkat kedua perguruan tinggi terbaik yang ada di Provinsi Sulawesi Tenggara yang juga berarti sebagai perguruan tinggi swasta terbaik di Provinsi Sulawesi Tenggara versi 4 International Colleges and Universities (4ICU).</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.4s">
                    <div class="about-icon">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/research.png" alt="Icon">
                    </div>
                    <div class="about-content media-body">
                        <h4 class="about-title">Penelitian</h4>
                        <p class="text">Universitas Dayanu Ikhsanuddin memberikan perhatian khusus terhadap kegiatan-kegiatan penelitian serta mendorong dosen dan mahasiswa untuk melakukan dan mengembangkan berbagai penelitian yang berorientasi untuk memenuhi kebutuhan bangsa.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                    <div class="about-icon">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/dosen.png" alt="Icon">
                    </div>
                    <div class="about-content media-body">
                        <h4 class="about-title">Dosen Terampil</h4>
                        <p class="text">Unidayan memiliki dosen yang sangat terampil dan memiliki pemahaman yang sangat baik terhadap studi dan program mata kuliah yang di ajarkan, juga sangat aktif dalam mengolah materi agar mudah di pahami oleh mahasiswa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-about d-sm-flex mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.8s">
                    <div class="about-icon">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/jenjang.png" alt="Icon">
                    </div>
                    <div class="about-content media-body">
                        <h4 class="about-title">Jenjang Pendidikan</h4>
                        <p class="text">Unidayan memiliki 8 fakultas dan 2 program yaitu program sarjana (S1) & program pascasarjana (S2).</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- row -->
    </div>
    <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== portfolio PART START ======-->

<!-- <section id="portfolio" class="portfolio-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center pb-20">
                    <h3 class="title">Portofolio kami</h3>
                    <p class="text">Janganlah ragu untuk mendaftar di unidayan, bersama kami mencetak para lulusan-lulusan terbaik di masa kini dan siap menuju ke dunia baru</p>
                </div>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-menu pt-30 text-center" style="text-transform: uppercase;">
                    <ul>
                        <li data-filter="*" class="active">Semua Kegiatan</li>
                        <li data-filter=".branding-3">Brand</li>
                        <li data-filter=".marketing-3">Unit bisnis</li>
                        <li data-filter=".planning-3">Rencana</li>
                        <li data-filter=".research-3">Penelitian</li>
                    </ul>
                </div>
                
            </div>
        </div>
        
        <div class="row grid">
            <div class="col-lg-4 col-sm-6 branding-3 planning-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-1.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-1.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">anjay</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-6 marketing-3 research-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-2.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-2.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">Graphics Design</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-6 branding-3 marketing-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.7s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-3.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-3.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">Graphics Design</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-6 planning-3 research-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-4.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-4.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">Graphics Design</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-6 marketing-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-5.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-5.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">Graphics Design</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-sm-6 planning-3">
                <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.7s">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-6.png" alt="">
                        <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                            <div class="portfolio-content">
                                <div class="portfolio-icon">
                                    <a class="image-popup" href="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/portfolio-6.png"><i class="lni-zoom-in"></i></a>
                                </div>
                                <div class="portfolio-icon">
                                    <a href="#"><i class="lni-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="portfolio-title"><a href="#">Graphics Design</a></h4>
                        <p class="text">Short description for the ones who look for something new. Awesome!</p>
                    </div>
                </div>
               
            </div>
        </div>
        
    </div>
   
</section> -->

<!--====== portfolio PART ENDS ======-->
<!-- <section id="testimonial" class="testimonial-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h3 class="title">Pimpinan Universitas</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row testimonial-active">
                    <div class="col">
                        <div class="single-testimonial mt-30 mb-30 text-center">
                            <div class="testimonial-image">
                                <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/author-3.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <hr>
                                <h6 class="author-name">Ir. L.M Sjamsul Qamar, M.T.,IPU</h6>
                                <span class="sub-title">Rektor</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single-testimonial mt-30 mb-30 text-center">
                            <div class="testimonial-image">
                                <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/author-1.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <hr>
                                <h6 class="author-name">Ir. Tamar Mustari, M.S</h6>
                                <span class="sub-title">Wakil Rektor I</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single-testimonial mt-30 mb-30 text-center">
                            <div class="testimonial-image">
                                <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/author-2.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <hr>
                                <h6 class="author-name">Wa Ode Zamrud.S.H.,M.Hum</h6>
                                <span class="sub-title">Wakil Rektor II</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single-testimonial mt-30 mb-30 text-center">
                            <div class="testimonial-image">
                                <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/author-4.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <hr>
                                <h6 class="author-name">La Ode Asman, S.Pd., M.Pd</h6>
                                <span class="sub-title">Wakil Rektor III</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="single-testimonial mt-30 mb-30 text-center">
                            <div class="testimonial-image">
                                <img src="<?= base_url('assets/templatedope/smart-opl/') ?>assets/images/author-4.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <hr>
                                <h6 class="author-name">Dr. Andi Tenri, M.Si</h6>
                                <span class="sub-title">Wakil Rektor IV</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section id="client" class="client-logo-area">
    <div class="container">
        <div class="row client-active">
            <?php foreach ($link as $data) : ?>
                <div class="col">
                    <div class="single-client text-center">
                        <a href="<?php echo $data->link ?>">
                            <img src="<?= base_url('assets/img/link/' . $data->img_link) ?>" alt="Logo">
                        </a>
                    </div> <!-- single client -->
                </div>
            <?php endforeach ?>
        </div> <!-- row -->
    </div> <!-- container -->
</section>