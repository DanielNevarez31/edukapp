<?php include '../../verificar.php';
require '../../../php/conn.php';
$id = $_GET['id'];
$sql = "SELECT * FROM informacion_eventos WHERE id_info = '$id'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar eventos</title>
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
                    <button class="btn btn-sm green m-0 d-inline mr-2" id="btnBarraLateral" data-toggle="tooltip" title="Ocultar/Mostrar barra lateral">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a class="breadcrumb-item" href="../">Inicio</a>
                    <a href="../../eventos/" class="breadcrumb-item">Eventos</a>
                    <a href="nuevo.php" class="breadcrumb-item disabled active">Nuevo</a>
                </ol>
            </div>
            <div class="row mx-1"> <!-- Formulario -->
                <h1 class="col-12 text-center">Registrar un evento nuevo</h1>
                <div class="col-12 mt-0">
                    <a href="../../eventos/" class="btn grey text-white" data-toggle="tooltip" data-placement="top" title="Ver todos los eventos registrados">
                        <i class="fas fa-clipboard-list fa-lg"></i>
                    </a>
                    <button id="registrarProducto" class="btn btn-primary"  data-toggle="tooltip" data-placement="top" title="Registrar evento">
                        <i class="fas fa-plus fa-lg"></i>
                    </button>
                </div>
                <div class="col-12 border border-light rounded p-5 mb-2">
                    <form id="formulario">
                        <div class="row">
                            <h3 class="col-sm-12 col-md-6">Datos generales</h3>
                            <div class="col-sm-12 col-md-6"></div>
                            
                            <div class="col-sm-12 col-md-3">
                            <h6>Fecha del evento</h6>
                                <div class="md-form">
                                    <i class="far fa-calendar-alt prefix"></i>
                                    <input id="fecha" type="date" name="fecha" value="<?php echo $row['fecha'] ?>" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="1" aria-describedby="fechaAyuda" required>
                                    
                                    <small id="fechaAyuda" class="text-muted">
                                        Fecha en que se va a realizar el evento.
                                    </small>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-3">
                                <h6>Hora del evento</h6>
                                <div class="md-form">
                                    <i class="far fa-clock prefix"></i>
                                    <input id="hora" type="time" name="hora" class="form-control" tabindex="6" aria-describedby="horaAyuda" data-error="Ingresa un número con formato válido." data-success="Válido" required minlength="7" value="<?php echo $row['hora'] ?>" maxlength="15">
                                    
                                    <small id="horaAyuda" class="text-muted">
                                        Hora en que se realizará el evento
                                    </small>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-6">
                                <h6>Descripción del evento</h6>
                                <div class="md-form">
                                    <i class="fas fa-question-circle prefix"></i>
                                    <textarea id="descripcion" type="text" rows="3" required name="descripcion" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="17" aria-describedby="descripcionAyuda"></textarea>
                                    <label for="descripcion">Descripción</label>
                                    <small id="descripcionAyuda" class="text-muted">
                                        Descripción acerca del evento.
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="md-form">
                                    <i class="fas fa-users prefix"></i>
                                    <input id="cantidad" type="number" min="10" name="cantidad" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" value="<?php echo $row['cant_personas'] ?>" tabindex="17" required aria-describedby="cantidadAyuda">
                                    <label for="cantidad">Cantidad de personas</label>
                                    <small id="cantidadAyuda" class="text-muted">
                                        Cantidad de personas para las cuales es el evento.
                                    </small>
                                </div>
                            </div>
                              <div class="col-sm-12 col-md-3" hidden>
                                <div class="md-form">
                                    <i class="fas fa-users prefix"></i>
                                    <input style="display: none;" value="<?php echo $row['id_info'] ?>" id="id" type="number"  name="cantidad" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido"  tabindex="17" aria-describedby="cantidadAyuda">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="md-form">
                                    <i class="fas fa-dollar-sign prefix"></i>
                                    <input id="costo"  type="text" name="costo" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="17" aria-describedby="costoAyuda" required>
                                    <label for="costo">Costo del evento</label>
                                    <small id="costoAyuda" class="text-muted">
                                        Costo del evento.
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                                <h6>Trabajador que registró el evento</h6>
                                <div class="md-form">                                       
                                    <select required id="trabajador" name="trabajador" class="form-control" tabindex="0" data-success="Válido">
                                        <option value="" selected>Ver todos</option>
                                    <?php 
                                    require ('../../../php/conn.php');
                                    $sql = "SELECT id_trabajador,nombre, ape1, ape2 FROM trabajadores ORDER BY nombre,ape1,ape2";
                                    $res = mysqli_query($conn,$sql);
                                    while ($row = mysqli_fetch_array($res))
                                        echo '<option value="'.$row['id_trabajador'].'">'.$row['nombre'].' '.$row['ape1'].' '.$row['ape2'].'</option>';
                                    ?>
                                    </select>
                                    
                                    <small id="trabajadorAyuda" class="text-muted">
                                        Trabajador que registró el evento.
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <h6>Empleados que participarán en dicho evento</h6>
                                <div class="md-form">
                                    <i class="fas fa-users prefix"></i>
                                    <textarea id="empleados" rows="3" name="empleados" class="form-control" data-error="Por favor, escribe un nombre válido" data-success="Válido" tabindex="17" aria-describedby="empleadosAyuda" required></textarea>
                                    <label for="empleados">Empleados que participarán en dicho evento</label>
                                    <small id="empleadosAyuda" class="text-muted">
                                        Empleados que participarán en dicho evento.
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
<script type="text/javascript" src="../../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../../js/popper.min.js"></script>
<script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../../js/mdb.min.js"></script>
<script type="text/javascript" src="../../../js/sidebar.min.js"></script>
<script type="text/javascript" src="../../../js/alertify.min.js"></script>
<script type="text/javascript">
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn green accent-4";
    alertify.defaults.theme.cancel = "btn red accent-4";
    alertify.defaults.theme.input = "form-control";
</script>
<script src="../../../js/principal.js"></script>
<script src="../../../js/admin/eventosNuevo.js"></script>
</body>
</html>