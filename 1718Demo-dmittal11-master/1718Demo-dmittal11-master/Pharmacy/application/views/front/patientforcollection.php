<?php //print_r($medication_list);die; ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Patient for collection</h4>
        </div>
        <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">

        </div>

        <div class="col-lg-2 col-sm-8 col-md-8 col-xs-12">

            <!--<a href="<?//= base_url('addmedication') ?>" class="button btn btn-warning"> <i class="fa fa-plus"></i>Add Medication </a>-->

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
                                <th>Medication Name</th>              
                                <th>Quantity</th>
                                <!--<th>Pickup Date</th>-->
                                <!--<th>Quick deliever</th>                              -->
                                <th>Managed Repeat</th>    
                                <th>Added on</th>
                                <th>Status</th>
                                <th class="no-sorting">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($medication_list as $key => $value) { ?>
                                <tr class="parent-tr-<?= $value['id'] ?>">
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value['firstname'] . ' ' . $value['lastname']; ?></td>
                                    <td><?= $value['medication_name']; ?></td>   
                                    <td><?= $value['quantity']; ?></td>
                                    <!--<td><?//= $value['pickup_date']; ?></td>-->
                                    <!--<td><?//= $value['is_deliever_soon']; ?></td>-->
                                    <td>
                                    <?php if($value['managed_repeat']){
                                        echo'Yes';
                                    }else{
                                        echo'No';
                                    }?>
                                    </td>
                                    <td><?= date("m/d/Y", strtotime($value['create_date'])); ?></td>
                                    <td> <?php                                       
                                       /* if($value['medication_status']==4){
                                            echo "<span class='medication-completed'>Completed</span>";
                                        }elseif($value['medication_status']==3){
                                            echo "<span class='medication-cancel'>Cancel</span>";
                                        }
                                        elseif($value['medication_status']==2){
                                             echo "<span class='medication-onhold'>On hold</span>";
                                        }
                                        elseif($value['medication_status']==1){
                                             echo "<span class='medication-inprocess'>In Process</span>";
                                        }else{
                                             echo "<span class='medication-inprocess'>In Process</span>";
                                        }*/
                                       
                                        ?>
                                         <a href="#" id="medication-status" class="medication-status" data-type="select" data-value="<?php echo $value['medication_status']; ?>" data-pk="<?= $value['id'] ?>" data-url="<?= base_url('updatemeditatus') ?>" data-title="Select status"></a>
                                        </td>
                                    <td>
                                        <div class="btn-group">
                                             <a href="<?= base_url('viewmedication') ?>/<?= $value['id'] ?> " class="btn" title="View"><i class="fa fa-eye"></i></a>
                                            <!--<a href="<?//= base_url('updatemedication') ?>/<?//= $value['id'] ?> " class="btn  " title="Edit"><i class="fa fa-edit"></i></a>-->
                                            <!--<a href="javascript:void(0)" class="btn deleteuser" id="<?//= $value['id'] ?>" table="medication" title="Delete"><i class="fa fa-close"></i></a>-->
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
     $(function(){
    $('.medication-status').editable({          
        source: [
              {value: 0, text: 'In Process'},
              {value: 1, text: 'In Process'},
              {value: 2, text: 'On hold'},
              {value: 3, text: 'Cancel'},
              {value: 4, text: 'Completed'}
           ]
    });
});
</script>
