<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add new Patient</h4>
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
                            <label for="avatar" class="col-sm-3 control-label"> Profile Picture  <br>(Note: Picture should be larger than 130 x 170px)</label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <img src="<?= base_url() ?>assets/images/noimagefound.jpg" id="imgDisplayarea" style="width: 170px;"/>
                                        <div class="upload-btn-wrapper">
                                            <div class="new_btn_upload">
                                                <a class=' green_btn button' href='javascript:;'> Profile Picture
                                                    <input type="file" name="avatar" id="imgShow" data-parsley-filemaxmegabytes="2" data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/png , image/gif" onchange="imagePreview(this)" title="Profile picture" />
                                                </a>  
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-sm-3 control-label"> Gender/Category <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <ul class="form_checkbox">
                                            <li>
                                                <div class="form-group bd_01">
                                                    <input id="checkbox1" name="gender" value="0"   type="radio" checked>
                                                    <label for="checkbox1">Male <span></span></label></div>
                                            </li>
                                            <li>
                                                <div class="form-group bd_01">
                                                    <input id="checkbox2" name="gender" value="1"   type="radio" >
                                                    <label for="checkbox2">Female <span></span></label>  
                                                </div>            
                                            </li>
                                        </ul>
                                    </div>                                  
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">Name <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id=""   value="" name="firstname"  type="text" placeholder="First Name" data-parsley-length="[1, 20]" maxlength="20" required />
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id=""  type="text" value="" name="lastname"   placeholder="Last Name" data-parsley-length="[1, 20]" maxlength="20" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nhs_number" class="col-sm-3 control-label"> NHS Number <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 pd_02 extra_sm_6">
                                <input class="form-control" id="nhs_number" type="text" name="nhs_number" required="true"  placeholder="NHS Number" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"> New & confirm Password <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputPassword3" type="password" name="password" data-parsley-equalto="#inputPassword31" data-parsley-length="[4, 30]" maxlength="30" placeholder="New Password" required />
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputPassword31" type="password" name="cpassword" placeholder="Confirm Password" data-parsley-length="[4, 30]" maxlength="30" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail32" class="col-sm-3 control-label"> New & confirm Email Address <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputEmail3" type="email"  value="" data-parsley-length="[6, 50]" maxlength="50" data-parsley-equalto="#inputEmail32" name="email"  placeholder="Email Address" required />
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputEmail32" type="text"  value="" name="cemail" data-parsley-length="[6, 50]"  maxlength="50" placeholder="Confirm Password" required />
                                    </div>
                                </div>
                            </div>
                        </div>                  


                        <div class="form-group">
                            <label for="inputStreet" class="col-sm-3 control-label"> Street/Number <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-9 pd_02">
                                        <input class="form-control" id="Street" placeholder="Street"  value="" name="rood" data-parsley-length="[2, 50]" maxlength="50"  type="text" required/>
                                    </div>
                                    <div class="col-xs-3 pd_02">
                                        <input class="form-control " id="streetnumber" placeholder="30"  value="" data-parsley-type="digits" name="number" data-parsley-length="[1, 4]" maxlength="4" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPostalcode" class="col-sm-3 control-label">Postal Code/City <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-4 pd_02">
                                        <input class="form-control" id="inputPostalcode" placeholder="" data-parsley-pattern="^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z])))) [0-9][A-Za-z]{2})$"  value="" name="zip"  type="text"  required>
                                    </div>
                                    <div class="col-xs-8 pd_02">
                                        <input class="form-control " id="inputCity" value="" name="place"  placeholder="City" type="text" data-parsley-length="[2, 100]"  maxlength="100" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputTelephone" class="col-sm-3 control-label">Telephone/Fax <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputPhone" value="" name="phone" placeholder="04361 - 62 63 86 " type="text"  data-parsley-type="digits" data-parsley-length="[8, 15]" maxlength="15" required>
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control " id="inputFax" value=""  name="fax" placeholder="52532653256" type="text" data-parsley-type="digits" ata-parsley-length="[2, 20]" maxlength="20">
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label for="inputbtn" class="col-sm-3 control-label"> </label>
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


        var x = 1; //initlal text box count


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