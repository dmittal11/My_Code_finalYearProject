    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Order # <?=$order_info->id;?></h4>
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
          



                <form class="form-horizontal" role="form" id="sign_in" method="POST" enctype="multipart/form-data" data-parsley-validate>  


                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Order # :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-2 pd_02">
                        <?=$order_info->id;?>
                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Autor :-</label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-2 pd_02">
                        <a href="<?=base_url()?>admin/updateprofile/<?=$order_info->user_id;?>"><?=$order_info->username;?></a>
                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div> 


                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Produkt :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-2 pd_02">
                        <a href="<?=base_url()?>admin/updateproducts/<?=$order_info->product_id;?>"><?=$order_info->name;?></a>
                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div> 


                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Anzahl :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-6 pd_02">
                        <!--<?=$order_info->quantity;?>-->
                        <?php 
                       $ar = json_decode($order_info->quantity, true);
                       $i = 1;                 
                       if(is_array($ar)){
                       foreach ($ar as $opkey => $op) {  ?>

                            <?=$opkey?> : <?=$op?> <?php if($i!=count($ar)) echo '|';?>
                            
                       
                      <?php $i++; } } ?>          

                        </div>
                        <div class="col-xs-2 pd_02">
                        </div>
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Attachment :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-6 pd_02">
                        <?php if( empty($attachment) ){ ?>

                            No attachment

                        <?php } else{ 
                         
                         foreach ($attachment as $key => $value) { ?>
                          

                  <a href="<?=base_url().'assets/images/logos/'.$value['file']?>" title="Click to download"  download >

                   
                   <?=($key+1).'. '.substr($value['file'], 8);?> <br>           

 
                </a>


                        <?php  }

                         }?>
                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div> 



                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Betelldatum :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-2 pd_02">
                        <?=date("m.d.Y",strtotime($order_info->order_date));?>
                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> Bestellstatus :- </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-3 pd_02">

                        <select name="order_status_id" class="form-control order_status_id" order-id="<?=$order_info->id;?>">
                         
               <?php foreach ($orderstatus as $key1 => $value1) { ?>

                   <option value="<?=$value1['id']?>" <?php if($order_info->order_status_id==$value1['id']) echo 'selected';?>><?=$value1['status']?></option>

             <?php    }   ?>
              
            
                </select>       

                        </div>
                        <div class="col-xs-6 pd_02">
                        </div>
                      </div>
                    </div>
                  </div>    



                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> </label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-6 pd_02">
                         <button type="button" class="button btn btn-warning" onClick="window.location.href='<?php echo base_url()?>admin/orders'"> Back </button>
                        </div>
                        <div class="col-xs-6 pd_02">
                         
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
