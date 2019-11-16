$('#inicioSesion').submit(function(e)
{
	e.preventDefault();
	login();
});

function login()
{
	alertify.set('notifier','position', 'bottom-center');
	if ($('input[name=us]').val() == '' || $('input[name=ps]').val() == '')
	{
		alertify.error('No puedes dejar campos vacíos');
	}
	else
	{
		var parametros = {
			"us" : $('input[name=us]').val(),
			"ps" : $('input[name=ps]').val()
		}
		$.ajax({
			url: 'php/login.php',
			type: 'POST',
			data: parametros,
			beforeSend: function()
			{
				alertify.notify('<i class="fas fa-sync fa-2x fa-spin mr-1"></i> Cargando');
			},
			success: function(respuesta)
			{
				console.log(respuesta);
				switch (respuesta)
				{
				case '0' :
					alertify.warning('<i class="fas fa-exclamation-triangle fa-lg mr-1 yellow-text"></i>Por favor, revise sus datos e intente de nuevo').dismissOthers();
					break;
				case '1' :
					alertify.success('Acceso correcto').dismissOthers();
					window.location.href = 'admin/principal/index.php';
					break;
				case '2' :
					alertify.warning('<i class="fas fa-exclamation-triangle fa-lg mr-1 yellow-text"></i>Por favor, revise sus datos e intente de nuevo').dismissOthers();
					break;
				default:
					alertify.error('Eror en la BD: '+respuesta).dismissOthers();
				}
			}
		});
	}
}


function cambio()
{
	alertify.confirm(
		'Confirmar',
		'¿Está seguro que el email es correcto?',
		function() // Si
		{
			let email = $('#email').val();
			let parametros = {
				"email" : email
			}
			$.ajax({
				url: '/hack/php/mail.php',
				type: 'POST',
				data: parametros,
				beforeSend: function()
				{

				},
				success: function(respuesta)
				{
					var txt;
					switch (respuesta) 
					{
						case '-1':
							txt = '	<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Hubo un inconveniente. Contacta a un administrador.'+
									'</div>';
							break;
						case '0':
							txt = '	<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Este email no existe en la base de datos.'+
									'</div>';
							break;
						case '1':
							txt = '	<div class="alert alert-success alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Se ha enviado el mensaje para el cambio de contraseña.'+
									'</div>';
							break;
						default:
							txt = '	<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										respuesta+
									'</div>';
							break;
					}
					$('#mensaje').html(txt);
				}
			})
		},
		function() // No
		{

		}
	).set('labels', { ok: 'Si', cancel: 'No' });
}