<section class="content-header">
    <h1>kalibrasi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">kalibrasi</i>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data kalibrasi</h3>
            <div class="pull-right">
                <a href="<?= site_url('kalibrasi/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>Code Barang</th>
                        <th>Lembaga Kalibrasi</th>
                        <th>No Sertifikat</th>
                        <th>File Sertikat</th>
                        <th>Keterangan</th>
                        <th>Frekuensi Kalibrasi</th>
                        <th>External/Internal</th>
                        <th>Tanggal Kalibrasi</th>
                        <th>Selanjutnya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:3%;"><?= $no++ ?>.</td>
                            <td class="text-center" width="170px">
                                <a href="<?= site_url('kalibrasi/edit/' . $data->kalibrasi_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('kalibrasi/del/' . $data->kalibrasi_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                            <td><?= $data->code_barang ?></td>
                            <td><?= $data->lembaga_name ?></td>
                            <td><?= $data->no_sertifikat ?></td>
                            <td>
                                <?php if ($data->file_sertifikat != null) { ?>
                                    <img src="<?= base_url('uploads/file_sertifikat/' . $data->file_sertifikat) ?>" style="width:100px">
                                <?php } ?>
                            </td>
                            <td><?= $data->keterangan ?></td>
                            <td><?= '1x/' . $data->durasi_kalibrasi . 'y' ?></td>
                            <td><?= $data->ext_int ?></td>
                            <td><?= $data->tanggal_kalibrasi ?></td>
                            <td><?= $data->selanjutnya ?></td>

                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>