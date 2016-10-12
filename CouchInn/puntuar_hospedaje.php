<?php
session_start();
require_once("./conectarBD.php");
if( ! isset($_POST['secreto'])) {

	header("Location: index.php?msg=ACCESO DENEGADO &&class=alert-danger");
	exit();
}else {
	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include("includes.php"); ?>

		<title>¡Puntua el couch donde te hospedaste!</title>

		<style>
		<?php include("./css/commentstyle.css"); ?>
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
		.form-control{
			display: inline;
			width: 50%;
		}
		.carousel-inner > .item > img, .carousel-inner > .item > a > img{
			width: 100%; /* use this, or not */
			margin: auto;
		}
		#form {
			width: 250px;
			margin: 0 auto;
			height: 50px;
		}

		#form p {
			text-align: center;
		}

		#form label {
			font-size: 20px;
		}

		input[type="radio"] {
			display: none;
		}

		label {
			color: grey;
		}

		.clasificacion {
			direction: rtl;
			unicode-bidi: bidi-override;
		}
		.botoncitoverde {
			color: #333;
			background-color: #96ac3c;
			border-color: #96ac3c;
		}
		label:hover,
		label:hover ~ label {
			color: orange;
		}

		input[type="radio"]:checked ~ label {
			color: orange;
		}

		.panel-body {
    background-color: rgba(255, 255, 255, 0) !important;;
}




		</style>
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<link rel="stylesheet" href="css/mystyle.css">
		<script>
		function YNconfirm() {
			if (window.confirm('¿Realmente queres cancelar los cambios?'))
			{
				window.location.href = 'index.php';
			}
		}

		function validate() {
			if (!/^[a-zA-Z]+( +[a-zA-Z]+)*$/g.test(document.nomTipo.nomTipo.value)) {
				alert("Ingrese solamente letras por favor");
				document.nomTipo.nomTipo.focus();
				return false;
			}
			return true;
		}
		function is1to5(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode;
			if( charCode > 48 && charCode < 54)
			return true;
			return false;
		}

		function changeValue( valueId, changeId) {
			document.getElementById(changeId).value = document.getElementById(valueId).value
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
	<div class="container" >

		<div class="panel-body" >
			<?php


			$idCouch=$_POST['secreto'];
			$idReserva=$_POST['secreto2'];

			$query="SELECT * FROM reserva INNER JOIN couch ON (reserva.id_couch= couch.id_couch) WHERE couch.id_couch='$idCouch'";
			$resultado=mysqli_query($conexion, $query);
			$first= true;
			$couch = mysqli_fetch_array($resultado);

			$query="SELECT * FROM reserva WHERE id_couch='$idCouch'";

			$resultado2 = mysqli_query($conexion, $query);
			$reserva = mysqli_fetch_array($resultado2);
			$cant=mysqli_num_rows($resultado);

			?>




			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="h3 col-md-offset-0"> Couch: <?php echo($couch["nombre"]) ?></p>
				</div>
				<div class="panel-body">


					<form  action="alta_puntajeCouch.php" class="form-horizontal " method="GET">
						<div class="form-group col-sm-6 ">
							<label for="puntReser" class="control-label">Puntua tu estadía: </label>
							<input type="range" min="1" max="5" name="puntReser" id="puntReser"
							onchange="changeValue('puntReser' , 'puntReserShow')">
							<input type="text" id="puntReserShow" value = "3" size="1" maxlength="1" min="1" max="5"
							onkeypress="return is1to5(event)"
							onchange="changeValue('puntReserShow', 'puntReser')" required>
						</div>
						<div class="form-group">
Si lo deseas, deja un comentario
							<div>
								<textarea name="puntReserCont" id="comments" class=" col-sm-12 col-sm-offset-0" style="font-family:sans-serif;font-size:1.2em;"></textarea>
							</div>
							<input type="hidden" name="puntaje" value="id"/>
							<input type="hidden" name="id_couch" value="<?php echo $idCouch ?>"/>
							<input type="hidden" name="id_reserva" value="<?php echo $idReserva ?>"/>
							<input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>"/>
							<input type="submit" class="botoncitoverde btn col-sm-12 col-sm-offset-0" onclick="return confirm('Seguro?')" value="Enviar mi puntuacion" name="Enviar Comentario"/>

							<br>



						</div>
					</form>
				</div>



				<?php include("./modal.php") ?>

				<?php   }
				?>

				<div>
				</body>

				</html>
