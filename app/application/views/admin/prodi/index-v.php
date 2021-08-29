<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Prodi</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('info/') ?>" class="text-muted">Detail</a>
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
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col">
						<b>Daftar Prodi </b>
						<span class="text-muted" style="margin-left: 5px;">Daftar Program Studi </span>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td class="text-center"><b>No</b></td>
							<td class="text-center"><b>Kode</b></td>
							<td><b>Program Studi</b></td>
							<td class="text-center"><b>Jenjang</b></td>
							<td class="text-center"><b>Status</b></td>
							<td></td>
						</tr>
						<?php $no = 1 ?>
						<?php foreach ($allprodi as $data): ?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="text-center"><?= $data->kode_program_studi ?></td>
								<td><?=	$data->nama_program_studi ?></td>
								<td class="text-center"><?= $data->nama_jenjang_pendidikan ?></td>
								<td class="text-center">
									<?php if ($data->status == 'A'): ?>
										<span class="label label-lg label-light-success label-inline font-weight-bold py-4">
											<?= $data->status.'ktif' ?>
										</span>
									<?php else: ?>
										<span class="label label-lg label-light-danger label-inline font-weight-bold py-4">
											<?= $data->status ?>
										</span>
									<?php endif ?>
								</td>
								<td></td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>