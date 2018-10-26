<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reset Password</title>
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/animation.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/media.css') ?>" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/validation/src/parsley.css') ?>" rel="stylesheet">


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

          <div class="login_section">
             <div class="logo"><a href="<?=base_url()?>"><h1>Pharmacy</h1></a></div>          
            <div class="login_form">
              <h1>New Password</h1>
              <div class="login_field new_password">
                <p>Create your new password.</p>                
              <div class="cahnge_passowrd">
                <form id="password_reset" method="POST" data-parsley-validate>
                  <div class="form-group">
                    <input class="form-control pd_01" id="exampleInputEmail1" type="password"  data-parsley-equalto="#exampleInputEmail12" data-parsley-length="[4, 30]" maxlength="30" name="password" required placeholder="New Password"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control pd_01" id="exampleInputEmail12" type="password" name="cpassword"  data-parsley-length="[4, 30]" maxlength="30"  required placeholder="Confirm Password"/>
                  </div>
                  <input type="hidden" name="fp_code" value="<?=$fp_code; ?>"/>
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
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script src="<?= base_url('assets/validation/dist/parsley.js')?>"></script>
</body>
</html>