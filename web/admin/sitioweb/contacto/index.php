<?php include '../../verificar.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacto</title>
	<link rel="shortcut icon" href="../../favicon.ico">
	<?php include '../../style.php'; ?>	
</head>
<body>
	<div id="contenedor_carga">
		<div class="loader">
			<!-- <img src="/Aragon/img/brand.png" class="img-fluid"> -->
			Cargando
		</div>
	</div>
	<?php include('../../navbar.php'); ?>

	<div class="container-fluid d-flex align-items-stretch row m-0 p-0" id="pag">
		<?php include('../../sidebar.php'); ?>
		<div id="contenido" class="col-md-10 col-sm-12">
			<div class="row mx-1 my-2 d-block">
				<ol class="breadcrumb">
					<button class="btn btn-sm green m-0 d-inline mr-2" id="btnBarraLateral" data-toggle="tooltip" title="Ocultar/Mostrar barra lateral">
						<i class="fas fa-bars"></i>
					</button>
					<a class="breadcrumb-item" href="/adame/admin">Inicio</a>
					<a href="#" class="breadcrumb-item disabled active">Contacto</a>
				</ol>
			</div>
			<div class="row mx-1 my-1 text-right">
				<div class="col-12">
					<h1 class="text-center">Ver lista de "Contacto".</h1>
				</div>
				<button class="btn grey" onclick="listar();" data-toggle="tooltip" data-placement="top" title="Actualizar">
					<i class="fas fa-sync ml-1 fa-lg"></i>
				</button>
				<a href="nuevo.php" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar nuevo">
					<i class="fas fa-plus ml-1 fa-lg"></i>
				</a>
			</div>
			<div class="row mx-1">
				<div class="col-12 p-1">
				    <div class="md-form">
						<i class="fas fa-search prefix"></i>
						<input type="text" name="busqueda" class="form-control" onkeyup="buscar()">
						<label for="busqueda">Buscar sucursal...</label>
						<small class="text-muted">
							Puede buscar sucursales por su <b>Dirección</b>, <b>Nombre</b>, <b>Correo</b>  o <b>Teléfono</b>
						</small>
					</div>
					<div class="nmt">
						<table class="table table-hover rounded border border-light">
							<thead>
								<tr>
									<th class="font-weight-bold">Nombre sucursal</th>
									<th class="font-weight-bold">Dirección</th>
									<th class="font-weight-bold">Teléfono</th>
									<th class="font-weight-bold">Email</th>
									<th class="font-weight-bold">Acciones</th>
								</tr>
							</thead>
							<tbody id="tblContacto">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalDetallesSuc" tabindex="-1" role="dialog" aria-labelledby="tituloDetallesCliente" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesEmpleado">Información de la sucursal</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body d-flex justify-content-center white">
	                <div class="container row">
	                    <div class="col-sm-12 col-md-3 text-center">
	                        <img src="../../../img/brand.png" class="mx-auto">
	                    </div>
	                    <div class="col-sm-12 col-md-9 mb-2 pt-2">
                           <h5>Sucursales de contacto</h5>
                        </div>
                        <div class="col-12">
                            <div class="nwt">
                                <table class="table table-hover table-striped rounded table-fixed border table-sm" id="tblDatosSucursal">
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Nombre de la sucursal:
                                        </th>
                                        <td id="tdNombre"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Dirección:
                                        </th>
                                        <td id="tdDireccion"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Email:
                                        </th>
                                        <td id="tdCorreo"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Teléfono:
                                        </th>
                                        <td id="tdTelefono"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn red accent-4" data-dismiss="modal">
						Cerrar
					</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="modal fade" id="modalEditarSucursal" tabindex="-1" role="dialog" aria-labelledby="tituloEditarSucursal" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesSucursal">Editar información de la sucursal</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body d-flex justify-content-center white">
	                <div class="row">
	                    <div class="col-12">
	                        <div class="row">
                                <h3 class="col-sm-12 col-md-6">Datos generales</h3>
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-store prefix"></i>
                                        <input id="nombre_suc" type="text" name="nombre_suc" class="form-control" tabindex="1" aria-describedby="nombre_suc" required>
                                        <label for="nombre_suc">Nombre</label>
                                        <small id="nombre_sucAyuda" class="text-muted">
                                            El nombre de la sucursal.
                                            <b>Ejemplo:</b> <i>SUCURSAL #130</i>.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-phone prefix"></i>
                                        <input id="direccion" type="text" name="direccion" class="form-control" tabindex="2" aria-describedby="dirAyuda" data-error="Ingresa una dirección válida." data-success="Válido" required minlength="5" maxlength="100">
                                        <label for="tel">Dirección</label>
                                        <small id="telAyuda" class="text-muted">
                                            Dirección de la sucursal.
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
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-user-alt prefix"></i>
                                        <input id="correo" type="email" name="correo" class="form-control" data-error="Por favor, escribe un correo válido" data-success="Válido" tabindex="3" aria-describedby="nombreAyuda" required>
                                        <label for="email">Correo</label>
                                        <small id="nombreAyuda" class="text-muted">
                                            Correo electrónico de la sucursal.
                                        </small>
                                    </div>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn green accent-4" onclick="updateSuc()" id="btnEditarEmpleado">
                        Editar
                    </button>
	                <button type="button" class="btn red accent-4" data-dismiss="modal">
						Cerrar
					</button>
	            </div>
	        </div>
	    </div>
	</div>

<?php include '../../script.php'; ?>
<script type="text/javascript" src="../../../js/admin/contacto.js"></script>


</body>
</html>