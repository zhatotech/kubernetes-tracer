<div class="container mt-4">
    <div class="mb-4">
        <form action="<?php echo base_url('index.php/utama/dokumen/') ?>" method="post">
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
                            <option value="<?php echo $post['id_kategori'] ?>"><?php echo $this->Admin_m->detail_data('kategori','id_kategori',$post['id_kategori'])->nm_kategori ?></option>
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
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <span class="pcoded-badge label label-primary mb-4"><?php echo $jmldata.' data ditemukan'; ?></span>
            <table class="table mt-2" style="font-size: 13px; text-align: left">
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Kategori</th>
                    <th>Download</th>
                </tr>
                <?php if ($hasil == TRUE): ?>
                    <?php $no = 1+$row ?>
                    <?php foreach ($hasil as $data): ?>
                        <tr >
                            <td style="vertical-align: middle;"><?php echo $no; ?></td>
                            <td style="vertical-align: middle;">
                                <?php echo $data['nm_kategori'].' '; ?> /
                                <?php if ($data['nomor'] == TRUE): ?>
                                    Nomor <?php echo $data['nomor'].' '; ?>
                                <?php endif ?> /
                                <?php if ($data['tahun'] == TRUE): ?>
                                    Tahun <?php echo $data['tahun']; ?>
                                    <?php endif ?><br/>
                                    <a href="<?php echo base_url('assets/dokumen/'.$data['file_dokumen']) ?>" target="_blank"><b><?php echo substr($data['nm_dokumen'],0,65).' ...'; ?></b></a>
                                </td>
                                <td style="vertical-align: middle;"><?php echo $data['nm_kategori'] ?></td>
                                <td style="vertical-align: middle;">
                                    <a class="label-primary" href="<?php echo base_url('assets/dokumen/'.$data['file_dokumen']) ?>" target="_blank"><i class="fa fa-download"></i> Download</a>
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
        </div>
    </div>
</div>