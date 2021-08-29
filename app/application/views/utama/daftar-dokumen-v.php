<div class=" mt-4">
	<form action="<?php echo base_url('index.php/utama/dokumen/') ?>" method="post">
		<div class="row">
			<div class="col-md-4">
				<input type="text" name="string" class="form-control" placeholder="Masukan Judul Dokumen" style="width: 100%" <?php if (!empty($post['string']) ): ?>
				value="<?php echo $post['string'] ?>"
				<?php endif ?>>
				<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
			</div>
			<div class="col-md-3">
				<select name="id_kategori" class="form-control">
					<?php if (!empty($post['id_kategori'])): ?>
						<option value="<?php echo $post['id_kategori'] ?>"><?php echo $this->Admin_m->detail_data('kategori','id_kategori',$post['id_kategori'])->nm_kategori ?></option>
						<option value="">Semua Kategori</option>
						<?php else: ?>
							<option value="">Semua Kategori</option>
						<?php endif ?>
						<?php foreach ($allkategori as $data): ?>
							<option value="<?php echo $data->id_kategori ?>"><?php echo $data->nm_kategori ?></option>
						<?php endforeach ?>
					</select>
					<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
				</div>
				<div class="col-md-2">
					<input type="text" name="nomor" class="form-control" placeholder="Masukan Nomor" style="width: 100%" <?php if (!empty($post['nomor']) ): ?>
					value="<?php echo $post['nomor'] ?>"
					<?php endif ?>>
					<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
				</div>
				<div class="col-md-2">
					<input type="text" name="tahun" class="form-control" placeholder="Masukan Tahun" style="width: 100%" <?php if (!empty($post['tahun']) ): ?>
					value="<?php echo $post['tahun'] ?>"
					<?php endif ?>>
					<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
				</div>
				<div class="col-md-1">
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
				</div>
			</div>
		</form>
		<div class="table-responsive">
			<span class="pcoded-badge label label-primary"><?php echo $jmldata.' data ditemukan'; ?></span>
			<table class="table mt-2" style="font-size: 13px;">
				<tr>
					<th>No</th>
					<th>Judul Dokumen</th>
					<th>Type</th>
					<th>Tanggal</th>
					<th>Status</th>
					<td></td>
				</tr>
				<?php if ($hasil == TRUE): ?>
					<?php $no = 1+$row ?>
					<?php foreach ($hasil as $data): ?>
						<tr >
							<td style="vertical-align: middle;"><?php echo $no; ?></td>
							<td style="vertical-align: middle;">
								<?php echo $data['nm_kategori'].' '; ?>
								<?php if ($data['nomor'] == TRUE): ?>
									Nomor <?php echo $data['nomor'].' '; ?>
								<?php endif ?>
								<?php if ($data['tahun'] == TRUE): ?>
									Tahun <?php echo $data['tahun']; ?>
									<?php endif ?><br/>
									<a href="<?php echo base_url('assets/dokumen/'.$data['file_dokumen']) ?>"><b><?php echo substr($data['nm_dokumen'],0,65).' ...'; ?></b></a>
								</td>
								<td style="vertical-align: middle;"><?php echo $data['type_dokumen']; ?></td>
								<td style="vertical-align: middle;"><?php echo date('d F Y',strtotime($data['tgl_dokumen'])); ?></td>
								<td style="vertical-align: middle;"><?php echo $this->Admin_m->detail_data('status','id_status',$data['id_status'])->nm_status; ?></td>
								<td style="vertical-align: middle;">
									<a class="pcoded-badge label label-primary" href="<?php echo base_url('assets/dokumen/'.$data['file_dokumen']) ?>" target="_blank">download</a>
								</td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="7" class="text-center">belum ada dokumen</td>
							</tr>
						<?php endif ?>
						
					</table>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $pagination; ?>
					</div>
				</div>
			</div>