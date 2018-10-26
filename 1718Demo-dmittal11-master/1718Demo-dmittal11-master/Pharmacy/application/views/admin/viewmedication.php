<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">View Medication</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
        <!-- /.col-lg-12 --> 
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <!--form box start-->
                <div class="form-box">
                    <font color="red"> 
                    <?php echo validation_errors(); ?>
                    </font>
                    <?php if ($this->session->flashdata('error_message') != '') : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('error_message'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success_message') != '') : ?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <?= $this->session->flashdata('success_message'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal add-users-form" role="form" id="sign_in" method="POST" enctype="multipart/form-data" data-parsley-validate>

                        <div class="form-group">
                            <label for="medication_name" class="col-sm-3 control-label">Medication Name</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['medication_name']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="medication_patient" class="col-sm-3 control-label"> Patient Name</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?php
                                $userdata = $this->session->userdata();
                                $conditions = array('id' => $medication['patient_id']);
                                $staff = $this->Common_model->select_where('users', $conditions);
                                if ($userdata['user_id'] == $medication['patient_id']) {
                                    echo $userdata['user_name'];
                                } else {
                                    echo $staff['firstname'] . " " . $staff['lastname'];
                                }
                                ?>                                                  
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label"> Quantity</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['quantity']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dosage" class="col-sm-3 control-label"> Dosage </label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['dosage']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="timeduration" class="col-sm-3 control-label">Time duration </label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['time_duration']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_of_direction" class="col-sm-3 control-label">Use of direction</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['use_of_direction']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="use_of_direction" class="col-sm-3 control-label">Shipping Method</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?php if ($medication['shipping_method'] == '1') { ?>
                                    Delivery                               
                                <?php } elseif ($medication['shipping_method'] == '2') { ?>
                                    Collect
                                <?php } else { ?>
                                    -
                                <?php } ?>                               
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="datetimepicker1" class="col-sm-3 control-label">Pickup Date</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?= $medication['pickup_date']; ?>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deliever-medicine" class="col-sm-3 control-label">Deliver as soon as possible</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?php if ($medication['is_deliever_soon']) { ?>
                                    Yes
                                <?php } else { ?>
                                    No
                                <?php } ?>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datetimepicker1" class="col-sm-3 control-label"> Medication Status</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?php
                                if ($medication['medication_status'] == 0 || $medication['medication_status'] == '1') {
                                    echo"In Process";
                                } elseif ($medication['medication_status'] == '2') {
                                    echo "On hold";
                                } elseif ($medication['medication_status'] == '3') {
                                    echo"Cancel";
                                } elseif ($medication['medication_status'] == '4') {
                                    echo "Completed";
                                }
                                ?>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="managed_repeat" class="col-sm-3 control-label">Managed Repeat</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <?php if ($medication['managed_repeat']) { ?>
                                    Yes
                                <?php } else { ?>
                                    No
                                <?php } ?>    
                            </div>
                        </div>

                    </form>
                </div>
                <!--form box end-->
            </div>

        </div>
    </div>
    <!-- /.row --> 
</div>
