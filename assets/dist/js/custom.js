$( document ).ready(function() {

    const api_url = 'http://103.129.223.136:2053/';

    //================= Initialize ======================

    bsCustomFileInput.init();

    $('#timepicker1').datetimepicker({
        format: 'HH:mm'
    });
    $('#timepicker2').datetimepicker({
        format: 'HH:mm'
    });

    $('.select2').select2(); 

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

    $('#datatable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });

      //================= End Initialize ================== 

      $('#InputFile').change(function(){ 
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#upload').removeAttr('style');
                $('#upload img').attr('src', e.target.result); 
            } 
            reader.readAsDataURL(this.files[0]);
        }
      })

    //   ====================== call modal gudang====================
    $('.open-modal').click(function (e) { 
        e.preventDefault();
        
        var id = $(this).attr('data-id');
        $('.open-modal .modal-title').html($(this).attr('data-title'));
        $(".open-modal").modal();
    });

    $('.product-modal').click(function (e) { 
        e.preventDefault();
        
        var data = JSON.parse($(this).attr('data-json'));
        $('.modal .modal-title').html('Detail Product '+data['name']);
        $('.modal-body img').attr('src', data['image']);
        $('#p_price').html(data['price']);
        $('#p_buy').html(data['buy_price']);
        $('#p_sku').html(data['sku']);
        $('#p_status').html(data['status']);
        $('#p_desc').html(data['desc']);
        
        $(".modal").modal();
    });
    
});



