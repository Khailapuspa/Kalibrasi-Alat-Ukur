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
                <a href="<?= site_url('item/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Product Items
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1" style="width:150%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Actions</th>
                        <th>Code Barang</th>
                        <th>Category</th>
                        <th>Nama Alat Ukur</th>
                        <th>Merk</th>
                        <th>Departement</th>
                        <th>No Seri</th>
                        <th>Tanggal Pembelian</th>
                        <!-- <th>Fungsi</th> -->
                        <th>Range</th>
                        <th>Akurasi</th>
                        <th>Tanggal Kalibrasi</th>
                        <th>Next Kalibrasi</th>
                        <th>Image</th>
                    </tr>
                    </td>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:3%;"> <?= $no++ ?>.</td>
                            <td class="text-center" width="170px">
                                <a href="<?= site_url('detail/detail_QrCode/' . $data->code_barang) ?>" target="_blank" class="btn btn-default btn-xs">
                                    Detail <i class="fa fa-pencil-square"></i>
                                </a>
                                <a download now href="<?= base_url('assets/logo/' . $data->code_barang . '.png') ?>" target="_blank" class="btn btn-default btn-xs">
                                    Cetak QrCode <i class="fa fa-pencil-square"></i>
                                </a>
                                <a href="<?= site_url('item/edit/' . $data->code_barang) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil-square-o"></i> Update
                                </a>
                                <a href="<?= site_url('item/del/' . $data->item_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                            <td><?= $data->code_barang ?></td>
                            <td> <?= $data->jenisalat ?></td>
                            <td> <?= $data->nama_alat_ukur ?></td>
                            <td> <?= $data->merk ?></td>
                            <td> <?= $data->pemilik_name ?></td>
                            <td><?= $data->no_seri ?></td>
                            <td> <?= $data->tanggal_pembelian ?></td>
                            <td> <?= $data->range_name ?></td>
                            <td> <?= $data->akurasi_name ?></td>
                            <td> <?= $data->kalibrasi ?></td>
                            <td> <?= $data->selanjutnya ?></td>
                            <td>
                                <?php if ($data->image != null) { ?>
                                    <img src="<?= base_url('uploads/product/' . $data->image) ?>" style="width:80px">
                                <?php } ?>
                            </td>

                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>