$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
        url: '../Tablas/busquedas/buscar_mtro.php',
        type: 'POST',
        dataType: 'html',
        data: { consulta: consulta },
    })
        .done(function (respuesta) {
            $("#datos").html(respuesta);
        })
        .fail(function () {
            console.log("error");
        })
}

$(document).on('keyup', '#caja_busqueda', function(){
var valor = $(this).val();
if (valor != "") {
    console.log(valor);
    buscar_datos(valor);
} else {
    buscar_datos();
}
});



