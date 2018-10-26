<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Hello <?= $this->session->userdata('user_name') ?>!</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">         
        </div>
        <!-- /.col-lg-12 --> 
    </div>
    <!-- /row -->
    <?php
    $userdata = $this->session->userdata();
    $member_type = $userdata['member_type'];   
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">

                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <?php if($member_type =='Employee'){ ?>
                        <a href="<?= base_url('patients') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content"> 
                                      <div class="text">Total Patient</div>                                      
                                      <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $userscount->totaluser; ?></div>                                                                          
                                    </div>
                                </center>
                            </div>
                        </a>
                        <?php  }else{ ?>
                        <a href="<?= base_url('updateprofile') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content"> 
                                      <div class="text">Edit Profile</div>  
                                    </div>
                                </center>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <?php if($member_type =='Employee'){ ?>
                           <a href="<?=base_url('managedrepeat')?>">
                              <div class="info-box bg-cyan hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                               </div>
                              <center><div class="content">
                                  <div class="text">Managed Repeat</div>
                                 <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $repeat->totalmedication; ?></div>
                              </div></center>
                            </div>
                           </a>
                        <?php  } else{ ?>
                        <a href="<?= base_url('mymedication') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content"> 
                                      <div class="text">All Medication</div>                                      
                                      <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $all; ?></div>                                                                          
                                    </div>
                                </center>
                            </div>
                        </a>
                        <?php } ?>       
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                       <?php if($member_type =='Employee'){ ?>
                       <a href="<?=base_url('patientforcollection')?>">
                           <div class="info-box bg-light-green hover-expand-effect">
                                <div class="icon">
                                  <i class="fa fa-product-hunt" aria-hidden="true"></i>
                               </div>
                               <center><div class="content">
                                 <div class="text">Patients Medication for collection</div>
                                  <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $collection->totalmedication; ?></div>
                               </div></center>
                           </div>
                           </a>
                        <?php  } else{ ?>
                        <a href="<?= base_url('medicationforcollect') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content"> 
                                      <div class="text">Medication For Collection</div>                                      
                                      <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $collection; ?></div>                                                                          
                                    </div>
                                </center>
                            </div>
                        </a>
                        <?php } ?>          
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                         <?php if($member_type =='Employee'){ ?>
                       <a href="<?=base_url('patientfordelivery')?>">
                            <div class="info-box bg-orange hover-expand-effect">
                               <div class="icon">
                                   <i class="fa fa-comment" aria-hidden="true"></i>
                              </div>
                              <center> <div class="content">
                                   <div class="text">Patients Medication for Delivery</div>
                                   <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $delivery->totalmedication; ?></div>
                               </div></center>
                          </div>
                           </a>
                        <?php  } else{ ?>
                        <a href="<?= base_url('medicationfordelivery') ?>">
                            <div class="info-box bg-pink hover-expand-effect">
                                <div class="icon">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                                <center> <div class="content"> 
                                      <div class="text">Medication for Delivery</div>                                      
                                      <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $delivery; ?></div>                                                                          
                                    </div>
                                </center>
                            </div>
                        </a>
                        <?php } ?>     
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dashboard-info-box">
                        <?php if($member_type =='Employee'){ ?>
                     <a href="<?=base_url('contactbook')?>">
                          <div class="info-box bg-orange hover-expand-effect">
                             <div class="icon">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                           </div>
                           <center> <div class="content">
                                <div class="text">Contact</div>
                                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $userscount->totaluser; ?></div>
                            </div></center>
                         </div>
                         </a>
                         <?php  } ?>   
                    </div>


                </div>

            </div>

        </div>
    </div>
    <!-- /.row --> 
</div>
