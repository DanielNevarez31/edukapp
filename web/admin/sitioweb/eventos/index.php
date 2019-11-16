<?php include '../../verificar.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Información eventos</title>
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
					<a href="#" class="breadcrumb-item disabled active">Información de eventos</a>
				</ol>
			</div>
			<div class="row mx-1 my-1 text-right">
				<div class="col-12">
					<h1 class="text-center">Ver lista de "Información eventos" </h1>
				</div>
				<button class="btn grey" onclick="listar();" data-toggle="tooltip" data-placement="top" title="Actualizar">
					<i class="fas fa-sync ml-1 fa-lg"></i>
				</button>
				<!-- <a href="nuevo.php" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar nuevo">
					<i class="fas fa-plus ml-1 fa-lg"></i>
				</a> -->
			</div>
			<div class="row mx-1">
				<div class="col-12 p-1">
				    <div class="md-form">
						<i class="fas fa-search prefix"></i>
						<input type="text" name="busqueda" class="form-control" onkeyup="buscar()">
						<label for="busqueda">Buscar registro...</label>
						<small class="text-muted">
							Puede buscar registros por el <b>Nombre del interesado</b>, <b>Fecha</b>, <b>teléfono</b>  o <b>Email</b>
						</small>
					</div>
					<div class="nmt">
						<table class="table table-hover rounded border border-light">
							<thead>
								<tr>
									<th class="font-weight-bold">Nombre interesado</th>
									<th class="font-weight-bold">Fecha de evento</th>
									<th class="font-weight-bold">Teléfono</th>
									<th class="font-weight-bold">Email</th>
									<th class="font-weight-bold">Cantidad de personas</th>
									<th class="font-weight-bold">Estado</th>
									<th class="font-weight-bold">Acciones</th>
								</tr>
							</thead>
							<tbody id="tblEventos">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalDetallesEve" tabindex="-1" role="dialog" aria-labelledby="tituloDetallesCliente" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesEmpleado">Información de contacto</h5>
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
                           <h5>Datos recibidos</h5>
                        </div>
                        <div class="col-12">
                            <div class="nwt">
                                <table class="table table-hover table-striped rounded table-fixed border table-sm" id="tblDatosEve">
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Nombre del interesado:
                                        </th>
                                        <td id="tdNombre"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Fecha estimada de vento:
                                        </th>
                                        <td id="tdFecha"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Télefono de contacto:
                                        </th>
                                        <td id="tdTelefono"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Email de contacto:
                                        </th>
                                        <td id="tdEmail"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Estimado de personas a asistir:
                                        </th>
                                        <td id="tdCantidad"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Mensaje:
                                        </th>
                                        <td id="tdMensaje"></td>
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

	

<?php include '../../script.php'; ?>
<script type="text/javascript" src="../../../js/admin/infoeventos.js"></script>


</body>
</html>