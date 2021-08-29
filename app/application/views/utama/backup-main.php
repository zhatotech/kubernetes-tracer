<div class="row mt-4">
    <div class="col-md-6">
        <img src="<?php echo base_url('assets/img/LPM.jpg') ?>" width="100%">
    </div>
    <div class="col-md-6">
        <div class="card">
         <div class="card-header">
             <h2><b>Pencarian Dokumen !</b></h2>
         </div>
         <div class="card-body">
            <form action="<?php echo base_url('index.php/utama/dokumen') ?>" method="post">
                <div class="form-group">
                    <label><b>Tentang</b></label>
                    <input type="text" name="first_name" class="form-control" placeholder="Tentang atau Judul Produk Hukum">
                    <small class="form-text text-muted">Hanya dapat menggunakan Huruf</small>
                </div>
                <div class="form-group">
                    <label><b>Nomor</b></label>
                    <input type="text" name="nomor" class="form-control" placeholder="Masukan Nomor">
                    <small class="form-text text-muted">Hanya dapat menggunakan angka dan maksimal 12 digit</small>
                </div>
                <div class="form-group">
                    <label><b>Tahun</b></label>
                    <input type="text" name="tahun" class="form-control" placeholder="Masukan Tahun">
                    <small class="form-text text-muted">Hanya dapat menggunakan angka dan maksimal 4 digit</small>
                </div>
                <div class="form-group">
                    <label><b>Kategori</b></label>
                    <select name="id_kategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($allkategori as $data): ?>
                            <option value="<?php echo $data->id_kategori ?>"><?php echo $data->nm_kategori; ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="form-text text-muted">Pilih salah satu data diatas</small>
                </div>
                <button class="btn btn-success btn-small">Lakukan Pencarian</button>
            </form>
        </div>
    </div>
</div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row mt-4">
            <div class="col-md-4">
                <label><b>Produk Hukum Terbaru</b></label><br/>
                <?php foreach ($lastdok as $data): ?>
                    <div>
                        <span><?php echo date('d F Y',strtotime($data->tgl_dokumen)).',<br/>'; ?></span>
                        <label>
                            <?php echo $data->nm_kategori; ?>
                            <?php if ($data->nomor == TRUE): ?>
                                <?php echo ' Nomor '.$data->nomor ?>
                            <?php endif ?>
                            <?php if ($data->tahun == TRUE): ?>
                                <?php echo ' Tahun '.$data->tahun ?>
                            <?php endif ?>
                        </label>
                        <a href="<?php echo base_url('index.php/utama/detail/'.$data->id_dokumen) ?>"><h6><b><?php echo $data->nm_dokumen; ?></b></h6></a><hr/>

                    </div>
                <?php endforeach ?>
            </div>
            <?php foreach ($katgorbanyak as $data): ?>
                <div class="col-md-4">
                    <label><b><?php echo $data->nm_kategori; ?></b></label><br/>
                    <?php $dokgor = $this->Dokumen_m->dokbykatdok($data->id_kategori) ?>
                    <?php foreach ($dokgor as $dok): ?>
                        <div>
                            <span><?php echo date('d F Y',strtotime($dok->tgl_dokumen)).',<br/>'; ?></span>
                            <label>
                                <?php echo $dok->nm_kategori; ?>
                                <?php if ($dok->nomor == TRUE): ?>
                                    <?php echo ' Nomor '.$dok->nomor ?>
                                <?php endif ?>
                                <?php if ($dok->tahun == TRUE): ?>
                                    <?php echo ' Tahun '.$dok->tahun ?>
                                <?php endif ?>
                            </label>
                            <a href="<?php echo base_url('index.php/utama/detail/'.$dok->id_dokumen) ?>"><h6><b><?php echo $dok->nm_dokumen; ?></b></h6></a><hr/>

                        </div>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </div> 
    </div>
</div>
        