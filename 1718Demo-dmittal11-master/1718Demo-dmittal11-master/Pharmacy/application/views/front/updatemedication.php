<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Update Medication</h4>
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
                            <label for="medication_name" class="col-sm-3 control-label">Medication Name<sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="medication_name" type="text" name="medication_name" value="<?= ($medication['medication_name']?$medication['medication_name']:set_value('medication_name')); ?>"  placeholder="Medication Name" />
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label"> Quantity<sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="quantity" type="text" value=" <?= ($medication['quantity']?$medication['quantity']:set_value('quantity')); ?>" name="quantity"  maxlength="30"  placeholder="Quantity" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dosage" class="col-sm-3 control-label"> Dosage<sup style="color: red;">*</sup> </label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="dosage" value="<?= ($medication['dosage']?$medication['dosage']:set_value('dosage')); ?>" type="text" name="dosage"  placeholder="Dosage" />
                            </div>
                        </div>                       
                     
                       <!--  <div class="form-group">
                            <label for="use_of_direction" class="col-sm-3 control-label">Use of direction</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <textarea class="form-control" id="use_of_direction" name="use_of_direction"><?= $medication['use_of_direction']; ?></textarea>                                                            
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"> </label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-12 pd_02">
                                        <button type="button" class="button btn btn-warning" onClick="window.location.reload();"> Cancel </button>
                                        <button type="submit" class="button btn btn-success"> Save </button>
                                    </div>

                                </div>
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




<script type="text/javascript">

    $(document).ready(function () {

        $("form").parsley();

        $.listen('parsley:form:success', function (ParsleyForm) {


            ParsleyForm.$element.find('button').prop('disabled', false);
            ParsleyForm.$element.find('button').removeClass("grey_btn").addClass("green_btn");
            $('.search_submit_btn').removeClass("green_btn");

        });

        $.listen('parsley:form:error', function (ParsleyForm) {

            ParsleyForm.$element.find('button').prop('disabled', true);
            ParsleyForm.$element.find('button').removeClass("green_btn").addClass("grey_btn");
            $('.search_submit_btn').removeClass("green_btn");


        });

        $("form :input").change(function () {

            $(this).closest('form').parsley().validate();
        });

    });


</script>