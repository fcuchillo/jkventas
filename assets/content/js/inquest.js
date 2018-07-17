/* global alertify */

$(document).ready(function () {
    
    $('#inquestFile').change(function(){
        $(".progress-bar").animate({
            width: "1%"
        }, 500 ); 
    });
    
    $('#frmInquestUpFile').ajaxForm({
        beforeSend: function() {
            
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#progressBar').width(percentComplete + '%');
        },
        success: function(data) {
            if(data !== '') {
                alertify.set({ delay: 4500});
                alertify.error(data);
            }
            else {
                alertify.set({ delay: 4500});
                alertify.success('Operación Exitosa');               
            }
        },
        complete: function() {
        },
        error: function(){
            alertify.set({ delay: 4500});
            alertify.error("Error: comuniquese con soporte");
        }
    }); 

    $(":file").filestyle({buttonName: "btn-primary"} );
    $(":file").filestyle('buttonText', 'Examinar');
    
    $(".progress-bar").animate({
        width: "1%"
    }, 1500 );    
});


