<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Detail Pertanyaan Tracer</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('Tracer/') ?>" class="text-muted">Daftar</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('tracer/detail/'.$gettracer->id_periode_t) ?>" class="text-muted">Detail</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$gettkode->kd_pertanyaan) ?>" class="text-muted">Pertanyaan</a>
					</li>
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page Heading-->
		</div>
		<!--end::Info-->
	</div>
</div>
<!--end::Subheader-->
<div class="d-flex flex-column-fluid">
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact mt-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col">
							<b><?php echo $title ?> </b>
						</div>
					</div>
				</div>
				<div class="card-body">
					<span>Detail Soal Pertanyaan</span>
					<table class="table mt-2">
						<tr>
							<td>Soal</td>
							<td><?php echo $gettkode->nm_pertanyaan ?></td>
						</tr>
						<tr>
							<td>Type</td>
							<td><?php echo $gettkode->nm_type ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!--end::Card-->
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact mt-4">
			<form action="<?php echo base_url('tracer/prstambahopsi/'.$gettracer->id_periode_t.'/'.$gettkode->id_pertanyaan) ?>" method="post">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Kode</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-marker"></i>
											</span>
										</div>
										<input type="text" class="form-control" name="nm_opsi" placeholder="masukan kode"/>
									</div>
									<span class="form-text text-muted">Gunakan Huruf dan Angka.</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Soal Pertanyaan</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-border-style"></i>
											</span>
										</div>
										<textarea class="form-control" name="isi_opsi" placeholder="masukan pertanyaan"></textarea>
									</div>
									<span class="form-text text-muted">Text Max berisi 244 Karakter</span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Kunci Jwb?</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-key"></i>
											</span>
										</div>
										<select class="form-control" name="kunci_opsi">
											<option value="0">Tidak</option>
											<option value="1">Ya</option>
										</select>
									</div>
									<span class="form-text text-muted">Pilih dari salah satu list diatas</span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Jwb Lainnya ?</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-quote-left"></i>
											</span>
										</div>
										<select class="form-control" name="opsi_lainnya">
											<option value="0">Tidak</option>
											<option value="1">Ya</option>
										</select>
									</div>
									<span class="form-text text-muted">Pilih dari salah satu list diatas</span>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" value="submit" name="submit" class="btn btn-light-primary btn-sm"><span class="la la-plus-square"></span> Tambah Opsi Pertanyaan
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!--end::Card-->
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact mt-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col">
							<b>Daftar Opsi <?php echo $title ?> </b>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- sal -->
					<table class="table">
						<tr>
							<td>Kode</td>
							<td>Opsi</td>
							<td>Kunci</td>
							<td>Lainnya</td>
							<td></td>
						</tr>
						<?php if ($allopsi == TRUE): ?>
							<?php foreach ($allopsi as $data): ?>
								<tr>
									<td><?php echo $data->nm_opsi ?></td>
									<td><?php echo $data->isi_opsi ?></td>
									<td>
										<?php if ($data->kunci_opsi =='1'): ?>
											<span class="label label-lg label-light-success label-inline font-weight-bold py-4">
												Ya
											</span>
										<?php else: ?>
											<span class="label label-lg label-light-warning label-inline font-weight-bold py-4">
												Tidak
											</span>
										<?php endif ?>
									</td>
									<td>
										<?php if ($data->opsi_lainnya =='1'): ?>
											<span class="label label-lg label-light-success label-inline font-weight-bold py-4">
												Ya
											</span>
										<?php else: ?>
											<span class="label label-lg label-light-warning label-inline font-weight-bold py-4">
												Tidak
											</span>
										<?php endif ?>
									</td>
									<td>
										<a href="<?php echo base_url('Tracer/delopsi/'.$gettracer->id_periode_t.'/'.$data->id_pertanyaan.'/'.$data->id_opsi) ?>" class="label label-lg label-light-danger label-inline font-weight-bold py-4">
											Hapus
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="5" class="text-center">Belum ada Opsi Pertanyaan</td>
							</tr>
						<?php endif ?>
							
						<tr></tr>
					</table>
				</div>
			</div>
		</div>
		<!--end::Card-->
	</div>
</div>
