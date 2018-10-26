<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Medication list</h4>
        </div>
        <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">

        </div>

        <div class="col-lg-2 col-sm-8 col-md-8 col-xs-12">

            <a href="<?= base_url('addmedication') ?>" class="button btn btn-warning"> <i class="fa fa-plus"></i>Add Medication </a>

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
                                <th>Medication Name</th>              
                                <th>Quantity</th> 
                                <th>Dosage</th>     
                                <th>Added on</th> 
                                <th class="no-sorting">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($medication_list as $key => $value) { ?>


                                <tr class="parent-tr-<?= $value['id'] ?>">
                                    <td><?= $key + 1; ?></td>                                   
                                    <td><?= $value['medication_name']; ?></td>   
                                    <td><?= $value['quantity']; ?></td>  
                                    <td><?= $value['dosage']; ?></td>  
                                    <td><?= date("m/d/Y", strtotime($value['create_date'])); ?></td> 
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('updatemedication') ?>/<?= $value['id'] ?> " class="btn  " title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn deleteuser" id="<?= $value['id'] ?>" table="pharmacy_medication" title="Delete"><i class="fa fa-close"></i></a>
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
