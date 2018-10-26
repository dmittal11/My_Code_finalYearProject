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

                        <div class="form-group">
                            <label for="medication_name" class="col-sm-3 control-label">Medication Name<sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="medication_name" type="text" name="medication_name"   placeholder="Medication Name" value="<?php echo set_value('medication_name');?>" />
                            </div>
                        </div>                     

                        <div class="form-group">
                            <label for="quantity" class="col-sm-3 control-label"> Quantity <sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="quantity" type="text" name="quantity"  maxlength="30"  placeholder="Quantity" value="<?php echo set_value('quantity');?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dosage" class="col-sm-3 control-label"> Dosage  <sup style="color: red;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="dosage" type="text" name="dosage"  placeholder="Dosage"  value="<?php echo set_value('dosage');?>"/>
                            </div>
                        </div>

                       <!--  <div class="form-group">
                            <label for="use_of_direction" class="col-sm-3 control-label">Use of direction</label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <textarea class="form-control" id="use_of_direction" name="use_of_direction"></textarea>                                                  
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

        var max_fields = 50; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var select_html = '<?= $products_html ?>';

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click

            //alert($( '.add-users-form' ).serialize());

            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                /*$(wrapper).append('<div class="input_fields_wrap"> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"> </label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-md-4 pd_02"> '+select_html+' </div> <div class="col-md-7 pd_02"> <textarea name="comments[]" class="form-control" placeholder="Produkt-Kommentare" required data-parsley-length="[1, 2500]" maxlength="2500"></textarea> </div> <div class="col-md-1 pd_02"> <a href="javascript:void(0)" class="remove_field btn btn-danger" title="löschen">x</a></div> </div> </div>  </div> </div>  '); *///add input box 

                $(wrapper).append('<div><div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label">  <sup style="color: #9ddb25;">*</sup></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> ' + select_html + ' </div> </div> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> <textarea name="comments[]" class="form-control" placeholder="Produkt-Kommentare" required data-parsley-length="[1, 500]" maxlength="500"></textarea> </div> </div> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> <a href="javascript:void(0)" class="remove_field btn btn-danger" title="löschen">x</a> </div> </div> </div> </div> </div>');


            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            // e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;

            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove();
            x--;
        })
    });


</script>






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