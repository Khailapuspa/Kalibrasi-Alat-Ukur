<section class="content-header">
    <h1>Frekuensi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Frekuensi</i>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Frekuensi</h3>
            <div class="pull-right">
                <a href="<?= site_url('durasi/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Frekuensi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td><?= '1x/' . $data->durasi_kalibrasi . 'y' ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('durasi/edit/' . $data->id_durasi_kalibrasi) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?= site_url('durasi/del/' . $data->id_durasi_kalibrasi) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>