<?php include '../verificar.php'; ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar educador</title>
	<link rel="shortcut icon" href="../../images/favicon.ico">
	<?php include '../style.php'; ?>
</head>
<body class="fh d-flex flex-column align-content-stretch">
	<div id="contenedor_carga">
		<div class="loader">
			Cargando
		</div>
	</div>
	<?php include('../navbar.php'); ?>

	<div class="container-fluid d-flex align-items-stretch row m-0 p-0" id="pag">
		<?php include('../sidebar.php'); ?>
		<div id="contenido" class="col-md-10 col-sm-12">
			<div class="row mx-1"> <!-- Formulario -->
				<h1 class="col-12 text-center">Registrar un educador nuevo</h1>
				<div class="col-12 mt-0">
					<a href="../educadores/" class="btn grey text-white" data-toggle="tooltip" data-placement="top" title="Ver todos los educadores registrados">
						<i class="fas fa-clipboard-list fa-lg"></i>
					</a>
				</div>
				<div class="col-12 border border-light rounded p-5 mb-2">
					<form id="formulario">
						<div class="row">
							<h3 class="col-sm-12 col-md-6">Datos generales</h3>
							<div class="col-sm-12 col-md-6"></div>
							<div class="col-sm-12 col-md-4">
								<div class="md-form">
									<i class="fas fa-user-alt prefix"></i>
									<input id="nombre" type="text" name="nombre" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="1" aria-describedby="nombreAyuda" required>
									<label for="nombre">Nombre</label>
									<small id="nombreAyuda" class="text-muted">
										Nombre del educador.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="md-form">
									<i class="fas fa-user-alt prefix"></i>
									<input id="ape1" type="text" name="ape1" class="form-control" data-error="Por favor, escribe un apellido válido" data-success="Válido" tabindex="2" aria-describedby="ape1Ayuda" required>
									<label for="ape1">Primer apellido</label>
									<small id="ape1Ayuda" class="text-muted">
										Primer apellido del educador.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="md-form">
									<i class="fas fa-user-alt prefix"></i>
									<input id="ape2" type="text" name="ape2" class="form-control" data-error="Por favor, escribe un apellido válido" data-success="Válido" tabindex="3" aria-describedby="ape2Ayuda">
									<label for="ape2">Segundo apellido</label>
									<small id="ape2Ayuda" class="text-muted">
										Segundo apelido del educador.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="d-flex mt-4">
									<i class="far fa-id-badge prefix fa-2x mx-1"></i>
									<label for="sexo" class="blue-grey-text mx-1">Sexo</label>
									<select class="custom-select custom-select-sm d-inline" tabindex="4" required id="sexo">
											<option selected="true" value="">Seleccionar</option>
											<option value="Hombre">Hombre</option>
											<option value="Mujer">Mujer</option>
									</select>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<div class="md-form">
									<i class="fas fa-mobile-alt prefix"></i>
									<input id="tel" type="text" name="tel" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="5" aria-describedby="celAyuda">
									<label for="cel">Celular</label>
									<small id="celAyuda" class="text-muted">
										Celular para contactarlo.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="far fa-sticky-note prefix"></i>
									<input id="gradoEstudio" type="text" name="gradoEstudio" class="form-control" data-success="Válido" tabindex="6" aria-describedby="gradoEstudio">
									<label for="gradoEstudio">Grado de Estudio</label>
									<small id="gradoEstudio" class="text-muted">
										Grados de estudios del educador.
									</small>
								</div>
							</div>
						</div>
						<div class="row">
						    <h3 class="col-12">Defina las siguientes credenciales</h3>
						    <div class="col-sm-12 col-md-6">
						        <div class="md-form">
						            <i class="fas fa-user prefix"></i>
						            <input id="email" type="email" name="email" class="form-control" data-error="Por favor, escribe un username válido" data-success="Válido" tabindex="7" aria-describedby="usernameAyuda" onkeyup="checkUsername()">
						            <label for="username">Email</label>
						            <small id="usernameAyuda" class="text-muted">
						                Ingrese un email (Usuario).
						            </small>
						        </div>
						    </div>
						    <div class="col-sm-12 col-md-6" id="resultadoUsername">
						        <!-- verificar disponibilidad del usuario -->
						    </div>
						    <div class="col-sm-12 col-md-6">
						        <div class="md-form">
						            <i class="fas fa-key prefix"></i>
						            <input id="password" type="password" name="password" class="form-control" data-error="Por favor, escribe un password válido" data-success="Válido" tabindex="8" aria-describedby="passwordAyuda">
						            <label for="password">Contraseña</label>
						            <small id="passwordAyuda" class="text-muted">
						                Contraseña para el usuario.
						            </small>
						        </div>
						    </div>
						    <div class="col-sm-12 col-md-6">
						        <div class="md-form">
						            <i class="fas fa-key prefix"></i>
						            <input id="cpass" type="password" name="cpass" class="form-control" data-error="Por favor, escribe un password válido" data-success="Válido" tabindex="9" aria-describedby="cpassAyuda">
						            <label for="cpass">Confirmar contraseña</label>
						            <small id="cpassAyuda" class="text-muted">
						                Escriba nuevamente la contraseña para confirmar.
						            </small>
						        </div>
						    </div>
						</div>
						<div class="row opcional">
							<h3 class="col-12">Dirección</h3>
							<div class="col-sm-12 col-md-6">
								<div class="md-form">
									<i class="fas fa-road prefix"></i>
									<input id="calle" type="text" name="calle" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="10" aria-describedby="calleAyuda">
									<label for="calle">Calle</label>
									<small id="calleAyuda" class="text-muted">
										Nombre de la calle.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<div class="md-form">
									<i class="fab fa-slack-hash prefix"></i>
									<input id="num_ext" type="number" name="num_ext" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="11" aria-describedby="num_extAyuda">
									<label for="num_ext">Número exterior</label>
									<small id="num_extAyuda" class="text-muted">
										Número exterior del domicilio.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<div class="md-form">
									<i class="fab fa-slack prefix"></i>
									<input id="num_int" type="number" name="num_int" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="12" aria-describedby="num_intAyuda">
									<label for="num_int">Número interior</label>
									<small id="num_intAyuda" class="text-muted">
										Número interior del domicilio.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-7">
								<div class="md-form">
									<i class="fas fa-building prefix"></i>
									<input id="colonia" type="text" name="colonia" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="13" aria-describedby="coloniaAyuda">
									<label for="colonia">Colonia</label>
									<small id="coloniaAyuda" class="text-muted">
										Colonia o fraccionamiento donde vive.
									</small>
								</div>
							</div>
							<div class="col-sm-12 col-md-5">
								<div class="md-form">
									<i class="far fa-envelope prefix"></i>
									<input id="cp" type="number" name="cp" class="form-control" data-error="Por favor, escribe un código válido" data-success="Válido" tabindex="14" aria-describedby="cpAyuda">
									<label for="cp">Código postal</label>
									<small id="cpAyuda" class="text-muted">
										Código postal de la zona.
									</small>
								</div>
							</div>
						</div>
						<div class="row">
							<h3 class="col-12">Datos extras</h3>
							<div class="col-sm-12 col-md-5">
								<div class="md-form">
									<i class="fas fa-school prefix"></i>
									<input id="escuela" required type="text" name="escuela" class="form-control" data-success="Válido" tabindex="15" aria-describedby="escuela">
									<label for="escuela">Escuela</label>
									<small id="escuela" class="text-muted">
										Escuela de procedencia.
									</small>
								</div>
							</div>

							<div class="col-sm-12 col-md-5">
								<div class="md-form">
									<i class="fas fa-comment-alt prefix"></i>
									<textarea id="comentarios" required rows="3" name="comentarios" class="form-control" data-success="Válido" tabindex="16" aria-describedby="comentarios"></textarea>
									<label for="escuela">Comentarios</label>
									<small id="escuela" class="text-muted">
										Comentarios acerca del educador.
									</small>
								</div>
							</div>
							
						</div>
						<div class="row text-right">
							<button type="submit" class="btn btn-primary" tabindex="24">Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/popper.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../..//js/mdb.min.js"></script>
<script type="text/javascript" src="../../js/sidebar.min.js"></script>
<script type="text/javascript" src="../../js/alertify.min.js"></script>
<script type="text/javascript">
	alertify.defaults.transition = "slide";
	alertify.defaults.theme.ok = "btn green accent-4";
	alertify.defaults.theme.cancel = "btn red accent-4";
	alertify.defaults.theme.input = "form-control";
</script>
<script src="../../js/principal.js"></script>
<script src="../../js/admin/educadorNuevo.js"></script>
</body>
</html>