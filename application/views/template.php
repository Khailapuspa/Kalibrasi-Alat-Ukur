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
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <span class="logo-mini"><b>C</b></span>
        <span class="logo-lg"><b>Compotec</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              </a>
              <ul class="dropdown-menu">

                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </ul>
            </li>
            <!-- User Account-->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/logo/logo compotec3.jpg" class="user-image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img class="img-circle" src="<?= base_url() ?>assets/logo/logo compotec3.jpg">
                  <p><?= $this->fungsi->user_login()->name ?>
                    <small><?= $this->fungsi->user_login()->address ?></small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="text-center">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat bg-red">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- left side colum -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img class="img-circle" src="<?= base_url() ?>assets/logo/logo compotec3.jpg" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
          </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
          </div>
        </form>
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href=" <?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'pemilik' || $this->uri->segment(1) == 'range' || $this->uri->segment(1) == 'akurasi' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Master Peralatan</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href=" <?= site_url('category') ?>"><i class="fa fa-circle-o"></i> Category</a></li>
              <li <?= $this->uri->segment(1) == 'pemilik' ? 'class="active"' : '' ?>><a href=" <?= site_url('pemilik') ?>"><i class="fa fa-circle-o"></i> Departement</a></li>
              <li <?= $this->uri->segment(1) == 'range' ? 'class="active"' : '' ?>><a href=" <?= site_url('range') ?>"><i class="fa fa-circle-o"></i> Range</a></li>
              <li <?= $this->uri->segment(1) == 'akurasi' ? 'class="active"' : '' ?>><a href=" <?= site_url('akurasi') ?>"><i class="fa fa-circle-o"></i> Akurasi</a></li>
            </ul>
          </li>
          <li <?= $this->uri->segment(1) == 'item'  || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('item') ?>"><i class="fa fa-industry"></i> <span>Peralatan</span></a>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'durasi' || $this->uri->segment(1) == 'lembaga' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa  fa-navicon"></i> <span>Master Kalibrasi</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'durasi' ? 'class="active"' : '' ?>><a href="<?= site_url('durasi') ?>"><i class="fa fa-circle-o"></i> Frekuensi Kalibrasi</a></li>
              <li <?= $this->uri->segment(1) == 'lembaga' ? 'class="active"' : '' ?>><a href="<?= site_url('lembaga') ?>"><i class="fa fa-circle-o"></i> Lembaga Kalibrasi</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'kalibrasi' || $this->uri->segment(1) == 'kadaluarsa' || $this->uri->segment(1) == 'monitoring' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Kalibrasi</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'kalibrasi' ? 'class="active"' : '' ?>><a href=" <?= site_url('kalibrasi') ?>"><i class="fa fa-circle-o"></i>Input Data Kalibrasi </a></li>
              <li <?= $this->uri->segment(1) == 'kadaluarsa' ? 'class="active"' : '' ?>><a href=" <?= site_url('kadaluarsa') ?>"><i class="fa fa-circle-o"></i>Kadaluarsa</a></li>
              <li <?= $this->uri->segment(1) == 'monitoring' ? 'class="active"' : '' ?>><a href=" <?= site_url('monitoring') ?>"><i class="fa fa-circle-o"></i>Monitoring</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'history' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-exclamation-circle"></i> <span>Reports</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'history' ? 'class="active"' : '' ?>><a href="<?= site_url('history') ?>"><i class="fa fa-circle-o"></i> History Data Kalibrasi</a></li>

            </ul>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">SETTING</li>
            <li <?= $this->uri->segment(1) == 'user'  || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <li><a href="<?= site_url('user') ?>"><i class="fa fa-users"></i> <span>Users</span></a></i>
            <li <?= $this->uri->segment(1) == 'email'  || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <li><a href="<?= site_url('email/sendmail') ?>"><i class="fa fa-users"></i> <span>Email</span></a></i>
            <?php } ?>
        </ul>
      </section>
    </aside>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <?php echo $contents  ?>
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
        $('.table#table1').DataTable()
      })
    </script>