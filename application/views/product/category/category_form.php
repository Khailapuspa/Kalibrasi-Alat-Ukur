<section class="content-header">
    <h1>Category
        <small>Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</i>
    </ol>
</section>

<!-- Main content -->
<?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= ucfirst($page) ?>Category</h3>
        <div class="pull-right">
            <a href="<?= site_url('category') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Backs
            </a>
        </div>
        <div class="box-body">
            <div class="col-md-4 col-md-offset-4">
                <form action="<?= site_url('category/process') ?>" method="post">
                    <div class="form-group">
                        <label for="code_category">Code Category *</label>
                        <input type="hidden" name="id" value="<?= $row->category_id ?>">
                        <input type="text" name="code_category" value="<?= $row->code_category ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Alat *</label>
                        <input type="hidden" name="id" value="<?= $row->category_id ?>">
                        <input type="text" name="jenisalat" value="<?= $row->jenisalat ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Fungsi *</label>
                        <input type="hidden" name="id" value="<?= $row->category_id ?>">
                        <input type="text" name="fungsi" value="<?= $row->fungsi ?>" class="form-control" required>

                    </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"></i> Save
                    </button>
                    <button type="Reset" class="btn btn-flat">Reset</button>

                </div>
                </form>
            </div>
        </div>
        </form>
        </form>
    </div>
</div>
</div>
</div>