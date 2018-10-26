<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4  col-sm-4 col-xs-12">
            <h4 class="page-title">Medication list for delivery</h4>
        </div>       
        <!-- /.col-lg-12 --> 
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="example" class="display mymedicationlist" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>                              
                                <th>Medication Name</th>              
                                <th>Quantity</th>                               
                                <th>Time Duration</th>
                                <!--<th>Use of direction</th>                               -->
                                <th>Managed Repeat</th>
                                <th>Added on</th>
                                <th>Status</th> 
                                <th class="no-sorting">Option</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if($medication_list){?>
                            <?php foreach ($medication_list as $key => $value) { ?>
                                <tr class="parent-tr-<?= $value['id'] ?>">
                                    <td><?= $key + 1; ?></td>                                    
                                    <td><?= $value['medication_name']; ?></td>   
                                    <td><?= $value['quantity']; ?></td>                                   
                                    <td><?= $value['time_duration']; ?></td>
                                    <!--<td><?//= $value['use_of_direction']; ?></td>-->
                                    <td>
                                    <?php
                                    if($value['managed_repeat']){
                                        echo"Yes";
                                    }else{
                                         echo"No";
                                    }                                    
                                    ?>
                                    </td>
                                     <td><?= date("m/d/Y", strtotime($value['create_date'])); ?></td>
                                    <td><?php
                                    if($value['medication_status']==1){echo"<span class='medication-inprocess'>In process</span>";}
                                    elseif($value['medication_status']==2){echo"<span class='medication-onhold'>On hold</span>";}
                                     elseif($value['medication_status']==3){echo"<span class='medication-completed'>Completed</span>";}
                                     else{echo"<span class='medication-inprocess'>In process</span>";}
                                     ?></td>
                                    <td>
                                        <div class="btn-group">
                                             <a href="<?= base_url('viewmedication') ?>/<?= $value['id'] ?> " class="btn  " title="View"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('updatemymedication') ?>/<?= $value['id'] ?> " class="btn  " title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn deleteuser" id="<?= $value['id'] ?>" table="medication" title="Delete"><i class="fa fa-close"></i></a>
                                        </div>
                                    </td> 
                                </tr>  

                            <?php }
                            }?>         

                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
    <!-- /.row --> 
</div>