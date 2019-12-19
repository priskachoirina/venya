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

      $('#InputFile').change(function(){
          console.log('dsds');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#upload').removeAttr('style');
                $('#upload img').attr('src', e.target.result);
              
            }
            
            reader.readAsDataURL(this.files[0]);
        }
      })
    //================= End Initialize ================== 
});



