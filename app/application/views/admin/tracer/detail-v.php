<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-1">
			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold my-1 mr-5">Detail Tracer</h5>
				<!--end::Page Title-->
				<!--begin::Breadcrumb-->
				<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot p-0 my-2 font-size-sm">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url('Tracer/') ?>" class="text-muted">Daftar</a>
					</li>
					<li class="breadcrumb-item">
						<a href="#" class="text-muted">Detail</a>
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
						<b><?php echo $title ?> </b><br/>
						<span class="text-muted" style="margin-left: 5px;"><?php echo $title ?> </span>
					</div>
				</div>
			</div>
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<!--begin::Form-->
				<form class="form" action="<?php echo base_url('tracer/prosesedit/'.$gettracer->id_periode_t) ?>" method="post">
					<div class="card-body">
						<div class="form-group">
							<div class="alert alert-custom alert-default" role="alert">
								<div class="alert-icon">
									<span class="svg-icon svg-icon-primary svg-icon-xl">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
												<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
								<div class="alert-text">Form ini digunakan untuk membuat Perhitungan Tracer Studi baru berdasarkan tahun dan Periode yang di tentukan, Sehingga ketika Alumni mengakses halaman trancer langsung mengarah ke trancer yang sedang di aktifkan</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Tracer Studi</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-band-aid"></i>
											</span>
										</div>
										<input type="text" name="nm_periode" class="form-control" placeholder="Masukan Nama Tracer Studi" value="<?php echo $gettracer->nm_periode ?>" />
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Tahun</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-clipboard-list"></i>
											</span>
										</div>
										<input type="number" name="tahun" class="form-control" placeholder="Masukan Tahun" value="<?php echo $gettracer->tahun ?>" />
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Prd</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="la la-clipboard-check"></i>
											</span>
										</div>
										<input type="number" name="periode" class="form-control" placeholder="Masukan Periode" value="<?php echo $gettracer->periode ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" name="submit" value="submit" class="btn btn-primary mr-2">Ubah Data</button>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact mt-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col">
							<b>Daftar Pertanyaan <?php echo $title ?> </b>
						</div>
						<div class="col">
							<button class="btn btn-light-primary btn-sm float-right" data-toggle="modal" data-target="#addpertanyaan"> <span class="svg-icon svg-icon-primary svg-icon-sm">
									<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
											<path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" fill="#000000" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Tambah Pertanyaan
							</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<td>No</td>
							<td>Kode</td>
							<td>Pertanyaan</td>
							<td>Type</td>
							<td>Create</td>
							<td></td>
						</tr>
						<?php foreach ($allpertanyaan as $data): ?>
							<tr>
								<td><?php echo $data->no_urut ?></td>
								<td><?php echo $data->kd_pertanyaan ?></td>
								<td><?php echo $data->nm_pertanyaan ?></td>
								<td><?php echo $data->nm_type ?></td>
								<td><?php echo $data->created_at ?></td>
								<td>
									<a href="<?php echo base_url('Tracer/detailpertanyaan/'.$gettracer->id_periode_t.'/'.$data->kd_pertanyaan) ?>" class="label label-lg label-light-primary label-inline font-weight-bold py-4">
										Detail
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
		<!--end::Card-->
	</div>
</div>
<!-- modal:start -->
<!-- Modal-->
<div class="modal fade" id="addpertanyaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="<?php echo base_url('tracer/prsaddpertanyaan/'.$gettracer->id_periode_t) ?>" method="post">
            	<div class="modal-body">
	                <div class="form-group">
	                	<label>Nomor Urut Pertanyaan</label>
	                	<div class="input-group">
	                		<div class="input-group-prepend">
	                			<span class="input-group-text">
	                				<i class="la la-clipboard-list"></i>
	                			</span>
	                		</div>
	                		<input type="number" name="no_urut" class="form-control" placeholder="Masukan Nomor Pertanyaan" />
	                	</div>
	                	<span class="form-text text-muted">Hanya dapat menggunakan angka</span>
	                </div>
	                <div class="form-group">
	                	<label>Soal Pertanyaan</label>
	                	<div class="input-group">
	                		<div class="input-group-prepend">
	                			<span class="input-group-text">
	                				<i class="la la-border-style"></i>
	                			</span>
	                		</div>
	                		<textarea class="form-control" name="nm_pertanyaan" placeholder="masukan pertanyaan"></textarea>
	                	</div>
	                	<span class="form-text text-muted">Text Max berisi 244 Karakter</span>
	                </div>
	                <div class="form-group">
	                	<label>Jenis Pertanyaan</label>
	                	<div class="input-group">
	                		<div class="input-group-prepend">
	                			<span class="input-group-text">
	                				<i class="la la-clipboard-list"></i>
	                			</span>
	                		</div>
	                		<select class="form-control" name="type_opsi">
	                			<?php foreach ($alltype as $data): ?>
	                				<option value="<?php echo $data->id_type ?>"><?php echo $data->nm_type ?></option>
	                			<?php endforeach ?>
	                		</select>
	                	</div>
	                	<span class="form-text text-muted">Hanya dapat menggunakan angka</span>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
	                <button type="submit" value="submit" name="submit" class="btn btn-primary font-weight-bold">Masukan Pertanyaan</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal:end -->