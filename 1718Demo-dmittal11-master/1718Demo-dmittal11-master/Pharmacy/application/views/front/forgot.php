<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot Password</title>
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

        <?php if (isset($success)) : ?>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
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

          <div class="login_section">
                       <div class="logo"><a href="<?=base_url()?>"><h1>Pharmacy</h1></a></div>
            <!--<div class="logo"><a href="<?//=base_url()?>"><img src="<?//= base_url('assets/images/login_logo.png')?>" alt="" /></a></div>-->
            <div class="login_form">
              <h1>Forgot Password</h1>
              <div class="login_field">
                <p>Enter the e-mail address associated with your account.</p>
              <form id="forgot" method="POST" data-parsley-validate>
                  <div class="form-group mg_03">
                    <input class="form-control pd_01" id="exampleInputEmail1" type="email" data-parsley-length="[6, 50]" name="email" maxlength="50" required  placeholder="E-Mail-Adresse"/>
                  </div>
                  <button type="submit" class="button btn-5"> Submit </button>
                </form>
              </div>
            </div>
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
</body>
</html>