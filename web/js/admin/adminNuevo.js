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
var permitirRegistro = false;
function checkUsername()
{
    if (!$('#email').val().includes(' ') && $('#email').val() != '') 
    {
        var parametros = {
            "txt": $('#email').val().trim()
        }
        $.ajax({
            url: '../../php/educadores/buscarUsername.php',
            data: parametros,
            type: 'POST',
            beforeSend: function() 
            {
                $('#resultadoUsername').html('<i class="fas fa-sync fa-2x fa-spin"></i><p>Cargando...</p>');
            },
            success: function(respuesta)
            {
                switch(respuesta)
                {
                    case '0':
                        $('#resultadoUsername').html('<span style="font-size: 16px; color: green;"><i class="fas fa-check-circle fa-2x"></i><label>    Nombre de usuario disponible</label></span>');
                        permitirRegistro = true;
                        //console.log("permitirRegistro: "+permitirRegistro);
                        break;
                    default:
                        $('#resultadoUsername').html('<span style="font-size: 16px; color: red;"><i class="fas fa-exclamation-triangle fa-2x"></i><label>    Este nombre de usuario esta siendo usado por alguien más, utiliza otro</label></span>');
                        permitirRegistro = false;
                        break;
                }
            }
        });
    }
    else
    {
        perimitirRegistro = false;
        $('#resultadoUsername').html('<span style="font-size: 16px; color: orange;"><i class="fas fa-exclamation-triangle fa-2x"></i><label> Escribe un correo electrónico.</label></span>');
    }
}
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
        "email" : $('input[name=email]').val(),
        "tel" : $('input[name=tel]').val(),
        "password" : $('input[name=password]').val(),
    }    
        
    $.ajax({
        url: '../../php/admin/agregar.php',
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
                alertify.success('Administrador agregado').dismissOthers();
                break;
            default: 
                alertify.error(respuesta).dismissOthers();
            }
            $('#formulario')[0].reset();
            $('#resultadoUsername').html("<p></p>");
        }
    });
}