<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<b>Daftar Pengumuman </b>
				<span class="text-muted">Daftar Pengumuman </span>
			</div>
			<?php if ($this->ion_auth->in_group(array('admin','karyawan','members'))): ?>
				<div class="col">
					<a href="<?php echo base_url('index.php/admin/info/tambah') ?>" class="btn btn-grd-success btn-sm float-right">Tambah Pengumuman</a>
				</div>
			<?php endif ?>
		</div>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/admin/peserta/index') ?>" method="post">
			<div class="row">
				<div class="col-md-5">
					<input type="text" name="string" class="form-control" placeholder="masukan Judul Info  / kode Info" style="width: 100%" <?php if (!empty($post['string']) ): ?>
								value="<?php echo $post['string'] ?>"
							<?php endif ?>>
					<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
				</div>
				<div class="col-md-5">
					<input type="text" name="kode_pt" class="form-control" placeholder="masukan Nama Daerah" style="width: 100%" <?php if (!empty($post['kode_pt']) ): ?>
								value="<?php echo $post['kode_pt'] ?>"
							<?php endif ?>>
					<small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
				</div>
				<div class="col-md-2">
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
				</div>
			</div>
		</form>
		<div class="table-responsive">
			<table class="table" style="font-size: 13px;">
				<tr>
					<th>No</th>
					<th>Kode Info</th>
					<th>Judul </th>
					<th>Isi</th>
					<th>file</th>
					<th>Tgl</th>
					<?php if ($this->ion_auth->in_group('admin')): ?>
						<th colspan="2">action</th>
					<?php endif ?>
				</tr>
				<?php $no = 1+$row ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['kode_info']; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/info/edit/'.$data['id_info']) ?>"><?php echo $data['nm_info']; ?></a></td>
						<td><?php echo substr($data['isi_info'],0,45).' ...'; ?></td>
						<td>
							<?php if ($data['file'] == TRUE): ?>
								<a class="pcoded-badge label label-success">ada</a>
							<?php else: ?>
								<a class="pcoded-badge label label-warning">tidak ada</a>
							<?php endif ?>
						</td>
						<td><?php echo date('d F Y',strtotime($data['tgl_info'])); ?></td>
						<?php if ($this->ion_auth->in_group('admin')): ?>
						<td><a href="<?php echo base_url('index.php/admin/info/edit/'.$data['id_info']) ?>" class="pcoded-badge label label-info">detail</a></td>
						<td><a href="<?php echo base_url('index.php/admin/info/delete/'.$data['id_info']) ?>" class="pcoded-badge label label-danger">hapus</a></td>
					<?php endif ?>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</div>