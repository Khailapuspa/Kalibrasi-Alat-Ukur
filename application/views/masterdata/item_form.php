<section class="content-header">
    <h1>item
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">items</i>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?>Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Backs
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 ">

                    <?php echo form_open_multipart('item/process') ?>
                    <input type="hidden" name="id" value="<?= $row->item_id ?>">

                    <div class="form-group">
                        <label>Kode Barang (kosongkan jika ingin generate code otomatis)</label>
                        <input type="text" name="code_barang" value="<?= $row->code_barang ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <?php echo form_dropdown(
                            'category',
                            $category,
                            $selectedcategory,
                            ['class' => 'form-control', 'required' => 'required']
                        ) ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_alat_ukur">Nama Alat Ukur*</label>
                        <input type="text" name="nama_alat_ukur" value="<?= $row->nama_alat_ukur ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" name="merk" value="<?= $row->merk ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Departement *</label>
                        <?php echo form_dropdown(
                            'pemilik',
                            $pemilik,
                            $selectedpemilik,
                            ['class' => 'form-control', 'required' => 'required']
                        ) ?>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label>No Seri </label>
                        <input type="text" name="no_seri" value="<?= $row->no_seri ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Perolehan</label>
                        <input type="date" name="tanggal_pembelian" value="<?= $row->tanggal_pembelian  ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Range *</label>
                        <?php echo form_dropdown(
                            'range',
                            $range,
                            $selectedrange,
                            ['class' => 'form-control', 'required' => 'required']
                        ) ?>
                    </div>
                    <div class="form-group">
                        <label>Akurasi *</label>
                        <?php echo form_dropdown(
                            'akurasi',
                            $akurasi,
                            $selectedakurasi,
                            ['class' => 'form-control', 'required' => 'required']
                        ) ?>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <?php if ($page == 'edit') {
                            if ($row->image != null) { ?>
                                <div style="margin-bottom:4px">
                                    <img src="<?= base_url('uploads/product/' . $row->image) ?>" style="width:80%">
                                </div>
                        <?php
                            }
                        } ?>
                        <input type="file" name="image" class="form-control">
                        <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save
                        </button>
                        <button type="Reset" class="btn btn-flat">Reset</button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>

    </div>
    </div>
</section>