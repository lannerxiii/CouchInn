<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("includes.php"); ?>
	<link rel="stylesheet" href="css/mystyle.css">
	<title>Agrega tu Couch</title>
	<script src="js/validaciones.js"></script>
	<script src"js/validarTarjeta.js"></script>

	<style>
	/* Remove the navbar's default rounded borders and increase the bottom margin */
	.navbar {
		margin-bottom: 50px;
		border-radius: 0;
	}

	/* Remove the jumbotron's default bottom margin */
	.jumbotron {
		margin-bottom: 0;
		padding-top: 15px;
		padding-bottom: 15px;

	}
	.jumbotron .container {
		max-width: 45%;
	}
	body {
		font-size: 100%;
		font-family: "Open Sans", sans-serif;
	}

	/* Add a gray background color and some padding to the footer */
	footer {
		background-color: #f2f2f2;
		padding: 25px;
	}
	.fitImage {
		max-width:85%;
		max-height: 85%;
	}
	</style>

	<script>
	function myFunction() {
		var x = document.getElementById("imgCouchRequired").required;
	}
	$(document).ready(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '2016:2030',
			minDate: 0,

			onSelect: function (date) {
				var dob = new Date(date);
				var today = new Date();
			}

		});
		$("#datepicker").datepicker("option","dateformat","dd-mm-yy");
	});
	$(document).ready(function() {
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '2016:2030',
minDate: 0,
			onSelect: function (date) {
				var dob = new Date(date);
				var today = new Date();
			}
		});
		$("#datepicker2").datepicker("option","dateformat","dd-mm-yy");
	});
	function cancelar() {
	    var ask = window.confirm("Esta seguro que desea cancelar?");
	    if (ask) {
	        document.location.href = "index.php";

	    }
	}

	</script>

</head>
</head>
<?php include("random_background.php"); ?>
<body background="<?php echo $bg[array_rand($bg)]; ?>">
	<header >
		<div class="jumbotron">
			<div class="container text-center">
				<img src="./img/f0d2b89.png" class="fitImage">
			</div>
		</div>

	</header>
	<?php include("navbar2.php"); ?>
	<?php if (isset($_GET['msg'])) { ?>
		<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
			<?php echo($_GET['msg']); ?>
		</div>
		<?php } ?>
		<div class="container col-sm-8 col-sm-offset-2">
			<main class="container col-sm-12 col-sm-offset-0">
				<?php if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg'])?>
					</div>
					<?php } ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 align="center" style="font-size: 170%;">Busqueda Avanzada: filtros</h3>
						</div>
						<div class="panel-body">
							Desde aca se te permitira buscar con mas detalles los Couchs, solo debes completar con los datos que deseas.
							<?php
							require_once("./conectarBD.php");
							$query= "SELECT id_tipo,nombreTipo FROM tipo_couch WHERE visible = 1";
							$result=mysqli_query($conexion, $query);
							?>
							<br><br><br>
							<div class="controls col-md-offset-1">
								<form class="form-horizontal" action="listado_filtrado.php" method="GET" onsubmit=" return validarBusquedaAvanzada(this)">

									<div class="form-group row">
										<label for="titCouch" class="col-sm-2 form-control-label">Titulo</label>
										<div class="col-sm-10">
											<input type="text"  name="titulo" class="form-control" id="titCouch" placeholder="Nombre del Couch">
										</div>
									</div>
									<div class="form-group row">
										<label for="titCouch" class="col-sm-2 form-control-label">Descripcion</label>
										<div class="col-sm-10">
											<input type="text"  name="descripcion" class="form-control" id="titCouch" placeholder="Ingrese palabras de la descripcion">
										</div>
									</div>
									<div class="form-group row">
										<label for="ubCouch" class="col-sm-2 form-control-label">Ubicacion</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" id="ciudad" name="lugar" placeholder="Ingrese ubicacion">
										</div>
									</div>

									<div class="form-group row">
										<label for="fecha" class="col-sm-2 form-control-label">Fecha desde:</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="Ingrese la fecha de inicio" >
										</div>
									</div>
									<div class="form-group row">
										<label for="fecha" class="col-sm-2 form-control-label" >Fecha hasta:</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" id="datepicker2" name="datepicker2" placeholder="Ingrese la fecha de fin" >
										</div>
									</div>
									<div class="form-group row">
										<label for="apellido"  class="col-sm-2 form-control-label" >Capacidad</label>
										<div class="col-sm-10">

											<input class="form-control" type="number" min="1" id="plazas" name="capacidad" placeholder="Ingrese la capacidad">
										</div>
									</div>
									<div class="form-group row">
										<label for="dirCouch" class="col-sm-2 form-control-label">Tipo de Couch</label>
										<div class="col-sm-10">
											<select class="form-control" id="tipCouch" name="tipo" >
												<option ></option>
												<?php while ( $tipos = mysqli_fetch_array($result) ){ ?>
													<option value=<?php echo($tipos['id_tipo']); ?>> <?php echo($tipos['nombreTipo']); ?> </option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<button type="submit"  class="btn btn-default btn-lg" >Busca!</button>
											<a class="btn btn-default btn-lg" onclick="return cancelar()" >Cancelar</a>

										</div>
									</form>
								</div>
							</div>
						</div>
					</main>

					</body>

					<script src="./js/jquery.min.js"></script>
					<script src="js/main.js"></script> <!-- Gem jQuery -->

					<link rel="stylesheet" href="./js/jquery-ui.css">
					<script src="./js/jquery-1.10.2.js"></script>

					<script src="./js/jquery-ui.js"></script>
					<script src="js/validaciones.js"></script>
					</html>
					<?php
					//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
					?>
