        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">User list</h4>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">
                </div>

                <div class="col-lg-2 col-sm-8 col-md-8 col-xs-12">
                    <a href="<?= base_url('addpatients') ?>" class="button btn btn-warning"> <i class="fa fa-plus"></i>Add Patient </a>
                </div>
                <!-- /.col-lg-12 --> 
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="table-responsive">

                            <form method="GET">
                                <div class="list-status"> <label> Status :</label>
                                    <select class="status-form-control" name="status" onchange="this.form.submit();"> 
                                        <option value="">--- All ---</option> 
                                        <option value="1" <?php if ($status == '1') echo 'selected' ?>>Active</option> 
                                        <option value="0" <?php if ($status == '0') echo 'selected' ?> >Inactive</option> 
                                    </select> </div>

                            </form>
                            <table id="example" class="display" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-Mail</th>  
                                        <th>Added on</th>                                      
                                        <th>Status</th>
                                        <th class="no-sorting">Option</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($user_list as $key => $value) { ?>


                                        <tr class="parent-tr-<?= $value['id'] ?>">

                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value['firstname'] . ' ' . $value['lastname']; ?></td>
                                            <td><a href="mailto:<?= $value['email'] ?>" target="_top"><?= $value['email'] ?></a> </td>                                                       
                                            <td><?= date("d-m-Y", strtotime($value['created_at'])); ?></td> 
                                            <td>
                                                <?php if ($value['status'] == '1') { ?>
                                                    <span class="label label-success status_checks " title="Click on Active" table="users" id="<?= $value['id'] ?>" style="cursor:pointer">Active</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger status_checks" title="Click on InActive" table="users" id="<?= $value['id'] ?>" style="cursor:pointer">Inactive</span>
                                                <?php } ?>
                                            </td>  
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?= base_url('updateprofile') ?>/<?= $value['id'] ?> " class="btn  " title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn deleteuser" id="<?= $value['id'] ?>" table="users" title="Delete"><i class="fa fa-close"></i></a>
                                                </div>
                                            </td> 
                                        </tr>  

                                    <?php } ?>         

                                </tbody>
                            </table> 


                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row --> 
        </div>

        <script type="text/javascript">



            /*  $.fn.dataTable.ext.search.push(
             
             function( settings, data, dataIndex ) {
             
             var status =  $('.status').val();
             var stat = data[7] ;     
             
             if (stat == status || status=='')
             {
             return true;
             } 
             
             return false;
             }
             
             );
             
             
             $('.status').change( function() {
             table.draw();
             } );*/


        </script>

<!--    </div>
</div>-->