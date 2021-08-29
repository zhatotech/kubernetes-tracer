<div class="container">
    <div class="row">
        <!-- Editors Pick -->
        <div class="col-12 col-md-7 col-lg-12">
            <div class="section-heading">
                <h3 class="mt-4">Semua Berita</h3>
            </div>

            <div class="row">
            	<?php if ($hasil==TRUE): ?>
            		<?php foreach ($hasil as $data): ?>
            			<div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="<?php echo base_url('index.php/utama/informasi/'.$data['alias_informasi']) ?>" class="block-20 d-flex align-items-end" style="background-image: url(<?php echo base_url('assets/informasi/'.$data['img_informasi']) ?>);">
                                <div class="meta-date text-center p-2">
                                  <span class="day"><?php echo date('d',strtotime($data['tgl_informasi'])); ?></span>
                                  <span class="mos"><?php echo date('F',strtotime($data['tgl_informasi'])); ?></span>
                                  <span class="yr"><?php echo date('Y',strtotime($data['tgl_informasi'])); ?></span>
                              </div>
                          </a>
                          <div class="text bg-white p-4">
                            <h3 class="heading"><a href="<?php echo base_url('index.php/utama/informasi/'.$data['alias_informasi']) ?>"><?php echo substr(strip_tags($data['nm_informasi']),0,60).' ...'; ?></a></h3>
                            <p><?php echo substr(strip_tags($data['ket_informasi']),0,135).' ...'; ?></p>
                            <div class="d-flex align-items-center mt-4">
                              <p class="mb-0"><a href="#" class="btn btn-primary">Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a></p>
                              <p class="ml-auto mb-0">
                                <a href="#" class="mr-2"><?php echo $this->Admin_m->detail_data('users','id',$data['id_users'])->username; ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php else: ?>
          <div class="alert alert-danger text-center w-100">Data tidak ditemukan</div>
      <?php endif ?>

      <!-- Single Post -->
      <
  </div>
</div>
</div>
<div class="row">
   <div class="col-12">
      <!-- Start Pagination -->
      <?php echo $pagination; ?>
      <!--/ End Pagination -->
  </div>
</div>	
</div>