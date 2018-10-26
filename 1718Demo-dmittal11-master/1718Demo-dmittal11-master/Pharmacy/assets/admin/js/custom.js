$(document).ready(function()
{

   $('input[type="search"]').attr("maxlength",30);

    //$('table#example td a.delete').click(function()
    $(document).on('click','table#example td a.delete',function()
      {
        if (confirm("Do you really want to delete this entry?"))
        {
            var id = $(this).attr('id');
            var table = $(this).attr('table');
            var data = 'id=' + id + '&table='+table;
            var parent = $(this).parent().parent();

            $.ajax(
            {
                   type: "POST",
                   url: "delete_record",
                   data: data,
                   cache: false,
                   success: function()
                   {
                    //parent.fadeOut('slow', function() {$(this).parent().remove();});

                    $('.parent-tr-'+id).hide();
                    $('#modal-container-569626').modal('show'); 

                   }
             });
        }
    });

        //$('table#example td a.delete').click(function()
    $(document).on('click','table#example td a.deleteuser',function()
      {
        if (confirm("Are you sure you want to delete this user?"))
        {
            var id = $(this).attr('id');
            var table = $(this).attr('table');
            var data = 'id=' + id + '&table='+table;
            var parent = $(this).parent().parent();

            $.ajax(
            {
                   type: "POST",
                   url: "delete_record",
                   data: data,
                   cache: false,
                   success: function()
                   {
                    //parent.fadeOut('slow', function() {$(this).parent().remove();});

                    $('.parent-tr-'+id).hide();
                    $('#modal-container-569626').modal('show'); 

                   }
             });
        }
    });

    


    $(document).on('click','table#example td a.soft_delete',function()
      {
        if (confirm("Do you really want to delete this entry?"))
        {
            var id = $(this).attr('id');
            var table = $(this).attr('table');
            var data = 'id=' + id + '&table='+table;
            var parent = $(this).parent().parent();

            $.ajax(
            {
                   type: "POST",
                   url: "soft_delete_record",
                   data: data,
                   cache: false,
                   success: function()
                   {
                    //parent.fadeOut('slow', function() {$(this).parent().remove();});
                    $('.parent-tr-'+id).hide();
                    $('#modal-container-569626').modal('show'); 
                   }
             });
        }
    });



    // style the table with alternate colors
    // sets specified color for every odd row
    $('table#delTable tr:odd').css('background',' #FFFFFF');



});