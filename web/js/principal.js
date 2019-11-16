$(document).ready(function() 
{
	$("body").tooltip({ selector: '[data-toggle=tooltip]' });
	$('#contenedor_carga').delay(1000).fadeOut('slow');
	$('#barraLateral').sidebar({close : false});
});

$('#btnBarraLateral').on('click', function()
{
	$(this).tooltip('hide');
	$('#barraLateral').trigger("sidebar:toggle");
})

$("#barraLateral").on("sidebar:opened", function () 
{
	$('#barraLateral').addClass('col-md-2');
	$('#barraLateral').removeClass('col-md-1');
	$('#contenido').addClass('col-md-10');
	$('#contenido').removeClass('col-md-11');
});
$("#barraLateral").on("sidebar:closed", function () 
{
	$('#barraLateral').removeClass('col-md-2');
	$('#barraLateral').addClass('col-md-1');
	$('#contenido').removeClass('col-md-10');
	$('#contenido').addClass('col-md-11');
});

function barra(op, but)
{
	$('.tt').tooltip('hide');
	if (op == 1) 
	{
		menu(but);
	}
	else if (op == 2)
	{
		window.location.href = '../principal/';
	}
	else if (op == 3)
	{
		window.location.href = '../logout.php';
	}
	else
	{
		$('#iconoBarra').toggleClass('fa-chevron-left');
		$('#iconoBarra').toggleClass('fa-chevron-right');
		$('.collapse').collapse('hide');
		$('.btnMenu').toggle();
		$('#panelUsuario').toggle();
		$('#barraLateral').toggleClass('col-md-2');
		$('#barraLateral').toggleClass('col-md-1');
		$('#contenido').toggleClass('col-md-10');
		$('#contenido').toggleClass('col-md-11');
	}
}

function menu(but) 
{
	$('.collapse').collapse('hide');
	$($(but).data("target")).collapse('show');
}