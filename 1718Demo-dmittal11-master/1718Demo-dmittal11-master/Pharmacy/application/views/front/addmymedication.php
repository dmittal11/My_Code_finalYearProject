<style>
/*body{width:610px;}*/
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:96%;position: absolute;    z-index: 999;  height: 330%;
    overflow-y: scroll;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}

</style>

<script>
$(document).ready(function(){
    $("#medication_name").keyup(function(){
        $.ajax({
        type: "POST",
        url: "<?php echo base_url('UserController/getMedicaton');?>",
        data:'keyword='+$(this).val(),
        // beforeSend: function(){
        //     $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        // },
        success: function(data){ //alert(data);
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
           // $("#search-box").css("background","#FFF");
        }
        });
    });
});

function selectCountry(val,id) { 
$("#medication_name").val(val);
$("#medication_id").val(id);
$("#suggesstion-box").hide();
}
</script>

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add New Medication</h4>
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
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?= $this->session->flashdata('error_message'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success_message') != '') : ?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?= $this->session->flashdata('success_message'); ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <form class="form-horizontal add-users-form" role="form" id="sign_in" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        <input type="hidden" id="medication_patient" name="medication_patient" value="<?php echo $user_id; ?>" />

                        <div class="form-group">
                            <label for="medication_name" class="col-sm-3 control-label">Medication Name<sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="medication_name" type="text" name="medication_name"   placeholder="Medication Name" autocomplete="off" value="<?php echo set_value('medication_name');?>" />
                                <input type="hidden" name="medication_id" id="medication_id" value="<?php echo set_value('medication_id');?>">
                               <!--  <input type="text" id="search-box" placeholder="Country Name" /> -->
                                <div id="suggesstion-box"></div>
                            </div>
                        </div>       

                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label"> Quantity<sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="quantity" type="text" name="quantity"  maxlength="30"  placeholder="Quantity"  value="<?php echo set_value('quantity');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dosage" class="col-sm-3 control-label"> Dosage <sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="dosage" type="text" name="dosage"  placeholder="Dosage"  value="<?php echo set_value('dosage');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="timeduration" class="col-sm-3 control-label">Time duration <sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="timeduration" type="text"   name="timeduration"  placeholder="Time Duration"  value="<?php echo set_value('timeduration');?>" />
                            </div>
                        </div>
                        <input type="hidden" name="use_of_direction" value="">
                        <!-- <div class="form-group">
                            <label for="use_of_direction" class="col-sm-3 control-label">Use of direction</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">

                                <textarea class="form-control" id="use_of_direction" name="use_of_direction"></textarea>                                                  
                            </div>
                        </div> -->
                        <div class="form-group" id="shipping-method-div">
                            <label for="use_of_direction" class="col-sm-3 control-label">Shipping Method <sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input type="radio"  id="deliever-medicine" name="shipping_method" value="1" <?php if(set_value('shipping_method')==1){ echo "checked"; }?>/> Delivery
                                <input type="radio" id="collect-medicine" name="shipping_method" <?php if(set_value('shipping_method')==2){ echo "checked"; }?> value="2"/> Collect
                            </div>
                        </div>
                        <div class="" id="medicine-delivery-section" >
                            <div class="form-group">
                                <label for="datetimepicker1" class="col-sm-3 control-label">Pickup Date</label>
                                <div class="col-sm-6 pd_02 extra_sm_6">
                                    <input name="pickup_date" type="text" id="datetimepicker1" data-date-format='yy-mm-dd'>                               
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deliever-medicine" class="col-sm-3 control-label"></label>
                                <div class="col-sm-6 pd_02 extra_sm_6">
                                    <input type="checkbox"  id="" name="is_deliever_soon" value="1"/> Deliever as soon as possible                               
                                </div>
                            </div>
                        </div>
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
    $(function () {
        $('#medicine-delivery-section').hide();
        $('#shipping-method-div').on('click', 'input[type=radio]', function () {
            if (this.id == "deliever-medicine" && this.checked) {
                $('#medicine-delivery-section').show();
            } else {
                $('#medicine-delivery-section').hide();
            }
        });

    });


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