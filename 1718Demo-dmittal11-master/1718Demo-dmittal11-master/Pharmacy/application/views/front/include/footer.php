<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="modal fade" id="modal-container-569626" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog third_popup">
        <div class="modal-content ">
            <div class="modal-header">
                <div class="circle_img"><img src="<?= base_url('assets/images/circltik.png') ?>" alt=""/></div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <img src="<?= base_url('assets/images/cross.png') ?>" alt=""/> </button>
                <h4 class="modal-title" id="myModalLabel">You have successfully saved your change! </h4>
            </div>

        </div>
    </div>
</div>

<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header managed-repeat">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Advance Search</h4>
      </div>
      <div class="modal-body">      
              <form  method="post" class="form-horizontal" role="form" action="<?= base_url('getsearchuser'); ?>">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="username">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Name"/>
                    </div>
                  </div>
                  <div class="form-group">                  
                    <div class="col-sm-offset-5 col-sm-7">
                        <input type="radio" name="usr_addr_condition" value="and" checked="checked" /> AND
                        <input type="radio" name="usr_addr_condition" value="or"  /> OR
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="address" >Address</label>
                    <div class="col-sm-10">
                        <input type="address" class="form-control" id="address" name="address" placeholder="Address"/>
                    </div>
                  </div>
                  <div class="form-group">                  
                    <div class="col-sm-offset-5 col-sm-7">
                        <input type="radio" name="addr_city_condition"  value="and" checked="checked" /> AND
                        <input type="radio" name="addr_city_condition" value="or" /> OR
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="city" >City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City"/>
                    </div>
                  </div>   
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-default">Search</button>
                    </div>
                  </div>
              </form>
         </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>           

<!-- /.container-fluid -->
  <footer class="footer text-center"> <?=date("Y")?> &copy; Pharmacy</footer>
</div>
<!-- /#page-wrapper --> 
</div>
<!-- /#wrapper --> 


<script src="<?= base_url('assets/validation/dist/parsley.js') ?>"></script>
<script src="<?= base_url('assets/validation/dist/i18n/en.js') ?>"></script>


<script src="<?= base_url('assets/admin/js/custom.js') ?>"></script>    


<script>
    $(".sidebar-head a").click(function () {
        $('.sidebar').toggleClass('show');
        $('.sidebar-head').toggleClass('show');
        $('body').toggleClass('show');
    });

    $("#side-menu li a").click(function () {
        if ($(this).next('ul')) {
            $(this).next().slideToggle('fast');
        }
    });

</script>


<script type="text/javascript">
 $('#allmedication').DataTable();
  $('#managedmedication').DataTable();
   $('#nonmanagedmedication').DataTable();
 
    function imagePreview(input)
    {
        if (input.files && input.files[0])
        {
            if (input.files[0].type == "image/gif" || input.files[0].type == "image/jpeg" || input.files[0].type == "image/jpg" || input.files[0].type == "image/png") {

                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    $('#imgDisplayarea').attr('src', e.target.result);
                    $('#imgDisplayarea').attr('height', '130px;');
                    $('#imgDisplayarea').attr('width', '170px;');
                    $("#imgDisplayarea").removeClass("imgDisplayarea-border");
                };

                filerdr.readAsDataURL(input.files[0]);
            }
        }
    }

    var a = "<?= $this->session->flashdata('success_message') ?>";

    if (a != '') {

        $('#modal-container-569626').modal('show');
        setTimeout(function () {
            $('#modal-container-569626').modal('hide');
        }, 1000);


    }


    var otable = $('#example').DataTable();
    $(document).on('click', '.status_checks', function ()
    {
        var status = ($(this).hasClass("label-success")) ? '0' : '1';

        var id = $(this).attr('id');
        var table = $(this).attr('table');
        var current_element = $(this);

        $.ajax({
            type: "POST",
            url: "update_status",
            data: {"id": id, "status": status, "table": table},
            success: function (data) {                //alert(status)

                if (status == '1') {


                    current_element.text('Aktiv');
                    current_element.removeClass("label-danger").addClass("label-success");

                    $('#modal-container-569626').modal('show');

                    setTimeout(function () {
                        $('#modal-container-569626').modal('hide');
                    }, 1000);

                } else {
                    current_element.text('Gesperrt');
                    current_element.removeClass("label-success").addClass("label-danger");

                    $('#modal-container-569626').modal('show');
                    setTimeout(function () {
                        $('#modal-container-569626').modal('hide');
                    }, 1000);

                }
                $('#example').dataTable().fnDestroy();
                var otable = $('#example').DataTable();
                }});
        });




    $(document).on('click', '.order_status_checks', function ()
    {
        var status = ($(this).hasClass("label-success")) ? '0' : '1';

        var id = $(this).attr('id');
        var table = $(this).attr('table');
        var current_element = $(this);

        $.ajax({
            type: "POST",
            url: "update_order_status",
            data: {"id": id, "status": status, "table": table},
            success: function (data) {                //alert(status)

                if (status == '1') {


                    current_element.text('Aktiv');
                    current_element.removeClass("label-danger").addClass("label-success");
                    $('#modal-container-569626').modal('show');
                    setTimeout(function () {
                        $('#modal-container-569626').modal('hide');
                    }, 1000);

                } else {


                    current_element.text('Gesperrt');
                    current_element.removeClass("label-success").addClass("label-danger");
                    $('#modal-container-569626').modal('show');
                    setTimeout(function () {
                        $('#modal-container-569626').modal('hide');
                    }, 1000);

                }


                $('#example').dataTable().fnDestroy();

                var otable = $('#example').DataTable({
                    "language": {
                        "decimal": "",
                        "emptyTable": "No data available in table",
                        "info": "Einträge _START_ bis _END_ von _TOTAL_ ",
                        "infoEmpty": "0 bis 0 von 0 Eingaben",
                        "infoFiltered": "(von insgesamt _MAX_ Einträgen)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Anzeige: _MENU_ pro Seite",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Suche:",
                        "zeroRecords": "Keine Suchergebnisse gefunden",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Nächste",
                            "previous": "Vorherige"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    },
                    'aoColumnDefs': [{
                            'bSortable': false,
                            'aTargets': ['no-sorting']
                        }]
                });



            }});


    });



    var url = "<?= base_url() ?>";

    $(document).on('change', '.order_status_id', function ()
    {

        var order_id = $(this).attr('order-id');
        var order_status_id = this.value;

        $.ajax({url: url + 'admin/DashboardController/change_order_status',
            type: 'POST',
            data: {order_id: order_id, order_status_id: order_status_id},
            success: function (data) {

                $('#modal-container-569626').modal('show');
                setTimeout(function () {
                    $('#modal-container-569626').modal('hide');
                }, 1000);

            }

        });


    });


    $(document).on('change', '.change_user_type', function ()
    {

        var user_id = $(this).attr('user-id');
        var member_type = this.value;

        $.ajax({url: url + 'admin/DashboardController/change_member_type',
            type: 'POST',
            data: {user_id: user_id, member_type: member_type},
            success: function (data) {

                $('#modal-container-569626').modal('show');
                setTimeout(function () {
                    $('#modal-container-569626').modal('hide');
                }, 1000);

            }

        });


    });


    $("#example").wrap("<div class='table-responsive'></div>");



    /*  $('<div class="list-status"> <label> Status :</label><select class="status" name="status" required=""> <option value="">--- All ---</option> <option value="Active">Active</option> <option value="Not Active">Not Active</option> </select> </div>').insertAfter( ".dataTables_length" ); */

//var url      = window.location.href;     // Returns full URL
//alert(url);
</script>

</body>
</html>