<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?= $this->lang->line('text_dashboard') ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <?php //sprintf($this->lang->line('error_activation_key_expired'), base_url());?>
        </div>
        <!-- /.col-lg-12 --> 
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">

                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <a href="<?= base_url('admin/userlist') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content">                                   
                                        <div class="text">Total User</div>
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $userscount ?></div>
                                    </div></center>
                            </div>
                        </a>
                    </div>                                   

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <a href="<?= base_url('admin/patientforcollection') ?>">
                            <div class="info-box bg-orange hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content">
                                        <div class="text">Patient for medication collection</div>
                                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $collection ?></div>
                                    </div></center>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <a href="<?= base_url('admin/userlist?usertype=Employee') ?>">
                            <div class="info-box bg-orange hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content">
                                        <div class="text">Total Staff</div>
                                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $staff ?></div>
                                    </div></center>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <a href="<?= base_url('admin/patientfordelivery') ?>">
                            <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                </div>
                                <center><div class="content">
                                        <div class="text">Patient for medication delivery</div>
                                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $delivery ?></div>
                                    </div></center>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <a href="<?= base_url('admin/contactbook') ?>">
                            <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </div>
                                <center><div class="content">
                                        <div class="text">Contact</div>                                       
                                    </div></center>
                            </div>
                        </a>
                    </div>  


                </div>

            </div>

        </div>
    </div>
    <!-- /.row --> 
</div>