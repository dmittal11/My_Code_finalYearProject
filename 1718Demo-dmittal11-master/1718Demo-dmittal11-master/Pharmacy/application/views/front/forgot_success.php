<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot password</title>
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/animation.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/media.css') ?>" rel="stylesheet">

<!--<link rel="shortcut icon" href="<?//= base_url('assets/images/favicon.ico')?>" type="image/x-icon" />-->


</head>
<body>
<div class="outer">
  <div class="login_page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="login_section">
          <div class="logo"><a href="<?=base_url()?>"><h1>Pharmacy</h1></a></div>
            <!--<div class="logo"><a href="<?//=base_url()?>"><img src="<?//= base_url('assets/images/login_logo.png') ?>" alt="" /></a></div>-->
            <div class="login_form">
              <h1>Forgot Password</h1>
              <div class="login_field password">
                <p>We have sent you an e-mail containing a link.</p>
                <br>
                
                <p>With this link you can create your new password.</p>
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
</body>
</html>