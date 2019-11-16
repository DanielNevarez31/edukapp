<?php
	$id = $_GET['id'];
	// $id = 3;
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adame</title>
	<link rel="shortcut icon" href="/adame/favicon.ico">
	<?php include('../admin/style.php'); ?>	
	<link href="/adame/css/login.css" rel="stylesheet">
</head>
<body>
	<div id="contenedor_carga" class="text-center p-1 pt-4">
		<img src="/adame/img/tacos.png" class="img-fluid imgCarga mx-auto" >
		<div class="ldBar label-center w-50" style="width:25%;height:25%;margin:1rem auto" data-value="0" data-preset="line" data-stroke-trail-width="2" data-stroke-trail="#000" data-stroke="#630" id="barra" ></div>
		<h1 class="text-dark">Cargando, espere por favor...</h1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark green darken-2 transparente justify-content-center">
		<a href="/adame/" class="navbar-brand">
			<img src="/adame/img/brand.png" class="img-fluid">
			<span class="d-none d-sm-none d-md-inline-block">Sistema Integral de Gestión de Ventas</span> (SIGV)
		</a>
	</nav>
	<div class="container row mx-auto my-3 w-responsive">
		<!-- <div class="col-md-3 col-sm-12"></div> -->
		<div class="mx-auto my-3 w-responsive">
			<div class="card formulario">
				<div class="card-body">
					<form id="cambioPass">
						<h1 class="text-center">Cambiar contraseña</h1>
						<?php echo '<input type="text" value="'.$id.'" hidden id="id">'; ?>
						<div class="md-form form-lg m-4">
							<i class="fas fa-user orange-text prefix"></i>
							<input type="password" class="form-control" id="pwd1" name="pwd1" aria-label="Contraseña" aria-describedby="usrAyuda" data-error="Por favor, revisa la información" required tabindex="1" onchange="validar()" onkeyup="validar()">
							<label for="pwd1" onclick="$(this).siblings('input').focus();">
								Contraseña
							</label>
						</div>
						<div class="md-form form-lg m-4">
							<i class="fas fa-key orange-text prefix"></i>
							<input type="password" class="form-control" id="pwd2" name="pwd2" aria-label="Username" aria-describedby="pwdAyuda" data-error="Por favor, revisa la información" required tabindex="2" onchange="validar()" onkeyup="validar()">
							<label for="pwd2" onclick="$(this).siblings('input').focus();">
								Confirmar contraseña
							</label>
						</div>
						<div id="mensaje"></div>
						<div class="text-center mx-auto">
							<button id="btnCambiar" type="submit" class="btn blue mx-auto d-block" tabindex="3" disabled>
								Cambiar contraseña
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- <div class="col-md-3 col-sm-12"></div> -->
	</div>

<?php include('../admin/script.php'); ?>
<script src="/adame/js/loading-bar.js"></script>
<script src="/adame/js/pass.js"></script>
</body>
</html>