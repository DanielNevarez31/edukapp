$(document).ready(function() 
{
    //listar();
    $('.tt').tooltip();
    $('#contenedor_carga').fadeOut('slow');
    $('.opcional').hide();
    //pendiente();
});
function listar()
{
	$.ajax({
		url: '../../php/alumnos/listar.php',
		beforeSend: function()
		{
			alertify.message('Cargando <i class="fas fa-sync fa-spin"></i>');
		},
		success: function(respuesta)
		{
			alertify.success('Listo').dismissOthers();
			$('#tblEstudiantes').html(respuesta);
			$('#contenedor_carga').fadeOut('slow');
		}
	});
}
function buscar() 
{
    if ($('input[name=busqueda]').val() == '')
	{
		$('#tblEstudiantes').html('<tr><td colspan="6" class="text-center">Escriba para comenzar a buscar</td></tr>');
        //listar();
	}
	else
	{
		var parametros = {
			"txt" : $('input[name=busqueda]').val()
		}
		$.ajax({
			url: '../../php/educadores/filtrarEducadores.php',
			type: 'POST',
			data: parametros,
			beforeSend: function()
			{
				$('#tblEstudiantes').html('<tr><td colspan="6" class="text-center"><i class="fas fa-sync fa-2x fa-spin"></i></td></tr>');
			},
			success: function(respuesta)
			{
				$('#tblEstudiantes').html(respuesta);
			}
		});
		$('.tt').tooltip();
	}
}
function ver(id)
{
    var parametros = {
        "idEstudiante" : id
    }
    $.ajax({
        url: '../../php/alumnos/detallesEstudiante.php',
        type: 'POST',
        data: parametros,
        beforeSend: function() {
            //$('#tblDatosEducadores').html('<tr><td colspan="4" class="text-center"><i class="fas fa-sync fa-2x fa-spin"></i></td></tr>');
        },
        success: function(respuesta)
        {
            console.log(respuesta);
            switch (respuesta)
            {
                case '0':
					$('#tblDatosEducadores').html('<tr><td colspan="5" class="text-center"><i class="fas fa-exclamation-triangle fa-2x mr-1 text-warning"></i>La información del producto no ha podido mostrarse <i class="fas fa-exclamation-triangle fa-2x ml-1 text-warning"></i></td></tr>');
                    break;
                case '-1':
					$('#tblDatosEducadores').html('<tr><td colspan="5" class="text-center"><i class="fas fa-exclamation-triangle fa-2x mr-1 text-danger"></i>Hubo un problema con la base de datos <i class="fas fa-exclamation-triangle fa-2x mr-1 text-danger"></i></td></tr>');
                    break;
                default:
                    var edu= JSON.parse(respuesta);
                    $('#tdNombre').html(edu.nombre+" "+edu.ape1+" "+edu.ape2);
                    $('#tdSexo').html(edu.sexo);
                    $('#tdCalle').html(edu.calle);
                    $('#tdNumext').html(edu.num_ext);
                    $('#tdNumint').html(edu.num_int);
                    $('#tdCp').html(edu.cp);
                    $('#tdColonia').html(edu.colonia);
                    if (edu.status==0)
                    {
                        $('#tdStatus').html("<p class='text-warning'><strong>LIBRE <i class='fas fa-coffee'></i></strong> </p>");
                    }
                    else
                    {
                        $('#tdStatus').html("<p class='text-success'><strong>EDUCANDO <i class='fas fa-user-tie'></i></strong> </p>");
                    }
                    
                    break;
            }
            $('#modalDetallesEstudiante').modal('show');
        }
    });
}
var empleadoActual;
function editar(id)
{
	var parametros = {
        "idEstudiante" : id
    }
        $.ajax({
        url: '../../php/educadores/detallesEmpleado.php',
        type: 'POST',
        data: parametros,
        beforeSend: function() {
            $('#tblDetallesProducto').html('<tr><td colspan="4" class="text-center"><i class="fas fa-sync fa-2x fa-spin"></i></td></tr>');
        },
        success: function(respuesta)
        {
            console.log(respuesta);
            switch (respuesta)
            {
                case '0':
                    alertify.error('La información del empleado no ha podido mostrarse <i class="fas fa-exclamation-triangle fa-2x ml-1 text-warning"></i>');
                    break;
                case '-1':
                    alertify.error('Hubo un problema con la base de datos <i class="fas fa-exclamation-triangle fa-2x mr-1 text-danger"></i>');
                    break;
                default:
                    empleadoActual = JSON.parse(respuesta);
                    $('#nombre').val(empleadoActual.nombre).trigger('change');
                    $('#ape1').val(empleadoActual.ape1).trigger('change');
                    $('#ape2').val(empleadoActual.ape2).trigger('change');
                    $('#sexo').val(empleadoActual.sexo).trigger('change');
                    $('#cargo').val(empleadoActual.cargo).trigger('change');
                    $('#tel').val(empleadoActual.telefono).trigger('change');
                    //$('#username').val(empleadoActual.)
                    $('#calle').val(empleadoActual.calle).trigger('change');
                    $('#num_ext').val(empleadoActual.num_ext).trigger('change');
                    $('#num_int').val(empleadoActual.num_int).trigger('change');
                    $('#colonia').val(empleadoActual.colonia).trigger('change');
                    $('#cp').val(empleadoActual.cp).trigger('change');
                    $('#localidad').val(empleadoActual.localidad).trigger('change');
                    $('#municipio').val(empleadoActual.municipio).trigger('change');
                    $('#estado').val(empleadoActual.estado).trigger('change');
                    $('#cel').val(empleadoActual.celular).trigger('change');
                    $('#email').val(empleadoActual.email).trigger('change');
                   
                   if (empleadoActual.username != null) {
                       $('#username').val(empleadoActual.username).trigger('change');
                   }  else {
                       $('#username').val('').trigger('change');
                       $('#resultadoUsername').html('<span style="font-size: 16px; color: orange;"><i class="fas fa-exclamation-triangle fa-2x"></i><label> Escribe un nombre de usuario sin usar espacios</label></span>');
                   }
                   
                   if (empleadoActual.privilegios != null) {
                       $('#selectPrivilegio').val(empleadoActual.privilegios).trigger('change');
                   } else {
                       $('#selectPrivilegio').val('0').trigger('change');
                   }
                    break;
            }
            $('#modalEditarEmpleado').modal('show');
        }
    });
}
function updateEmp() {
        var continuar = true;
        var switchPass = false;
        var userParametros;
    if (permitirRegistro) {
        $('#username').removeClass('text-danger');
        if ($('#chckUsuario').prop('checked'))
        {
            //if (empleadoActual.existente){
                if ($('#password').val().trim() != '') {
                    if ($('#password').val() != $('#cpass').val()) 
                    {
                        alertify.error('Verifica que las contraseñas coincidan').dismissOthers();
                        continuar = false;
                    }
                    else 
                    {
                        switchPass = true;
                        if ($('#selectPrivilegio').val() == 0) 
                        {
                            alertify.error('Selecciona un tipo de usuario antes de continuar').dismissOthers();
                            continuar = false;
                        } else {
                            continuar = true;
                        }
                    }
                }
                else
                {
                    if (empleadoActual.existente) {
                        continuar = true;
                        switchPass = false;
                    } else {
                        alertify.error('Debes establecer una contraseña antes de continuar').dismissOthers();
                        continuar = false;
                    }
                }
            
            
        }
        //console.log(switchPass);
        if (continuar) 
        {
            var parametros = {
                "idEstudiante": empleadoActual.idEstudiante,
                "nombre": $('#nombre').val(),
                "ape1": $('#ape1').val(),
                "ape2": $('#ape2').val(),
                "sexo": $('#sexo').val(),
                "tipo": $('#cargo').val(),
                "telefono": $('#tel').val(),
                "calle": $('#calle').val(),
                "num_ext": $('#num_ext').val(),
                "num_int": $('#num_int').val(),
                "colonia": $('#colonia').val(),
                "cp": $('#cp').val(),
                "localidad": $('#localidad').val(),
                "municipio": $('#municipio').val(),
                "estado": $('#estado').val(),
                "celular": $('#cel').val(),
                "email": $('#email').val(),
                "comentarios": $('#comentarios').val(),
                "username": $('#username').val().trim(),
                "pass": $('#password').val(),
                "privilegios": $('#selectPrivilegio').val(),
                "switchPass": switchPass,
                "existente": empleadoActual.existente
            }
            console.log(empleadoActual);
            $.ajax({
                url: '../../php/educadores/editarEmpleado.php',
                data: parametros,
                type: 'POST',
                beforeSend: function()
                {
                    alertify.message('Cargando <i class="fas fa-sync fa-spin"></i>');
                },
                success: function(respuesta)
                {
                    console.log(respuesta);
                    switch (respuesta)
                    {
                        case '1':
                            listar();
                            $('#username').val('');
                            $('#password').val('');
                            $('#cpass').val('');
                            $('#checkUsuario').attr('checked', false);
                            alertify.success('Los datos del empleado han sido editados').dismissOthers();
                            $('#modalEditarEmpleado').modal('hide');
                            empleadoActual.existente = true;
                            break;
                        default:
                            alertify.error(respuesta).dismissOthers();

                    }
                }
            });
        }
    }
    
}
function borrar(id2)
{
	$('[data-toggle=tooltip]').tooltip('hide');
	alertify.confirm(
		'Confirmación', 
		'¿Estás seguro que deseas eliminar este empleado?', 
		function() // Si
		{ 
			var parametros = {"id" : id2}
			$.ajax({
				url: '../../php/alumnos/borrar.php',
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
						alertify.success('Eliminado').dismissOthers();
						window.setTimeout(listar(), 2000);
						break;
					default: 
						alertify.error(respuesta).dismissOthers();
					}
				},
				error: function(a, b, c)
				{
					alert(c);
				}
			});
		}, 
		function() // No
		{ 
			alertify.error('Cancelado').dismissOthers();
		}
	).set('labels', { ok: 'Si', cancel: 'No' });
    listar();
}