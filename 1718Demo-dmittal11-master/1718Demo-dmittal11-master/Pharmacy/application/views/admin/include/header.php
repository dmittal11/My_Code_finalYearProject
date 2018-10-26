<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$dashboard = array("dashboard");
$profile = array("profile");
$users = array("userlist", "adduser", "updateusers", "invitation");
$patient = array("patients", "addpatients", "druginteraction", "managedrepeat", "patientforcollection", "patientfordelivery", "contactbook", "diary", "views");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title><?= $page_title ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
        <!-- Menu CSS -->

        <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?= base_url('assets/admin/css/default.css') ?>" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url('assets/validation/dist/parsley.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery --> 
        <script src="<?= base_url('assets/admin/js/jquery.min.js') ?>"></script> 
        <!-- Bootstrap Core JavaScript --> 
        <script src="<?= base_url('assets/admin/js/bootstrap.min.js') ?>"></script> 

        <script src="<?= base_url('assets/admin/js/jquery.dataTables.min.js') ?>"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


<!--<link rel="shortcut icon" href="<?//= base_url('assets/images/favicon.ico')?>" type="image/x-icon" />-->

    </head>

    <body class="fix-header">
        <!-- ============================================================== --> 

        <!-- Wrapper --> 
        <!-- ============================================================== -->
        <div id="wrapper"> 
            <!-- ============================================================== --> 
            <!-- Topbar header - style you can find in pages.scss --> 
            <!-- ============================================================== -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <div class="sidebar-head">
                        <a href="#">
                            <i class="fa fa-times" aria-hidden="true"></i>

                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- Logo --> 
                    <div class="top-left-part">         
                        <a class="logo" href="dashboard"> 
                            <h1>Pharmacy</h1>       
                        </a> 
                    </div>
                    <!-- /Logo -->

                    <ul class="nav navbar-top-links navbar-right pull-right">        
                        <li>
                            <a href="javascript:void(0);"  data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></a>       
                        </li>
                        <li> 
                            <?php
                            $image = explode(".", $this->session->userdata('avatar'));
                            $new_img = base_url() . 'assets/images/users/resize/noimagefound_137x76.jpg';
                            ?>
                            <a class="profile-pic" href="<?= base_url('dashboard') ?>"> <img src="<?= $new_img ?>" alt="user-img"  class="img-circle"><b class="hidden-xs"><?= $this->session->userdata('user_name') ?></b></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header --> 
                <!-- /.navbar-top-links --> 
                <!-- /.navbar-static-side --> 
            </nav>
            <!-- End Top Navigation --> 
            <!-- ============================================================== --> 
            <!-- Left Sidebar - style you can find in sidebar.scss  --> 
            <!-- ============================================================== -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">      
                    <ul class="nav" id="side-menu"> 
                        <li><a href="<?= base_url('admin/dashboard') ?>" class="<?php if (in_array($active_menu, $dashboard)) echo 'active'; ?>"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a></li>
                        <li><a href="<?= base_url('admin/updateprofile') ?> " class="<?php if (in_array($active_menu, $profile)) echo 'active'; ?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Profile</a></li>
                        <li><a href="javascript:void(0)" class="<?php if (in_array($active_menu, $users)) echo 'active'; ?>"><i class="fa fa-users fa-fw" aria-hidden="true"></i>User List</a>
                            <ul class="submenu" style="display: <?php if (in_array($active_menu, $users)) echo 'block;'; ?>" >
                                <li><a href="<?= base_url('admin/userlist') ?>" class="<?php if ('userlist' == $active_menu || 'updateusers' == $active_menu) echo 'active'; ?>">User List</a></li>
                                <li><a href="<?= base_url('admin/adduser') ?>" class="<?php if ('adduser' == $active_menu) echo 'active'; ?>">Add New User</a>
                                </li>         
                            </ul>
                        </li>
                        <li> <a href="javascript:void(0)" class="<?php if (in_array($active_menu, $patient)) echo 'active'; ?> "><i class="fa fa-plus-square-o" aria-hidden="true"></i> Patient Detail </a>
                            <ul class="submenu"   style="display: <?php if (in_array($active_menu, $patient)) echo 'block;'; ?>" >                               
                                <li><a href="<?= base_url('admin/managedrepeat') ?>" class="<?php if ($active_menu == 'managedrepeat') echo 'active'; ?> "> Managed Repeat</a></li>
                                <li><a href="<?= base_url('admin/patientforcollection') ?>" class="<?php if ($active_menu == 'patientforcollection') echo 'active'; ?> "> Patients for collection</a></li>
                                <li><a href="<?= base_url('admin/patientfordelivery') ?>" class="<?php if ($active_menu == 'patientfordelivery') echo 'active'; ?> ">Patients for delivery</a></li>
                                <li><a href="<?= base_url('admin/contactbook') ?>" class="<?php if ($active_menu == 'contactbook') echo 'active'; ?> ">Contact book</a></li>                                  
                            </ul>
                        </li> 
                        <li><a href="<?= base_url('admin/logout') ?>" ><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a></li>      

                    </ul>
                </div>
            </div>
            <!-- ============================================================== --> 
            <!-- End Left Sidebar --> 
            <!-- ============================================================== --> 
            <!-- ============================================================== --> 
            <!-- Page Content --> 
            <!-- ============================================================== -->
            <div id="page-wrapper">

