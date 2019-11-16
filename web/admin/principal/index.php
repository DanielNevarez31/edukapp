<?php include '../verificar.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDUKAPP</title>
	<link rel="shortcut icon" href="../../images/favicon.ico">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/mdb.min.css" rel="stylesheet">
  <link href="../../css/alertify.min.css" rel="stylesheet">
	<link href="../../css/admin.css" rel="stylesheet">
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
			
			<div class="row">
				<div class="col-12">
					<!-- <button class="btn btn-primary" id="btnBarraLateral">
						Ocultar barra lateral
					</button> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 my-2">
					<h3 class="text-center">Gráfico de barras</h3>
					<canvas id="grafBarras"></canvas>
				</div>
				<div class="col-md-6 col-sm-12 my-2">
					<h3 class="text-center">Gráfico Lineal</h3>
					<canvas id="grafLinea"></canvas>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../js/popper.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../js/mdb.min.js"></script>
<script type="text/javascript" src="../../js/sidebar.min.js"></script>
<script type="text/javascript" src="../../js/alertify.min.js"></script>
<script type="text/javascript">
	alertify.defaults.transition = "slide";
	alertify.defaults.theme.ok = "btn green accent-4";
	alertify.defaults.theme.cancel = "btn red accent-4";
	alertify.defaults.theme.input = "form-control";
</script>
<script>
  new Chart(document.getElementById("grafBarras"), {
    "type": "horizontalBar",
    "data": {
      "labels": ["NORMAL", "FECA", "UPD"],
      "datasets": [{
        "label": "Institución",
        "data": [77, 33, 55],
        "fill": false,
        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)"],
        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)"],
        "borderWidth": 1
      }]
    },
    "options": {
      "scales": {
        "xAxes": [{
          "ticks": {
            "beginAtZero": true
          }
        }]
      }
    }
  });

  var ctxL = document.getElementById("grafLinea").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
      datasets: [{
          label: "NORMAL",
          data: [65, 59, 80, 81, 56, 55, 50],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "FECA",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "UPD",
          data: [10, 30, 40, 39, 71, 42, 70],
          backgroundColor: [
            'rgba(0, 100, 0, .2)',
          ],
          borderColor: [
            'rgba(0, 190, 10, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });

</script>
<script src="../../js/principal.js"></script>
</body>
</html>