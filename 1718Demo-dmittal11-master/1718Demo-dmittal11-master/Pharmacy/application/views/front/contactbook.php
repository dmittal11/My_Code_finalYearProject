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

                            <table id="example" class="display" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-Mail</th>              
                                        <th>Phone </th>
                                        <th>fax </th>                                       
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($user_list as $key => $value) { ?>


                                        <tr class="parent-tr-<?= $value['id'] ?>">
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value['firstname'] . ' ' . $value['lastname']; ?></td>
                                            <td><a href="mailto:<?= $value['email'] ?>" target="_top"><?= $value['email'] ?></a> </td>                
                                             <td><?= $value['phone']; ?></td>
                                              <td><?= $value['fax']; ?></td>                                           
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

