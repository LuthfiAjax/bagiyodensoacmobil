<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="R17 Dashboard Creator">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/logo.svg" />

    <!-- tiny -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/templates/'); ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates/'); ?>assets/css/style.css">
    <script src="<?= base_url('assets/tinymce/js/tinymce/'); ?>tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="<?= base_url('assets/templates/'); ?>assets/css/lib/datatable/dataTables.bootstrap.min.css" />

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">Main</li>
                    <li class="<?php if ($title == 'Dashboard') {
                                    echo 'active';
                                } ?>">
                        <a href="<?= base_url('cms/dashboard'); ?>"><i class="menu-icon fa fa-laptop"></i><b>Dashboard</b> </a>
                    </li>

                    <li class="menu-title">Postingan</li>
                    <li class="<?= ($title=='manages news events') ? 'active' : ''; ?>">
                        <a class="mt-0" href="<?= base_url('cms/menages-news-events'); ?>"><i class="menu-icon fa fa-plus-square"></i><b>Menages Post</b></a>
                    </li>

                    <li class="menu-title">Company</li>
                    <li class="<?= ($title=='manages news company') ? 'active' : ''; ?>">
                        <a class="mt-0" href="<?= base_url('cms/company-profile'); ?>"><i class="menu-icon fa fa-plus-square"></i><b>Company Profile</b></a>
                    </li>
                    <li class="<?= ($title=='manages news subscribe') ? 'active' : ''; ?>">
                        <a class="mt-0" href="<?= base_url('cms/subscribe'); ?>"><i class="menu-icon fa fa-plus-square"></i><b>Subscriber</b></a>
                    </li>
                    <li class="<?= ($title=='manages news download') ? 'active' : ''; ?>">
                        <a class="mt-0" href="<?= base_url('cms/download-compro'); ?>"><i class="menu-icon fa fa-plus-square"></i><b>Who Download ?</b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><b><span class="text-primary">Bagiyo</span><span class="text-danger">Denso</span></b></a>

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="row">
                        <?php
                        if ($user['role_id'] == 1) {
                            $permission = "Marketing";
                        }
                        if ($user['role_id'] == 2) {
                            $permission = "HCD";
                        }
                        ?>
                        <div class="col mt-3">
                            <p>Hallo <b><?= $user['nama_user']; ?></b> </p>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" width="200" height="40"
                                src="<?= base_url('assets/img/human.png'); ?>" alt="Photo Profile">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link text-danger" href="<?= base_url('cms-group/logout'); ?>"><i
                                    class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->