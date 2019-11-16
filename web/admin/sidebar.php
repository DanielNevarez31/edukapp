<div id="barraLateral" class="col-md-2 col-sm-12 m-0 p-0 d-none d-md-block">
			<div class="nav d-flex flex-column darken-3 font-weight-bold" role="group" style="background-color: #293546">
				<!-- <button type="button" class="btn btn-sm btn-block green darken-3 text-center tt" onclick="barra(0, null)" data-placement="right" title="Mostrar/Ocultar barra lateral">
					<i id="iconoBarra" class="fas fa-chevron-left fa-2x"></i>
				</button> -->
				<div id="panelUsuario" class="m-0 text-center p-1">
					<h6 class="text-white">
						Bienvenido: <?php echo $_SESSION['nombre']; ?>
					</h6>
				</div>
				<!-- Inicio -->
				<button class="btn btn-block text-left tt" title="Inicio" data-placement="right" onclick="barra(2, this)">
					<i class="fas fa-home fa-lg mr-1"></i><span class="btnMenu">Inicio</span>
				</button>
				<!-- Fin de inicio -->
				
				<!-- ADMIN -->
				<button type="button" class="btn btn-block text-left tt" data-toggle="collapse" style="background-color: #293546" data-target="#menuAdmins" aria-expanded="false" aria-controls="menuAdmins" onclick="barra(1, this);" title="Educadores" data-placement="right">
					<i class="fas fa-users-cog"></i><span class="btnMenu"> Administradores</span>
				</button>
				<div id="menuAdmins" class="collapse">
					<div class="d-flex flex-column">
						<a href="../admin/index.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-toolbox fa-lg mr-1"></i>Administrar
						</a>
						<a href="../admin/nuevo.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-plus fa-lg mr-1"></i>Nuevo
						</a>						
					</div>
				</div>
				<!-- Fin de ADMIN -->


				<!-- Educadores -->
				<button type="button" class="btn btn-block text-left tt" data-toggle="collapse" style="background-color: #293546" data-target="#menuEducadores" aria-expanded="false" aria-controls="menuEducadores" onclick="barra(1, this);" title="Educadores" data-placement="right">
					<i class="fas fa-chalkboard-teacher"></i><span class="btnMenu"> Educadores</span>
				</button>
				<div id="menuEducadores" class="collapse">
					<div class="d-flex flex-column">
						<a href="../educadores/index.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-toolbox fa-lg mr-1"></i>Administrar
						</a>
						<a href="../educadores/nuevo.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-plus fa-lg mr-1"></i>Nuevo
						</a>						
					</div>
				</div>
				<!-- Fin de Educadores -->

				<!-- Alumnos -->
				<button type="button" class="btn btn-block text-left tt" data-toggle="collapse" style="background-color: #293546" data-target="#menuAlumnos" aria-expanded="false" aria-controls="menuAlumnos" onclick="barra(1, this);" title="Alumnos" data-placement="right">
					<i class="fas fa-user-graduate"></i><span class="btnMenu"> Alumnos</span>
				</button>
				<div id="menuAlumnos" class="collapse">
					<div class="d-flex flex-column">
						<a href="../alumnos/index.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-toolbox fa-lg mr-1"></i>Administrar
						</a>
						<a href="../alumnos/nuevo.php" class="text-white d-block my-2 ml-5">
							<i class="fas fa-plus fa-lg mr-1"></i>Nuevo
						</a>						
					</div>
				</div>
				<!-- Fin de Alumnos -->
				
				<!-- Cerrar sesión -->
				<a class="btn orange accent-3 btn-block text-left tt" title="Cerrar sesión" data-placement="right" href="../logout.php">
					<i class="fas fa-sign-out-alt fa-lg mr-1"></i><span class="btnMenu">Cerrar sesión</span>
				</a>
				<!-- Fin de cerrar sesión -->
			</div>
		</div>