<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Profile</h4>
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

                        <!--<div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success_message'); ?>
                            </div>
                        </div>-->
                    <?php endif; ?>


                    <form class="form-horizontal" role="form" id="sign_in" method="POST" enctype="multipart/form-data" data-parsley-validate>

                        <div class="form-group">
                            <label for="inputAvatar" class="col-sm-3 control-label"> Profile Photo  <br>(Note: Picture should be larger than 130 x 170px)</label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <?php
                                        if ($user_info->avatar != '' && $user_info->avatar != 'default.jpg') {

                                            $image = explode(".", $user_info->avatar);
                                            $new_img = base_url() . 'assets/images/users/resize/' . $image[0] . '_136x136.' . $image[1];
                                        } else {
                                            $new_img = base_url() . "assets/images/noimagefound.jpg";
                                        }
                                        ?>

                                        <img src="<?= $new_img ?>" id="imgDisplayarea" alt="" style=" width: 170px; height: 130px;"/>
                                        <div class="upload-btn-wrapper">


                                            <div class="new_btn_upload">

                                                <a class=' green_btn button' href='javascript:;'> choose picture
                                                    <input type="file" name="avatar" id="imgShow" title="Bild hochladen" data-parsley-filemaxmegabytes="2" data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/png , image/gif" onchange="imagePreview(this)" />
                                                </a>                           

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputMembertype" class="col-sm-3 control-label"> Gender  <?php if ($user_info->is_admin == '0') { ?>, User Type <?php } ?> <sup style="color: #9ddb25;">*</sup> </label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <ul class="form_checkbox">
                                            <li>
                                                <div class="form-group bd_01">
                                                    <input id="checkbox1" name="gender" value="0"  <?php if ($user_info->gender == 0) echo 'checked'; ?> type="radio">
                                                    <label for="checkbox1">Male <span></span></label></div>
                                            </li>
                                            <li><div class="form-group bd_01">
                                                    <input id="checkbox2" name="gender" value="1"  <?php if ($user_info->gender == 1) echo 'checked'; ?> type="radio">
                                                    <label for="checkbox2">Female <span></span></label></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if ($user_info->is_admin == '0') { ?>
                                        <div class="col-sm-6 pd_02">
                                            <select class="form-control" name="member_type"  required="">
                                                <option value="">--- Category ---</option>

                                                <option value="Employee" <?php if ($user_info->member_type == 'Employee') echo 'selected'; ?>>Employee</option>

                                                <option value="Patient" <?php if ($user_info->member_type == 'Patient') echo 'selected'; ?>>Patient</option>

                                            </select>                                       

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label"> Name <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputFirstName"   value="<?= $user_info->firstname; ?>" name="firstname"  type="text" placeholder="First Name" data-parsley-length="[1, 20]" maxlength="20" required />
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputLastName"  type="text" value="<?= $user_info->lastname; ?>" name="lastname"   data-parsley-length="[1, 20]" maxlength="20" placeholder="Last Name" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">New password, Confirm new password </label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputPassword3" type="password" name="password" data-parsley-equalto="#inputPassword31" data-parsley-length="[4, 30]" maxlength="30" placeholder="New PAssword" />
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputPassword31" type="password" name="cpassword" placeholder="Confirm New Password" data-parsley-length="[4, 30]" maxlength="30"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"> New e-mail address, Confirm New e-mail  <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputEmail3" type="email" value="<?= $user_info->email; ?>" data-parsley-equalto="#inputEmail32" name="email"  data-parsley-length="[6, 50]" maxlength="50" placeholder="New Email Address" required /> 
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputEmail32" type="text"  value="<?= $user_info->email; ?>" name="cemail"  data-parsley-length="[6, 50]" maxlength="50" placeholder="Confirm New Email Address" required />
                                    </div>
                                </div>
                            </div>
                        </div>               

                        <div class="form-group">
                            <label for="inputStreet" class="col-sm-3 control-label">Street/Number <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-9 pd_02">
                                        <input class="form-control" id="inputStreet" placeholder="Street"  value="<?= $user_info->rood; ?>" name="rood" data-parsley-length="[2, 50]" maxlength="50"  type="text" required/>
                                    </div>
                                    <div class="col-xs-3 pd_02">
                                        <input class="form-control " id="inputStreetNumber" placeholder="" value="<?= $user_info->number; ?>" data-parsley-type="digits" name="number" data-parsley-length="[1, 4]" maxlength="4" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPostalcode" class="col-sm-3 control-label"> Postal Code/City <sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-4 pd_02">
                                        <input class="form-control" id="inputPostalcode" placeholder=""  data-parsley-pattern="^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z])))) [0-9][A-Za-z]{2})$" value="<?= $user_info->zip; ?>" name="zip"   type="text" required>
                                    </div>
                                    <div class="col-xs-8 pd_02">
                                        <input class="form-control " id="inputCity" value="<?= $user_info->place; ?>" name="place"  placeholder="City" data-parsley-length="[2, 100]"  maxlength="100" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputTelephone" class="col-sm-3 control-label">Telephone / Fax<sup style="color: #9ddb25;">*</sup></label>
                            <div class="col-sm-6 extra_sm_6">
                                <div class="row">
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control" id="inputTelephone" value="<?= $user_info->phone; ?>" name="phone" data-parsley-type="digits" placeholder="04361 - 62 63 86 " data-parsley-length="[8, 15]" maxlength="15" type="text" required>
                                    </div>
                                    <div class="col-xs-6 pd_02">
                                        <input class="form-control " id="inputFax" value="<?= $user_info->fax; ?>" placeholder="4361626386" name="fax" data-parsley-type="digits" placeholder="" type="text" data-parsley-length="[2, 20]" maxlength="20"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputSubmitbtn" class="col-sm-3 control-label"> </label>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-xs-12 pd_02">
                                        <button type="button" class="button btn btn-warning" onClick="<?php if ($active_menu == 'updateusers') { ?> window.location.href = '<?php echo base_url() ?>admin/userlist' <?php } else { ?> window.location.reload() <?php } ?>"> Cancel </button>
                                        <button type="submit" class="button btn btn-success">Update Profile </button>
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
                                                                    /*$(wrapper).append('<div class="input_fields_wrap"> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"> </label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-md-4 pd_02"> '+select_html+' </div> <div class="col-md-7 pd_02"> <textarea name="comments[]" class="form-control" placeholder="Produkt-Kommentare" required data-parsley-length="[1, 500]" maxlength="500"></textarea> </div> <div class="col-md-1 pd_02"> <a href="javascript:void(0)" class="remove_field btn btn-danger" title="löschen">x</a></div> </div> </div>  </div> </div>  ');*/ //add input box  

                                                                    $(wrapper).append('<div><div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label">  <sup style="color: #9ddb25;">*</sup></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> ' + select_html + ' </div> </div> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> <textarea name="comments[]" class="form-control" placeholder="Produkt-Kommentare" required data-parsley-length="[1, 2500]" maxlength="2500"></textarea> </div> </div> </div> </div> <div class="form-group"> <label for="inputEmail3" class="col-sm-3 control-label"></label> <div class="col-sm-6 extra_sm_6"> <div class="row"> <div class="col-xs-12 pd_02"> <a href="javascript:void(0)" class="remove_field btn btn-danger" title="löschen">x</a> </div> </div> </div> </div> </div>');



                                                                }
                                                            });

                                                            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                                //e.preventDefault(); $(this).parent('div').parent('div').parent('div').parent('div').remove(); x--;
                                                                e.preventDefault();
                                                                $(this).parent('div').parent('div').parent('div').parent('div').parent('div').remove();
                                                                x--;
                                                            })
                                                        });


</script>