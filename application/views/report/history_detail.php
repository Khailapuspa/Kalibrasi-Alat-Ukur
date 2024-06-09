<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project - by Rpl SMKN4</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.min.css">
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

            </li>

            </ul>
    </div>
    </nav>
    </header>


    <a href="<?= site_url('historyD/detail') ?>">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="<?= base_url() ?>assets/logo/logo.jpeg" alt="User Image">
                                <span class="username"><a href="#">PT. COMPOTEC INTERNASIONAL</a></span>
                                <span class="description">Informasi Data Barang</span>
                            </div>
                            <!-- /.user-block -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if ($row->image != null) { ?>
                                <img src="<?= base_url('uploads/product/' . $row->image) ?>" style="width:20%">
                            <?php } ?>
                            <table>
                                <tr>
                                    <td>Kode Barang</td>
                                    <td>&nbsp;&nbsp;:</td>
                                    <td>&nbsp;&nbsp;<?= $row->code_barang ?></td>
                                </tr>
                                <tr>
                                    <td>No Seri</td>
                                    <td>&nbsp;&nbsp;:</td>
                                    <td>&nbsp;&nbsp;<?= $row->no_seri ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Alat Ukur</td>
                                    <td>&nbsp;&nbsp;:</td>
                                    <td>&nbsp;&nbsp;<?= $row->nama_alat_ukur ?></td>
                                </tr>
                            </table>
                            <br>
                            <button type="button" class="btn btn-default btn-xs"><i class=""></i>Tanggal Kalibrasi Terakhir : <?= $row->kalibrasi ?></button>
                            <button type="button" class="btn btn-default btn-xs"><i class=""></i> Kalibrasi Selanjutnya : <?= $row->selanjutnya ?></button>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer  box-comments">
                            <?php if (!empty($kalibrasi)) : ?>
                                <?php foreach ($kalibrasi as $item) : ?>
                                    <div class="box-comment">

                                        <table>
                                            <tr>
                                                <td>lembaga Kalibrasi</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->lembaga_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Sertifikat</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->no_sertifikat ?></td>
                                            </tr>
                                            <tr>
                                                <td>File Sertifikat </td>

                                                <td>&nbsp;&nbsp;:</td>
                                                <td>
                                                    <a download now href="<?= base_url('uploads/file_sertifikat/' . $item->file_sertifikat) ?>" class="btn btn-default btn-xs">
                                                        Download Sertifikat <i class="fa fa-pencil-square"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->keterangan ?></td>
                                            </tr>
                                            <tr>
                                                <td>Frekuensi Kalibrasi</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= '1x/' . $item->durasi_kalibrasi . 'y' ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ext/Int</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->ext_int ?></td>

                                            </tr>
                                            <tr>
                                                <td>Tanggal Terakhir Kalibrasi</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->tanggal_kalibrasi ?></td>

                                            </tr>
                                            <tr>
                                                <td>Kalibrasi Selanjutnya</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $item->selanjutnya ?></td>

                                            </tr>
                                        </table>
                                        <!-- /.comment-text -->
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="box-comment">

                                    <table>
                                        <tr>
                                            <td>lembaga Kalibrasi</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>No Sertifikat</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>File Sertifikat </td>

                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;

                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Frekuensi Kalibrasi</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Ext/Int</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>

                                        </tr>
                                        <tr>
                                            <td>Tanggal Terakhir Kalibrasi</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>

                                        </tr>
                                        <tr>
                                            <td>Kalibrasi Selanjutnya</td>
                                            <td>&nbsp;&nbsp;:</td>
                                            <td>&nbsp;&nbsp;</td>

                                        </tr>
                                    </table>
                                    <!-- /.comment-text -->
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- /.box-footer -->
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
        <div>

        </div>



        <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>


        <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2()
                $('#table1').DataTable()
            })
        </script>