<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/animation.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/media.css') ?>" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/validation/src/parsley.css') ?>" rel="stylesheet">

<!--<link rel="shortcut icon" href="<?//= base_url('assets/images/favicon.ico')?>" type="image/x-icon" />-->
</head>
<body>
<div class="outer">
  <div class="login_page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($error)) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error_message')!='') : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error_message'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success_message')!='') : ?>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('success_message'); ?>
                </div>
            </div>
        <?php endif; ?>


          <div class="login_section">
                       <div class="logo"><a href="<?=base_url()?>"><h1>Pharmacy</h1></a></div>
            <!--<div class="logo"><a href="<?//=base_url()?>"><img src="<?//= base_url('assets/images/login_logo.png') ?>" alt="" /></a></div>-->
            <div class="login_form">
              <h1>Registration</h1>
              <div class="login_field">

               <form id="sign_in" method="POST" data-parsley-validate>
                  <div class="form-group">
                    <div class="form_icon"><img src="<?= base_url('assets/images/close-envelope.png') ?>" alt=""/></div>
                    <input class="form-control" id="exampleInputEmail1" type="email" data-parsley-multiple-of1 name="email" data-parsley-length="[6, 50]" maxlength="50" required placeholder="E-Mail"/>
                  </div>

                  <div class="form-group">
                    <div class="form_icon"><img src="<?= base_url('assets/images/lock.png') ?>" alt=""/></div>
                    <input class="form-control" id="exampleInputPassword1"  name="password" type="password" data-parsley-equalto="#exampleInputPassword12" data-parsley-length="[4, 30]" maxlength="30" required placeholder="Password"/>
                  </div>

                    <div class="form-group bd_01">
                    <div class="form_icon"><img src="<?= base_url('assets/images/lock.png') ?>" alt=""/></div>
                    <input class="form-control" id="exampleInputPassword12" name="cpassword" type="password" data-parsley-length="[4, 30]" maxlength="30" required placeholder="Confirm password"/>
                  </div>               
                 
                  <button type="submit" class="button btn-5"> Register </button>
                </form>
              </div>
            </div>
              <div class="login-registration-link">
                  <p> You are already registered? <a href="<?=base_url()?>" class="forget_password"> Log In </a> </p></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script src="<?= base_url('assets/validation/dist/parsley.js')?>"></script>
<script src="<?= base_url('assets/validation/dist/i18n/en.js')?>"></script>
<!--<script src="<?//= base_url('assets/validation/dist/i18n/de.js')?>"></script>-->
</body>
</html>