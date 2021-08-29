<div class="row mt-4">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<b><h2><?php echo $detail->nm_dokumen; ?></h2></b><br/>
				<p><?php echo 'Tanggal '.date('d F Y',strtotime($detail->tgl_dokumen)); ?></p>
			</div>
			<div class="card-body">
				<div>
					<label><b>Tentang</b></label><br/>
					<p><?php echo $detail->nm_dokumen; ?></p>
				</div><hr/>
				<div>
					<label><b>Nomor</b></label><br/>
					<p><?php echo $detail->nomor; ?></p>
				</div><hr/>
				<div>
					<label><b>Tahun</b></label><br/>
					<p><?php echo $detail->tahun; ?></p>
				</div><hr/>
				<div>
					<label><b>Kategori</b></label><br/>
					<p><?php echo $detail->nm_kategori; ?></p>
				</div><hr/>
				<div>
					<label><b>Deskripsi</b></label><br/>
					<p><?php echo $detail->dsc_dokumen; ?></p>
				</div><hr/>
				<div>
					<label><b>Type File</b></label><br/>
					<p><?php echo $detail->type_dokumen; ?></p>
				</div><hr/>
				<div>
					<label><b>Dokumen</b></label><br/>
					<p><a class="pcoded-badge label label-primary" href="<?php echo base_url('assets/dokumen/'.$detail->file_dokumen) ?>" target="_blank">download</a></p>
				</div><hr/>
				<div>
					<label><b>Dilihat</b></label><br/>
					<p><?php echo $detail->lihat; ?></p>
				</div><hr/>
				<div>
					<label><b>Di Download</b></label><br/>
					<p><?php echo $detail->unduh; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
        <div class="card">
         <div class="card-header">
             <h2><b>Pencarian Produk Hukum !</b></h2>
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