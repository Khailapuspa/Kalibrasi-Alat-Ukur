<section class="content-header">
    <h1>Kalibrasi
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kalibrasi</i>
    </ol>
</section>

<!-- Main content -->
<section class="d-flex justify-content-between">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?>Kalibrasi</h3>
            <div class="pull-right">
                <a href="<?= site_url('kalibrasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <?php echo form_open_multipart('kalibrasi/process') ?>
                        <input type="hidden" name="id" value="<?= $row->kalibrasi_id ?>">
                        <div class="form-group">
                            <label>Code Barang *</label>
                            <?php echo form_dropdown(
                                'code_barang',
                                $item,
                                $selecteditem,
                                ['class' => 'form-control select2', 'required' => 'required', 'width' => '100%']
                            ) ?>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name="jenisalat" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Alat Ukur</label>
                            <input type="text" name="nama_alat_ukur" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Departement</label>
                            <input type="text" name="pemilik" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>No Seri</label>
                            <input type="text" name="no_seri" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <input type="date" name="tanggal_pembelian" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Range</label>
                            <input type="text" name="range" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Akurasi</label>
                            <input type="text" name="akurasi" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label>Lembaga *</label>
                            <?php echo form_dropdown(
                                'lembaga',
                                $lembaga,
                                $selectedlembaga,
                                ['class' => 'form-control', 'required' => 'required']
                            ) ?>
                        </div>
                        <div class="form-group">
                            <label>No Sertifikat</label>
                            <input type="text" name="no_sertifikat" value="<?= $row->no_sertifikat  ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>File Sertifikat</label>
                            <?php if ($page == 'edit') {
                                if ($row->file_sertifikat != null) { ?>
                                    <div style="margin-bottom:4px">
                                        <img src="<?= base_url('./uploads/file_sertifikat/' . $row->file_sertifikat) ?>" style="width:80%">
                                    </div>
                            <?php
                                }
                            } ?>
                            <input type="file" name="file_sertifikat" class="form-control">
                            <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" value="<?= $row->keterangan  ?>" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Frekuensi Kalibrasi *</label>
                            <select name="durasi_kalibrasi" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($durasi_kalibrasi->result() as $item) : ?>
                                    <option value="<?= $item->durasi_kalibrasi ?>"><?= '1x/' . $item->durasi_kalibrasi . 'y' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>External/Internal *</label>
                            <select name="ext_int" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="external" <?= $row->ext_int == 'external' ? 'selected' : '' ?>>External</option>
                                <option value="internal" <?= $row->ext_int == 'internal' ? 'selected' : '' ?>>Internal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kalibrasi</label>
                            <input type="date" name="tanggal_kalibrasi" value="<?= $row->tanggal_kalibrasi  ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="Reset" class="btn btn-flat">Reset</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>


    </div>
    </div>

</section>
<script>
    loaddata("<?= $row->code_barang ?>")

    function loaddata(id) {

        $.ajax({
            type: 'GET',
            url: '<?= site_url('kalibrasi/detail/') ?>' + id,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $('input[name=jenisalat]').val(data.jenisalat)
                $('input[name=nama_alat_ukur]').val(data.nama_alat_ukur)
                $('input[name=merk]').val(data.merk)
                $('input[name=no_seri]').val(data.no_seri)
                $('input[name=category]').val(data.category)
                $('input[name=pemilik]').val(data.pemilik)
                $('input[name=range]').val(data.range)
                $('input[name=akurasi]').val(data.akurasi)
                $('input[name=tanggal_pembelian]').val(data.tanggal_pembelian)
            }
        });
    }
    $('select[name=code_barang]').on('change', function() {
        $.ajax({
            type: 'GET',
            url: '<?= site_url('kalibrasi/detail/') ?>' + this.value,

            dataType: 'json',
            success: function(data) {
                console.log(data)
                $('input[name=jenisalat]').val(data.jenisalat)
                $('input[name=nama_alat_ukur]').val(data.nama_alat_ukur)
                $('input[name=merk]').val(data.merk)
                $('input[name=no_seri]').val(data.no_seri)
                $('input[name=category]').val(data.category)
                $('input[name=pemilik]').val(data.pemilik)
                $('input[name=range]').val(data.range)
                $('input[name=akurasi]').val(data.akurasi)
                $('input[name=tanggal_pembelian]').val(data.tanggal_pembelian)
            }
        });
    });
</script>