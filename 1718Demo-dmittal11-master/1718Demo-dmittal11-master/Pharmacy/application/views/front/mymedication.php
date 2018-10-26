<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4  col-sm-4 col-xs-12">
            <h4 class="page-title">Medication list</h4>
        </div>
        <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12">
            <a href="javascript:void(0);" class="button btn btn-warning" data-toggle="modal" data-target="#manageRepeatModal"> <i class="fa fa-plus"></i>Managed Repeat </a>          
        </div>
        <div class="col-lg-2 col-md-8 col-sm-8 col-xs-12">
          <a href="<?= base_url('addmymedication') ?>" class="button btn btn-warning"> <i class="fa fa-plus"></i>Add Medication </a>
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
                                    <!--<td><?//= $value['use_of_direction']; ?></td>                                   -->
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

<div id="manageRepeatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header managed-repeat">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All Medication</a></li>
            <li><a data-toggle="tab" href="#menu1">Managed Repeat</a></li>
            <li><a data-toggle="tab" href="#menu2">Non Managed</a></li>          
       </ul>         
      </div>
      <div class="modal-body">       
       <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <h3>All Medication</h3>
          <hr>
          <div class="table-responsive">
                    <table id="allmedication" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input id="chk_all_list" onchange="toggle_list_checkboxes(this);" type="checkbox"></th>
                                <th>#</th>                              
                                <th>Medication Name</th>              
                                <th>Managed Repeat</th>   
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($medication_list as $key => $value) { ?>
                                <tr class="parent-tr-<?= $value['id'] ?>">
                                    <td>
                                          <?php if($value['managed_repeat']) { ?>
                                          <input type="checkbox" value="<?= $value['id'] ?>" checked="checked" onclick="changeMedicationStatus(this.value,0);"/>
                                      <?php  } else{ ?>
                                          <input type="checkbox" value="<?= $value['id'] ?>" onclick="changeMedicationStatus(this.value,1);"/>
                                     <?php   }
                                      ?>                                      
                                    </td>
                                    <td><?= $key + 1; ?></td>                                    
                                    <td><?= $value['medication_name']; ?></td>   
                                    <td><?= $value['quantity']; ?></td> 
                                </tr> 
                            <?php } ?>         

                        </tbody>
                    </table> 
                </div>
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Managed Repeat Medication</h3>
          <hr>
          <div class="table-responsive">
                    <table id="managedmedication" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input id="chk_all_list" onchange="toggle_list_checkboxes(this);" type="checkbox"></th>
                                <th>#</th>                              
                                <th>Medication Name</th>              
                                <th>Quantity</th>
                                <th>Time Duration</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if($managed_medication) {?>
                            <?php foreach ($managed_medication as $key1 => $managed) { ?>
                                <tr class="parent-tr-<?= $managed['id'] ?>">
                                    <td>
                                    <?php if($managed['managed_repeat']) { ?>
                                          <input type="checkbox" value="<?= $managed['id'] ?>" checked="checked" onclick="changeMedicationStatus(this.value,0);"/>
                                      <?php  } else{ ?>
                                          <input type="checkbox" value="<?= $managed['id'] ?>" onclick="changeMedicationStatus(this.value,1);"/>
                                     <?php   }
                                      ?>
                                      
                                    </td>
                                    <td><?= $key1 + 1; ?></td>                                    
                                    <td><?= $managed['medication_name']; ?></td>   
                                    <td><?= $managed['quantity']; ?></td>
                                    <td><?= $managed['time_duration']; ?></td>
                                </tr> 
                            <?php } ?>         
                           <?php }else{
                            echo"<tr><td colspan='5' class='no_result_text'>No Medication available</td></tr>";
                           }
                         ?>
                        </tbody>
                    </table> 
                </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Non Managed Repeat Medication</h3>
          <hr>
          <div class="table-responsive">
                    <table id="nonmanagedmedication" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                               <th><input id="chk_all_list" onchange="toggle_list_checkboxes(this);" type="checkbox"></th>
                               <th>#</th>                              
                               <th>Medication Name</th>              
                               <th>Quantity</th>
                               <th>Time Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if($nonmanaged_medication) {?>
                            <?php foreach ($nonmanaged_medication as $key2 => $nonmanaged) { ?>
                                <tr class="parent-tr-<?= $nonmanaged['id'] ?>">
                                    <td>
                                       <?php if($nonmanaged['managed_repeat']) { ?>
                                          <input type="checkbox" value="<?= $nonmanaged['id'] ?>" checked="checked" onclick="changeMedicationStatus(this.value,0);"/>
                                      <?php  } else{ ?>
                                          <input type="checkbox" value="<?= $nonmanaged['id'] ?>" onclick="changeMedicationStatus(this.value,1);"/>
                                     <?php   }
                                      ?>
                                    </td>
                                    <td><?= $key2 + 1; ?></td>                                    
                                    <td><?= $nonmanaged['medication_name']; ?></td>   
                                    <td><?= $nonmanaged['quantity']; ?></td>
                                    <td><?= $nonmanaged['time_duration']; ?></td>
                                </tr> 
                            <?php } ?>
                             <?php }else{
                            echo"<tr><td colspan='5' class='no_result_text'>No Medication available</td></tr>";
                           }
                         ?>

                        </tbody>
                    </table> 
                </div>
        </div>       
      </div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    function changeMedicationStatus(id,status){
        if(status==0){
            var res= confirm("Are you sure you want to Remove Medication from Managed Repeat!"); 
        }
        if(status==1){
          var res= confirm("Are you sure you want to Managed repeat this medication!");   
        }       
       if(res){       
        $.ajax({
            type: "POST",
            url: "update_managed_repeat",
            data: {"id": id, "status": status},
            success: function (response) { 
              alert("Medication staus updated Successfully");
              location.reload(); 
            }
            });
       }else{
        return false;
       }
    }
    
</script>