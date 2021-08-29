<!-- Breadcrumbs -->
<section class="breadcrumbs">
	<div class="container">
		<
	</div>
</section>
<!--/ End Breadcrumbs -->
<section id="portfolio" class="portfolio section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h1>DOKUMEN AKREDITASI</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header" style="text-align: left" >Halaman Dokumen Akreditasi</div>
					<div class="card-body">
						<div class="form-main">
							<form action="<?php echo base_url('index.php/utama/akreditasi/') ?>" method="post">
								<div class="row">
									<div class="col-lg-3 col-12">
										<input type="text" name="string" class="form-control" placeholder="Nama Dokumen" style="width: 100%" <?php if (!empty($post['string']) ): ?>
										value="<?php echo $post['string'] ?>"
										<?php endif ?>>
									</div>
									<div class="col-lg-3 col-12">
										<input type="text" name="tahun" class="form-control" placeholder="Tahun" style="width: 100%" <?php if (!empty($post['tahun']) ): ?>
										value="<?php echo $post['tahun'] ?>"
										<?php endif ?>>
									</div>
									<div class="col-lg-3 col-12">
										<select name="id_kategori" class="form-control">
											<?php if (!empty($post['id_kategori'])): ?>
												<option value="<?php echo $post['id_kategori'] ?>"><?php echo $this->Admin_m->detail_data('kategori_akreditasi','id_kategori',$post['id_kategori'])->nm_kategori ?></option>
												<option value="">Semua Kategori</option>
												<?php else: ?>
													<option value="">Semua Kategori</option>
												<?php endif ?>
												<?php foreach ($allkategori as $data): ?>
													<option value="<?php echo $data->id_kategori ?>"><?php echo $data->nm_kategori ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-lg-3 col-12">
											<div> 
												<button type="submit" name="submit" value="submit" class="btn primary">Cari</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="table-responsive">
								<span class="pcoded-badge label label-primary"><?php echo $jmldata.' data ditemukan'; ?></span>
								<table class="table mt-2" style="font-size: 13px;">
									<tr>
										<th style="text-align: left">No</th>
										<th style="text-align: left">Tanggal</th>
										<th style="text-align: left">Judul Dokumen</th>
										<th>Kategori Dokumen</th>
										<td></td>
									</tr>
									<?php if ($hasil == TRUE): ?>
										<?php $no = 1+$row ?>
										<?php foreach ($hasil as $data): ?>
											<tr >
												<td style="vertical-align: middle; text-align: left;"><?php echo $no; ?></td>
												<td style="vertical-align: middle; text-align: left;"><?php echo date('d F Y',strtotime($data['tgl_akreditasi'])); ?></td>
												<td style="vertical-align: middle; text-align: left;">
													<?php if ($data['nomor'] == TRUE): ?>
														Nomor <?php echo $data['nomor'].' '; ?>
													<?php endif ?>
													<?php if ($data['tahun'] == TRUE): ?>
														Tahun <?php echo $data['tahun']; ?>
														<?php endif ?><br/>
														<a href="<?php echo base_url('assets/akreditasi/'.$data['file_akreditasi']) ?>"><b><?php echo substr($data['nm_akreditasi'],0,65).' ...'; ?></b></a>
													</td>
													<td style="vertical-align: middle;"><?php echo $data['nm_kategori'] ?></td>
													<td style="vertical-align: middle;">
														<a class="pcoded-badge label label-primary" href="<?php echo base_url('assets/akreditasi/'.$data['file_akreditasi']) ?>" target="_blank">Download</a>
													</td>
												</tr>
												<?php $no++ ?>
											<?php endforeach ?>
											<?php else: ?>
												<tr>
													<td colspan="7" class="text-center">Belum Ada Dokumen</td>
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
							</div>
						</div>
					</div>
				</div>
			</section>