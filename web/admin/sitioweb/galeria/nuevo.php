<?php include '../../verificar.php'; ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar imagen</title>
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
					<a href="index.php" class="breadcrumb-item">Galeria</a>
					<a href="nuevo.php" class="breadcrumb-item disabled active">Nuevo</a>
				</ol>
			</div>
			<div class="row mx-1"> <!-- Formulario -->
				<h1 class="col-12 text-center">Agregar nueva imagen a "Galería".</h1>
				<div class="col-12 mt-0">
					<a href="index.php" class="btn grey text-white" data-toggle="tooltip" data-placement="top" title="Ver todas las imágenes registradas">
						<i class="fas fa-clipboard-list fa-lg"></i>
					</a>
					<button id="registrarCliente" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registrar imagen">
						<i class="fas fa-plus fa-lg"></i>
					</button>
				</div>
				<div class="col-12 border border-light rounded p-5 mb-2">
					<form id="formulario" enctype="multipart/form-data">
						<div class="row">
							<h3 class="col-sm-12 col-md-6">Datos de la imagen</h3>
							<div class="col-sm-12 col-md-6"></div>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-edit prefix"></i>
									<input id="titulo" type="text" name="nombre_comercial" class="form-control" tabindex="1" aria-describedby="tituloAyuda" required>
									<label for="titulo" minlength="2" maxlength="30">Título de la imagen</label>
									<small id="títuloAyuda" class="text-muted">
										El título de la imagen.
										<b>Ejemplo:</b> <i>Tacos de asada</i>.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-image prefix"></i>
									<input id="imagen" type="file" accept="image/*" name="tel" class="form-control" tabindex="2" aria-describedby="imagenAyuda" data-error="Ingresa un archivo con formato válido." data-success="Válido" required >
									
									<small id="telAyuda" class="text-muted">
										Imagen a cargar para sección de galería.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
							</div>
							<div class="col-sm-12 col-md-6">
								<img src="" width="300px" id="imgSalida">
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
<script src="../../../js/admin/galeriaNuevo.js"></script>
</body>
</html>