<?php include '../../verificar.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar sucursal</title>
	<link rel="shortcut icon" href="../../favicon.ico">
	<?php include '../../style.php'; ?>
</head>
<body class="fh d-flex flex-column align-content-stretch">
	<div id="contenedor_carga">
		<div class="loader">
			Cargando
		</div>
	</div>
	<?php include('../../navbar.php'); ?>

	<div class="container-fluid d-flex align-items-stretch row m-0 p-0" id="pag">
		<?php include('../../sidebar.php'); ?>
		<div id="contenido" class="col-md-10 col-sm-12">
			<div class="row mx-1 my-2 d-block">
				<ol class="breadcrumb">
					<a class="breadcrumb-item" href="../">Inicio</a>
					<a href="../contacto/index.php" class="breadcrumb-item">Contacto</a>
					<a href="nuevo.php" class="breadcrumb-item disabled active">Nuevo</a>
				</ol>
			</div>
			<div class="row mx-1"> <!-- Formulario -->
				<h1 class="col-12 text-center">Nueva información de "Contacto".</h1>
				<div class="col-12 mt-0">
					<a href="index.php" class="btn grey text-white" data-toggle="tooltip" data-placement="top" title="Ver todas las sucursales registradas">
						<i class="fas fa-clipboard-list fa-lg"></i>
					</a>
					<button id="registrarCliente" class="btn btn-primary"  data-toggle="tooltip" data-placement="top" title="Registrar sucursal">
						<i class="fas fa-plus fa-lg"></i>
					</button>
				</div>
				<div class="col-12 border border-light rounded p-5 mb-2">
					<form id="formulario">
						<div class="row">
							<h3 class="col-sm-12 col-md-6">Datos de la sucursal</h3>
							<div class="col-sm-12 col-md-6"></div>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-store prefix"></i>
									<input id="nombre_suc" type="text" name="nombre_suc" class="form-control" tabindex="1" aria-describedby="nombre_sucAyuda" required>
									<label for="nombre_suc">Nombre de la sucursal</label>
									<small id="nombre_sucAyuda" class="text-muted">
										El nombre de la sucursal.
										<b>Ejemplo:</b> <i>Sucursal 130</i>.<br>
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-phone prefix"></i>
									<input id="tel" type="tel" name="tel" class="form-control" tabindex="2" aria-describedby="telAyuda" data-error="Ingresa un número con formato válido." data-success="Válido" required minlength="7" maxlength="15">
									<label for="tel">Teléfono</label>
									<small id="telAyuda" class="text-muted">
										Número de teléfono para contactarlo.
										<b>Ejemplos:</b> <i>618-101-0110</i> <b>o</b> <i>801-10-01</i>
									</small>
								</div>
							</div>
							<h3 class="col-12">Dirección</h3>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-road prefix"></i>
									<input id="direccion" type="text" name="direccion" class="form-control" data-error="Por favor, escribe una dirección válida" data-success="Válido" tabindex="7" aria-describedby="direccionAyuda" maxlength="100">
									<label for="direccion">Dirección completa</label>
									<small id="direccionAyuda" class="text-muted">
										Dirección completa de la sucursal.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<div class="md-form">
									<i class="fas fa-at prefix"></i>
									<input id="email" type="text" name="email" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="16" aria-describedby="emailAyuda">
									<label for="email">Email</label>
									<small id="emailAyuda" class="text-muted">
										Email para contactarlo.
									</small>
								</div>
							</div>
						</div>
						<div class="row text-right">
							<button type="submit" class="btn btn-primary" tabindex="18">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include '../../script.php'; ?>
<script src="../../../js/admin/contactoNuevo.js"></script>
</body>
</html>