

//checked de popo
$(document).ready(function(){  
  
    $("#radio_comprobar").click(function() {  
        if($("#radio").is(':checked')) {  
            alert("Está activado");  
        } else {  
            alert("No está activado");  
        }  
    });  
  
});  

$(document).ready(function(){  
  
    $("#radio_activar").click(function() {  
        $("#radio").attr('checked', true);  
    });  
  
    $("#radio_desactivar").click(function() {  
        $("#radio").attr('checked', false);  
    });  
  
}); 


