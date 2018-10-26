  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    #date-spam{
        font-size: 16px;
        font-weight: bold;
        padding: 50px;
    }
    .form-div-date{
          margin-left: 35%;
    }
    
</style>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({
          showOn: "button",
                buttonImage: "<?= base_url('assets/images/calendar.png') ?>",
                buttonImageOnly: true,
         dateFormat: 'd-mm-yy',
         onSelect: function(dateText, inst) {
        // var date = $(this).val();
        // var time = $('#time').val();
       $('#target').submit();
      //  $("#start").val(date + time.toString(' HH:mm').toString());

    }
    });

  } );
  </script>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> Stock Management</h4>
        </div>
        <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">

        </div>

       
        <!-- /.col-lg-12 --> 
    </div>
    <!-- /row -->
    <div class="row">
         <div class="col-sm-12">  
            <div class="white-box"> 
                <div class="form-div-date">
                    <form action="<?php echo current_url();?>" id="target" method="POST"><button onclick="prenext('pre')" class="button btn btn-success">Yesterday </button>
                         <span id="date-spam"><?php echo $today;?></span>
                         <input type="hidden" name="today_date" value="<?php echo $today;?>" id="current_date"> 
                         <input type="hidden" name="type" value="post" id="type">
                         <button onclick="prenext('post')"  class="button btn btn-success">Next Day</button>
                     <input type="hidden" id="datepicker" name="single_date"> </form> 
                </div>
                 <!-- <div class="col-md-4"></div> -->
            </div>
            
        </div>
        <div class="col-sm-12"> 
             
            <div class="white-box">
               
                <div class="table-responsive">
                    <table id="example" class="display" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>                              
                                <th>Medication Name</th>              
                                <th>Stock</th> 
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $key => $value) { ?>


                                <tr class="parent-tr-<?= $value['id'] ?>">
                                    <td><?= $key + 1; ?></td>                                   
                                    <td><?= $value['medication_name']; ?></td>   
                                    <td><?= $value['stock']; ?></td>  
                                    
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
// $(document).ready(function(){
    function  prenext(argument) {
        $('#type').val(argument);
          $( "#target" ).submit();
    }
// });
</script>
