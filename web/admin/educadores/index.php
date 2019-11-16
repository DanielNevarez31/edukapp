<?php include '../verificar.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EdukApp</title>
	<link rel="shortcut icon" href="../../images/favicon.ico">
	<?php include '../style.php'; ?>
    <link rel="stylesheet" type="text/css" href="../../css/datatables.min.css">
</head>
<body>
	<div id="contenedor_carga">
		<div class="loader">
			Cargando
		</div>
	</div>
	<?php include('../navbar.php'); ?>

	<div class="container-fluid d-flex align-items-stretch row m-0 p-0" id="pag">
		<?php include('../sidebar.php'); ?>
		
		<div id="contenido" class="col-md-10 col-sm-12">
			<div class="row mx-1 my-1 text-right">
                <br><hr>
				<div class="col-12">
					<h1 class="text-center">Lista de educadores</h1>
				</div>
				<button class="btn grey" onclick="listar();" data-toggle="tooltip" data-placement="top" title="Actualizar">
					<i class="fas fa-sync ml-1 fa-lg"></i>
				</button>
				<a href="nuevo.php" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar nuevo">
					<i class="fas fa-plus ml-1 fa-lg"></i>
				</a>
			</div>
			<div class="row mx-1">
				<div class="col-12">
					<div class="nmt">
						<table class="table table-hover rounded border border-light" id="table">
							<thead>
								<tr>
									<th class="font-weight-bold">Nombre</th>
									<th class="font-weight-bold">Primer apellido</th>
									<th class="font-weight-bold">Segundo apellido</th>
									<th class="font-weight-bold">Teléfono</th>
									<th class="font-weight-bold">Grado de estudio</th>
									<th class="font-weight-bold">Acciones</th>
								</tr>
							</thead>
							<tbody id="tblEstudiantes">
							    <?php include '../../php/educadores/listar.php'; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modalDetallesEducador" tabindex="-1" role="dialog" aria-labelledby="tituloDetallesEducador" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloDetallesEducador">Información...</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body d-flex justify-content-center white" id="detalles">
	                <div class="container row">
	                    <!-- <div class="col-sm-12 col-md-3 text-center">
	                        <img src="../../images/info.png" class="mx-auto">
	                    </div>
	                    <div class="col-sm-12 col-md-9 mb-2 pt-2">
                           <h5>EdukApp</h5>
                        </div> -->
                        <div class="col-12">
                            <div class="nwt">
                                <table class="table table-hover table-striped rounded table-fixed border table-sm" id="tblDatosEmpleado">
                                    <td class="text-center font-weight-bold" style="font-size: 20px;" colspan="2">Educador <i class="fas fa-chalkboard-teacher"></i></td>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical" width=25%>
                                            Nombre:
                                        </th>
                                        <td id="tdNombre"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Sexo:
                                        </th>
                                        <td id="tdSexo"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold" colspan="2">Dirección</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Calle:
                                        </th>
                                        <td id="tdCalle"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Número exterior:
                                        </th>
                                        <td id="tdNumext"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Número interior:
                                        </th>
                                        <td id="tdNumint"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Código postal:
                                        </th>
                                        <td id="tdCp"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Colonia:
                                        </th>
                                        <td id="tdColonia"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold"colspan="2">Contacto</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Email:
                                        </th>
                                        <td id="tdEmail"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Teléfono / Celular:
                                        </th>
                                        <td id="tdTelefono"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center font-weight-bold"colspan="2">Otros</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Escuela de procedencia:
                                        </th>
                                        <td id="tdEscuela"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Grado de estudios:
                                        </th>
                                        <td id="tdGrado"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Comentarios
                                        </th>
                                        <td id="tdComentarios"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Status: 
                                        </th>
                                        <td id="tdStatus"></td>
                                    </tr>
                                    
                                    <td style="display: none;" id="alumnoTitle" class="text-center font-weight-bold" style="font-size: 20px;" colspan="2">Alumno <i class="fas fa-user-graduate"></i></td>
                                    <tr id="alumnoNombre" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Nombre del alumno: 
                                        </th>
                                        <td id="tdAlumnoNombre"></td>
                                    </tr> 
                                    <tr id="alumnoSexo" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Sexo: 
                                        </th>
                                        <td id="tdAlumnoSexo"></td>
                                    </tr>  
                                    <tr id="alumnoCalle" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Calle:
                                        </th>
                                        <td id="tdAlumnoCalle"></td>
                                    </tr>
                                    <tr id="alumnoNumExt" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Número exterior:
                                        </th>
                                        <td id="tdAlumnoNumExt"></td>
                                    </tr>
                                    <tr id="alumnoNumInt" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Número interior:
                                        </th>
                                        <td id="tdAlumnoNumInt"></td>
                                    </tr>
                                    <tr id="alumnoCp" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Código postal:
                                        </th>
                                        <td id="tdAlumnoCp"></td>
                                    </tr>
                                    <tr id="alumnoCol" style="display: none;">
                                        <th class="text-center font-weight-bold text-black headerVertical">
                                            Colonia:
                                        </th>
                                        <td id="tdAlumnoColonia"></td>
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
	
	<div class="modal fade" id="modalEditarEducador" tabindex="-1" role="dialog" aria-labelledby="tituloEditarEducador" aria-hidden="true">
	    <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="tituloEditar">
						Editar datos de empleado
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>	                
	            </div>
	            <div class="modal-body d-flex justify-content-center white">
	                <div class="row">
	                    <div class="col-12">
	                        <div class="row">
	                            <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-user-alt prefix"></i>
                                        <input id="nombre" type="text" name="nombre" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="1" aria-describedby="nombreAyuda" required>
                                        <label for="nombre">Nombre</label>
                                        <small id="nombreAyuda" class="text-muted">
                                            Nombre del empleado.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-user-alt prefix"></i>
                                        <input id="ape1" type="text" name="ape1" class="form-control" data-error="Por favor, escribe un apellido válido" data-success="Válido" tabindex="2" aria-describedby="ape1Ayuda" required>
                                        <label for="ape1">Primer apellido</label>
                                        <small id="ape1Ayuda" class="text-muted">
                                            Primer apellido del empleado.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-user-alt prefix"></i>
                                        <input id="ape2" type="text" name="ape2" class="form-control" data-error="Por favor, escribe un apellido válido" data-success="Válido" tabindex="3" aria-describedby="ape2Ayuda">
                                        <label for="ape2">Segundo apellido</label>
                                        <small id="ape2Ayuda" class="text-muted">
                                            Segundo apelido del empleado.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="d-flex mt-4">
                                        <i class="fas fa-briefcase prefix fa-2x mx-1"></i>
                                        <label for="cargo" class="mx-1">Cargo</label>
                                        <select class="custom-select custom-select-sm d-inline" tabindex="5" required id="cargo">
                                                <option value="Otro">Otro</option>
                                                <option value="Mesero">Mesero</option>
                                                <option value="Administrador">Administrador</option>
                                        </select>
                                    </div>
                                    <small id="cargoAyuda" class="text-muted">
                                        Cargo que ocupa en la empresa.
                                    </small>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="d-flex mt-4">
                                        <i class="far fa-id-badge prefix fa-2x mx-1"></i>
                                        <label for="sexo" class="blue-grey-text mx-1">Sexo</label>
                                        <select class="custom-select custom-select-sm d-inline" tabindex="5" required id="sexo">
                                                <option value="Hombre">Hombre</option>
                                                <option value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-phone prefix"></i>
                                        <input id="tel" type="tel" name="tel" class="form-control" tabindex="6" aria-describedby="telAyuda" data-error="Ingresa un número con formato válido." data-success="Válido" required minlength="7" maxlength="15">
                                        <label for="tel">Teléfono</label>
                                        <small id="telAyuda" class="text-muted">
                                            Número de teléfono para contactarlo.
                                            <b>Ejemplos:</b> <i>618-101-0110</i> <b>o</b> <i>801-10-01</i>
                                        </small>
                                    </div>
                                </div>
	                        </div>
	                        <div class="row mb-2">						    
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chckUsuario" tabindex="7">
                                        <label class="custom-control-label" for="chckUsuario">
                                            <span class="badge badge-light badge-pill ml-1">
                                                <i class="fas fa-angle-left mr-1"></i>
                                                Clic para crear usuario del trabajador en el sistema.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row datosUser">
                                <h3 class="col-12">Defina las siguientes credenciales</h3>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-user prefix"></i>
                                        <input id="username" type="text" name="username" class="form-control" data-error="Por favor, escribe un username válido" data-success="Válido" tabindex="8" aria-describedby="usernameAyuda" onkeyup="checkUsername()">
                                        <label for="username">Usuario</label>
                                        <small id="usernameAyuda" class="text-muted">
                                            Introduzca un nuevo nombre del usuario si desea sustituir el actual.
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
                                        <label for="password">Nueva contraseña</label>
                                        <small id="passwordAyuda" class="text-muted">
                                            Si desea cambiar la contraseña de este usuario, introduzca una nueva en este campo, si no desea hacerlo solo deje el campo vacío.
                                            Si por el contrario, esta por crear un nuevo, este campo es obligatorio.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-key prefix"></i>
                                        <input id="cpass" type="password" name="cpass" class="form-control" data-error="Por favor, escribe un password válido" data-success="Válido" tabindex="8" aria-describedby="cpassAyuda">
                                        <label for="cpass">Confirmar contraseña</label>
                                        <small id="cpassAyuda" class="text-muted">
                                            Escriba nuevamente la nueva contraseña para confirmar el cambio.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="md-form">
                                        <select class="custom-select mb-2" id="selectPrivilegio" name="selectPrivilegio" aria-describedby="sprivAyuda">
                                            <option value="0">Seleccione un tipo de usuario</option>
                                            <option value="1">Administrador del sistema</option>
                                            <option value="2">Mesero</option>
                                            <option value="3">Otro</option>
                                        </select>
                                        <small id="sprivAyuda" class="text-muted">
                                            El tipo de usuario determinara si este podra acceder a todo el sistema o solo a la aplicación móvil.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="chckDatosExtra" tabindex="7">
                                        <label class="custom-control-label" for="chckDatosExtra">
                                            <span class="badge badge-light badge-pill ml-1">
                                                <i class="fas fa-angle-left mr-1"></i>
                                                Clic para añadir más datos personales.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row opcional">
                                <h3 class="col-12">Dirección</h3>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="fas fa-road prefix"></i>
                                        <input id="calle" type="text" name="calle" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="8" aria-describedby="calleAyuda">
                                        <label for="calle">Calle</label>
                                        <small id="calleAyuda" class="text-muted">
                                            Nombre de la calle.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="md-form">
                                        <i class="fab fa-slack-hash prefix"></i>
                                        <input id="num_ext" type="text" name="num_ext" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="9" aria-describedby="num_extAyuda">
                                        <label for="num_ext">Número exterior</label>
                                        <small id="num_extAyuda" class="text-muted">
                                            Número exterior del domicilio.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="md-form">
                                        <i class="fab fa-slack prefix"></i>
                                        <input id="num_int" type="text" name="num_int" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="10" aria-describedby="num_intAyuda">
                                        <label for="num_int">Número interior</label>
                                        <small id="num_intAyuda" class="text-muted">
                                            Número interior del domicilio.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="md-form">
                                        <i class="fas fa-building prefix"></i>
                                        <input id="colonia" type="text" name="colonia" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="11" aria-describedby="coloniaAyuda">
                                        <label for="colonia">Colonia</label>
                                        <small id="coloniaAyuda" class="text-muted">
                                            Colonia o fraccionamiento donde vive.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="md-form">
                                        <i class="far fa-envelope prefix"></i>
                                        <input id="cp" type="text" name="cp" class="form-control" data-error="Por favor, escribe un código válido" data-success="Válido" tabindex="12" aria-describedby="cpAyuda">
                                        <label for="cp">Código postal</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-map-marker-alt prefix"></i>
                                        <input id="localidad" type="text" name="localidad" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="13" aria-describedby="localidadAyuda">
                                        <small id="localidadAyuda" class="text-muted">
                                            Localidad donde vive.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
    								<div class="md-form">
    									<i class="fas fa-map-marker-alt prefix"></i>
    									<input id="municipio" type="text" name="municipio" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="19" aria-describedby="municipioAyuda">
    									<label for="municipio">Municipio</label>
    									<small id="municipioAyuda" class="text-muted">
    										Municipio donde vive.
    									</small>
    								</div>
                                </div>
							
                                <div class="col-sm-12 col-md-4">
                                    <div class="md-form">
                                        <i class="fas fa-map-marker-alt prefix"></i>
                                        <input id="estado" type="text" name="estado" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="15" aria-describedby="estadoAyuda" value="Durango">
                                        <label for="estado">Estado</label>
                                        <small id="estadoAyuda" class="text-muted">
                                            Estado donde vive.
                                        </small>
                                    </div>
                                </div>
                                <h3 class="col-12">Otros</h3>
                                <div class="col-sm-12 col-md-3">
                                    <div class="md-form">
                                        <i class="fas fa-mobile-alt prefix"></i>
                                        <input id="cel" type="text" name="cel" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="16" aria-describedby="celAyuda">
                                        <label for="cel">Celular</label>
                                        <small id="celAyuda" class="text-muted">
                                            Celular para contactarlo.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="md-form">
                                        <i class="fas fa-at prefix"></i>
                                        <input id="email" type="text" name="email" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="17" aria-describedby="emailAyuda">
                                        <label for="email">Email</label>
                                        <small id="emailAyuda" class="text-muted">
                                            Email para contactarlo.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="md-form">
                                        <i class="far fa-sticky-note prefix"></i>
                                        <input id="comentarios" type="text" name="comentarios" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="18" aria-describedby="comentariosAyuda">
                                        <label for="comentarios">Comentarios</label>
                                        <small id="comentariosAyuda" class="text-muted">
                                            Cualquier información extra que se desee añadir.
                                        </small>
                                    </div>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
                    <button type="button" class="btn green accent-4" onclick="updateEmp()" id="btnEditarEmpleado">
                        Editar
                    </button>
					<button type="button" class="btn red accent-4" data-dismiss="modal">
						Cerrar
					</button>
	            </div>
	        </div>
	    </div>
	</div>




    <div class="modal fade" id="asignarAlumnos" tabindex="-1" role="dialog" aria-labelledby="tituloDetallesEducador" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloDetallesEducador">Alumnos disponibles <i class="fas fa-user-graduate"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="asignarAlumnosForm">
                    <div class="modal-body d-flex justify-content-center white" id="detalles">
                    <div class="container row">
                        <div class="col-12">
                            <div class="nwt">
                                <select class="form-control" id="selectAlumnos" onchange="traerDatos(this.value)">                                    
                                </select>
                            </div>
                            <hr>
                            <div class="nwt" id="data">
                                <p id="alumnoSexo"></p>
                                <p id="direccion"></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" id="btnAsignar" style="display: none;" class="btn blue accent-4">
                        Asignar alumno
                    </button>
                    <button type="button" class="btn red accent-4" data-dismiss="modal">
                        Cerrar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>


<?php include '../script.php'; ?>
<script type="text/javascript" src="../../js/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#table').DataTable();
    });
</script>
<script src="../../js/admin/educadores.js"></script>
</body>
</html>