<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$dashboard = array("dashboard");
$profile = array("profile");
$users = array("userlist", "adduser", "updateusers", "invitation");
$active_menu = $active;
$patient = array("patients", "addpatients", "druginteraction", "managedrepeat", "patientforcollection", "patientfordelivery", "contactbook", "diary", "views");
$userdata = $this->session->userdata();
$member_type = $userdata['member_type'];
$mymedication_arr = array("mymedication", "delivery", "collection");
$medication = array("medication", "addmedication");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title><?= $title ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- Menu CSS -->

        <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?= base_url('assets/admin/css/default.css') ?>" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url('assets/validation/dist/parsley.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!--<link rel="shortcut icon" href="<?//= base_url('assets/images/favicon.ico')?>" type="image/x-icon" />-->
        <script>
            $(function () {
                $("#datetimepicker1").datepicker().datepicker("setDate", new Date());
                ;
            });
        </script>
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
                            <?php if ($member_type == 'Employee') { ?>
                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></a>
                            <?php } ?>                           
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

                        <li><a href="<?= base_url('dashboard') ?>" class="<?php if ($active == 'dashboard') echo 'active'; ?> "><i class="fa fa-home" aria-hidden="true"></i> Home </a> </li>
                        <?php if ($member_type == 'Employee') { ?>
                          <li> <a href="javascript:void(0)" class="<?php //if (in_array($active, $patient)) echo 'active'; ?> "><i class="fa fa-plus-square-o" aria-hidden="true"></i> Medication </a>
                                <ul class="submenu"   style="display: <?php //if (in_array($active, $medication)) echo 'block;'; ?>" >
                                    <li><a href="<?= base_url('medication') ?>" class="<?php //if ($active == 'medication') echo 'active'; ?> "> Medication</a></li>
                                    <li><a href="<?= base_url('addmedication') ?>" class="<?php //if ($active == 'addmedication') echo 'active'; ?> ">Add Medication</a></li>                                 
                                </ul>
                            </li> 
                            <li> <a href="javascript:void(0)" class="<?php if (in_array($active, $patient)) echo 'active'; ?> "><i class="fa fa-plus-square-o" aria-hidden="true"></i> Patient Detail </a>
                                <ul class="submenu"   style="display: <?php if (in_array($active, $patient)) echo 'block;'; ?>" >
                                    <li><a href="<?= base_url('patients') ?>" class="<?php if ($active == 'patients') echo 'active'; ?> "> Patients</a></li>
                                    <li><a href="<?= base_url('addpatients') ?>" class="<?php if ($active == 'addpatients') echo 'active'; ?> ">Add Patients</a></li>                                  
                                    <li><a href="<?= base_url('managedrepeat') ?>" class="<?php if ($active == 'managedrepeat') echo 'active'; ?> "> Managed Repeat</a></li>
                                    <li><a href="<?= base_url('patientforcollection') ?>" class="<?php if ($active == 'patientforcollection') echo 'active'; ?> "> Patients for collection</a></li>
                                    <li><a href="<?= base_url('patientfordelivery') ?>" class="<?php if ($active == 'patientfordelivery') echo 'active'; ?> ">Patients for delivery</a></li>
                                    <li><a href="<?= base_url('contactbook') ?>" class="<?php if ($active == 'contactbook') echo 'active'; ?> ">Contact book</a></li>                                  
                                </ul>
                            </li>  
                             <li><a href="<?= base_url('medicationstock') ?>" class="<?php if ($active == 'stock management') echo 'active'; ?> "><i class="fa fa-list" aria-hidden="true"></i> Stock Management </a> </li>
                            <?php
                        }
                        if ($member_type == 'Patient') {
                            ?>
                            <li>
                                <a href="javascript:void(0);" class="<?php if ($active == 'mymedication') echo 'active'; ?> "><span><i class="fa fa-medkit" aria-hidden="true"></i></span> My Medication</a>
                                <ul class="submenu"   style="display: <?php if (in_array($active, $mymedication_arr)) echo 'block;'; ?>" >
                                    <li><a href="<?= base_url('mymedication') ?>" class="<?php if ($active == 'mymedication') echo 'active'; ?> "> All Medication</a></li>                                    
                                    <li><a href="<?= base_url('medicationfordelivery') ?>" class="<?php if ($active == 'delivery') echo 'active'; ?> "> Medication for Delivery</a></li>
                                    <li><a href="<?= base_url('medicationforcollect') ?>" class="<?php if ($active == 'collection') echo 'active'; ?> ">Medication for Collect</a></li>                                   
                                </ul>
                            </li>                           
                        <?php }
                        ?>
                        <li>
                            <a href="<?= base_url('updateprofile') ?>" class="<?php if ($active == 'profile') echo 'active'; ?> "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Profile </a> </li>                      
                        <li class="logout"><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout</a></li>                 
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

