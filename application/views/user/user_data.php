<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="#">users</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?>.</td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('user/del') ?>" method="post">
                                    <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"></i> Update
                                    </a>
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->address ?></td>
                            <td><?= $data->level == 1 ? "Admin" : "User" ?></td>

                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>