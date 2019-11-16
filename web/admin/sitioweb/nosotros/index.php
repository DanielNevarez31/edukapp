<?php include '../../verificar.php'; ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nosotros</title>
	<link rel="shortcut icon" href="../../../favicon.ico">
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
					<a href="#" class="breadcrumb-item disabled active">Nosotros</a>
				</ol>
			</div>
			<div class="row mx-1 my-1 text-right">
				<div class="col-12">
					<h1 class="text-center">Ver lista sección "Nosotros".</h1>
				</div>
				<button class="btn grey" onclick="listar();" data-toggle="tooltip" data-placement="top" title="Actualizar">
					<i class="fas fa-sync ml-1 fa-lg"></i>
				</button>
				<a href="nuevo.php" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar nueva">
					<i class="fas fa-plus ml-1 fa-lg"></i>
				</a>
			</div>
			<div class="row mx-1">
				<div class="col-12 p-1">
				    <div class="md-form">
						<i class="fas fa-search prefix"></i>
						<input type="text" name="busqueda" class="form-control" onkeyup="buscar()">
						<label for="busqueda">Buscar registros...</label>
						<small class="text-muted">
							Puede buscar registros por su <b>Titulo</b>, <b>Descripción</b>, o <b>Estado</b>
						</small>
					</div>
					<div class="nmt">
						<table class="table table-hover rounded border border-light">
							<thead>
								<tr>
									<th class="font-weight-bold">Imagen</th>
									<th class="font-weight-bold">Título</th>
									<th class="font-weight-bold">Descripción</th>
									<th class="font-weight-bold">Estado</th>
									<th class="font-weight-bold">Acciones</th>
								</tr>
							</thead>
							<tbody id="tblNosotros">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalDetallesNos" tabindex="-1" role="dialog" aria-labelledby="tituloDetallesNos" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesNos">Información de la promoción.</h5>
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
                           <h5>Promociones</h5>
                        </div>
                        <div class="col-12">
                            <div class="nwt">
                                <table class="table table-hover table-striped rounded table-fixed border table-sm" id="tblDatosNos">
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Imagen:
                                        </th>
                                        <td>
                                        	<img id="tdImagen" src="" width="300px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Título de la imagen:
                                        </th>
                                        <td id="tdTitulo"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Descripción de la promoción:
                                        </th>
                                        <td id="tdDescripcion"></td>
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
	<div class="modal fade" id="modalEditarNos" tabindex="-1" role="dialog" aria-labelledby="tituloEditarNos" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesNos">Editar información de la promoción</h5>
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
                                        <i class="fas fa-image prefix"></i>
                                        <input id="imagen" type="file" name="imagen" class="form-control" tabindex="2" accept="image/*" aria-describedby="imagenAyuda" data-error="Ingresa una imagen." data-success="Válido" required minlength="5" maxlength="50">
                                        <small id="imagenAyuda" class="text-muted">
                                            Imagen para sección de galería.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
									<img src="" width="300px" id="imgSalida">
								</div>
                              	<div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-edit prefix"></i>
                                        <input id="titulo" type="text" name="titulo" class="form-control" tabindex="1" aria-describedby="titulo" required>
                                        <label for="titulo">Título</label>
                                        <small id="tituloAyuda" class="text-muted">
                                            El título de la imagen.
                                            <b>Ejemplo:</b> <i>Tacos de Asada</i>.
                                        </small>
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-edit prefix"></i>
                                        <textarea id="descripcion" type="text" name="descripcion" class="form-control" tabindex="1" aria-describedby="descripcion" required rows="4"></textarea>
                                        <label for="titulo">Descripción de la promoción</label>
                                        <small id="descripcionAyuda" class="text-muted">
                                            Descripción de la promoción.
                                        </small>
                                    </div>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn green accent-4" onclick="updateNos()" id="btnEditarEmpleado">
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
<script type="text/javascript" src="../../../js/admin/nosotros.js"></script>


</body>
</html>