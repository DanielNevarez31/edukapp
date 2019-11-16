<nav class="navbar navbar-expand-lg navbar-dark darken-1" style="background-color: #293546">
		<a href="#" class="navbar-brand">
			<img src="../../images/nav.png" class="img-fluid" style="height:70px;">
		</a>
		<span class="text-white font-weight-bold h6-responsive">
			<span class="d-none d-sm-none d-md-inline-block">
				Sistema de administración EdukApp
			</span> 
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars fa-lg"></i>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="nav">
			<ul class="navbar-nav">
				<li class="nav-item m-1 d-sm-block d-md-none">
					<a href="../principal/index.php" class="nav-link rounded accent-4">
						<i class="fas fa-home fa-lg"></i>Inicio
					</a>
				</li>
				<!-- Educadores -->
				<li class="nav-item m-1 d-sm-block d-md-none">
					<div class="dropdown">
						<a href="#" class="nav-link rounded" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false" id="btnEducador">
							<i class="fas fa-chalkboard-teacher"></i> Educadores
						</a>
						<div class="dropdown-menu" aria-labelledby="btnEducador">
							<div class="dropdown-divider"></div>
							<a href="../educadores/" class="dropdown-item">
								<i class="fas fa-toolbox fa-lg mr-1"></i> Administrar
							</a>
						</div>
						<div class="dropdown-menu" aria-labelledby="btnEducador">
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-plus-circle"></i> Nuevo
							</a>
						</div>
					</div>
				</li>
				<!-- Estudiantes -->
				<li class="nav-item m-1 d-sm-block d-md-none">
					<div class="dropdown">
						<a href="#" class="nav-link rounded" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false" id="btnAlumnos">
							<i class="fas fa-user-graduate"></i> Alumnos
						</a>
						<div class="dropdown-menu" aria-labelledby="btnAlumnos">
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-toolbox fa-lg mr-1"></i> Administrar
							</a>
						</div>
						<div class="dropdown-menu" aria-labelledby="btnAlumnos">
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-plus-circle"></i> Nuevo
							</a>
						</div>
					</div>
				</li>
				<!-- Cerrar sesión -->
				<li class="nav-item mx-2 my-0">
					<a href="../logout.php" class="nav-link rounded my-2 text-center orange accent-3">
						<i class="fas fa-sign-out-alt fa-lg"></i>Cerrar sesión
					</a>
				</li>
			</ul>
		</div>
	</nav>