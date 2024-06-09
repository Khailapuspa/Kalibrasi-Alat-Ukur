<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="#">Items</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Product Items</h3>
            <div class="pull-right">
            </div>
        </div>
        <div class="box-body table-responsive">


            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>Category</th>
                        <th>Nama Alat Ukur</th>
                        <th>Departement</th>
                        <th>No Seri</th>
                        <th>Tanggal Pertama Kalibrasi</th>
                        <th>Tanggal Kalibrasi Selanjutnya</th>
                    </tr>
                    </td>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:3%;"> <?= $no++ ?>.</td>
                            <td class="text-center" width="10%">
                                <a href="<?= site_url('historyD/detail/' . $data->code_barang) ?>" target="_blank" class="btn btn-default btn-xs">
                                    Detail <i class="fa fa-pencil-square"></i>
                                </a>
                            </td>
                            <td> <?= $data->jenisalat ?></td>
                            <td> <?= $data->nama_alat_ukur ?></td>
                            <td> <?= $data->pemilik_name ?></td>
                            <td><?= $data->no_seri ?></td>
                            <td> <?= $data->tanggal_pembelian ?></td>
                            <td> <?= $data->selanjutnya ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>