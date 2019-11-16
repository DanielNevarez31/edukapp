$(document).ready(function() 
{
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    $('.tt').tooltip();
    $('#contenedor_carga').fadeOut('slow');
});
$('form').submit(function(e)
{   e.preventDefault();
    agregar();
});
function agregar()
{              
    var parametros = {
        "nombre" : $('input[name=nombre]').val(),
        "ape1" : $('input[name=ape1]').val(),
        "ape2" : $('input[name=ape2]').val(),
        "sexo" : $('select#sexo').val(),
        "calle" : $('input[name=calle]').val(),
        "num_ext" : $('input[name=num_ext]').val(),
        "num_int" : $('input[name=num_int]').val(),
        "cp" : $('input[name=cp]').val(),
        "col" : $('input[name=colonia]').val(),
    }    
        
    $.ajax({
        url: '../../php/alumnos/agregar.php',
        data: parametros,
        type: 'POST',
        beforeSend: function()
        {
            alertify.message('Cargando <i class="fas fa-sync fa-spin"></i>');
        },
        success: function(respuesta)
        {

            switch (respuesta)
            {
            case '1': 
                alertify.success('Alumno agregado').dismissOthers();
                break;
            default: 
                alertify.error(respuesta).dismissOthers();
            }
            $('#formulario')[0].reset();
            $('#resultadoUsername').html("<p></p>");
        }
    });
        
}