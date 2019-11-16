$(document).ready(function() 
{
	// $("body").tooltip({ selector: '[data-toggle=tooltip]' });
	var bar1 = new ldBar("#barra");
	bar1.set(15);
	bar1.set(35);
	bar1.set(50);
	bar1.set(100);
	$('#contenedor_carga').delay(1000).fadeOut('slow');
});

function validar()
{
	let pwd1 = $('#pwd1').val();
	let pwd2 = $('#pwd2').val();
	if (pwd1 == pwd2)
	{
		$('#mensaje').html('');
		$('#btnCambiar').prop('disabled', false); 
	}
	else
	{
		$('#mensaje').html('<div class="alert alert-danger" role="alert">Las contraseñas no coinciden, verifique sus datos</div>');
		$('#btnCambiar').prop('disabled', true);
	}
}
$('#cambioPass').submit(function(e)
{
	e.preventDefault();
	cambio();
});
function cambio()
{
	alertify.confirm(
		'Confirmar',
		'¿Está seguro que desea cambiar su contraseña?',
		function() // Si
		{
			let pwd = $('#pwd1').val();
			let id = $('#id').val();
			let parametros = {
				"pwd" : pwd,
				"id" : id
			}
			console.log(id);
			$.ajax({
				url: '/adame/php/change.php',
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
						case '-2':
							txt = '	<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Hubo un inconveniente (db). Contacta a un administrador.'+
									'</div>';
							break;
						case '-1':
							txt = '	<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Hubo un inconveniente. Contacta a un administrador.'+
									'</div>';
							break;
						case '1':
							$('#pwd1').val('');
							$('#pwd2').val('');
							$('#btnCambiar').prop('disabled', true);
							txt = '	<div class="alert alert-success alert-dismissible fade show" role="alert">'+
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
	    									'<span aria-hidden="true">&times;</span>'+
	  									'</button>'+
										'Se ha cambiado la contraseña. <a href="/adame/">Inicia sesión</a>'+
										' con tu nueva contraseña'+
									'</div>';
							break;
						default:
							txt = '	<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
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