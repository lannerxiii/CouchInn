<?php
session_start();
if( isset($_SESSION['id_usuario']) ){
	$idUsuario= $_SESSION['id_usuario'];

	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include("includes.php"); ?>
		<link rel="stylesheet" href="css/mystyle.css">
		<title>Solicitar una reserva</title>
		<script src="js/validaciones.js"></script>
		<script src"js/validarTarjeta.js"></script>
		<script>
		$(document).ready(function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '2016:2080',
				minDate: 0,

				onSelect: function (date) {
					var dob = new Date(date);
					var today = new Date();
				}

			});
			$("#datepicker").datepicker("option","dateformat","yy-mm-dd");
		});
		$(document).ready(function() {
			$( "#datepicker2" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '2016:2080',
				minDate: 0,

				onSelect: function (date) {
					var dob = new Date(date);
					var today = new Date();
				}

			});
			$("#datepicker2").datepicker("option","dateformat","yy-mm-dd");
		});
		</script>

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


	</head>
</head>
<?php include("random_background.php"); ?>
<body background="<?php echo $bg[array_rand($bg)]; ?>">
	<header>
		<div class="jumbotron">
			<div class="container text-center">
				<img src="./img/f0d2b89.png" class="fitImage">
			</div>
		</div>

	</header>
	<?php include("navbar2.php"); ?>

	/* 	<?php
	require_once("./conectarBD.php");
	$query= "SELECT id_tipo,nombreTipo FROM tipo_couch WHERE visible = 1";
	$result=mysqli_query($conexion, $query);
	?> */

	<div class="container col-sm-8 col-sm-offset-2">
		<main class="container col-sm-12 col-sm-offset-0">
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg'])?>
				</div>
				<?php } ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 style="font-size: 170%;">Solicita una reserva</h3>
					</div>
					<div class="controls col-md-offset-1">
						<br>
						<form class="form-horizontal"  name="solicitarReserva" method="post" action="agregar_reserva.php" enctype="multipart/form-data">
							<p>
								<label class="image-replace cd-email" for="signup-email">Fecha desde:</label>
								<input type="text" class="form-control" name="fechaDesde" id="datepicker" placeholder="Fecha desde" min="00/00/0000" aria-describedby="helpBlock-fNac" required>
							</p>
						</br>
						<p>
							<label class="image-replace cd-email" for="signup-email">Fecha hasta:</label>
							<input type="text" class="form-control" name="fechaHasta" id="datepicker2" placeholder="Fecha hasta" min="00/00/0000" aria-describedby="helpBlock-fNac" required >
						</p>
					</br>
					<p class="fieldset">
						<div class="form-group row">
							<label for="dirCouch" class="col-sm-2 form-control-label">Capacidad</label>
							<div class="col-sm-10">
								<div class="form-group row">

									<input type="number" name="capacidad" required class="form-control" min="1" >

								</div>
							</div>
						</p>
								<?php

								$idCouch= $_POST['secreto'];

								 ?>
						<div class="form-group">
							<form action="agregar_reserva.php" method="POST">
			  				<input type="submit" class="btn btn-default btn-lg" onclick="return confirm('Seguro? ')" value="Solicitar reserva" name="enviar"/>
						  	<input type="hidden" name="secreto" value="<?php echo $idCouch?>"/>
								<input type="hidden" name="secreto_idUsuario" value="<?php echo $idUsuario?>"/>

					 	  	<a class="btn btn-default btn-lg" onclick="return cancelar()">Cancelar</a>
							</form>
							</div>

					</form>

					<script languaje="JavaScript">
					function confirmar() {
						alert("¿Desea confirmar los datos?.");
					}
				</script>
					<script languaje="JavaScript">
					function cancelar() {
							var ask = window.confirm("Esta seguro que desea cancelar?");
							if (ask) {
									document.location.href = "index.php";

							}
					}
					</script>
					<!--BOTON DE CONFIRMACION/CANCELACION DE LA RESERVA -->

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
			} else {
				header("Location: index.php?msg=Debes estar logueado para ver esta pagina&&class=alert-warning");
			}?>
