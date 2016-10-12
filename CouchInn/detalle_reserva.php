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
		<title>Ver Reserva</title>

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
		.form-control{
			display: inline;
			width: 50%;
		}
		.carousel-inner > .item > img, .carousel-inner > .item > a > img{
			width: 100%; /* use this, or not */
			margin: auto;
		}
		.panel-body {
		    background-color: rgba(0,0,0,.0001) !important;
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
			$query="SELECT * FROM couch INNER JOIN reserva ON (couch.id_couch= reserva.id_couch) WHERE couch.id_couch='$idCouch'";
			$resultado=mysqli_query($conexion, $query);
			$first= true;
			$couch = mysqli_fetch_array($resultado);


				//busca las fotos del couch para agregarlas al carousel
				$query="SELECT * FROM reserva WHERE id_couch='$idCouch'";

				$resultado2 = mysqli_query($conexion, $query);
				$reserva = mysqli_fetch_array($resultado2);
				$cant=mysqli_num_rows($resultado);

				?>




							<div class="panel panel-default">
								<div class="panel-heading">
								<p class="h3 col-md-offset-0"> Mi reserva a: <?php echo($couch["nombre"]) ?></p>
								</div>
								<div class="panel-body">


									<div class="col-md-offset-0 col-md-6 inf_couch">
										<d1 class="dl-horizontal" >

											<dt> Fecha desde: </dt>
											<dd> <?php echo($reserva["fecha_inicio"]) ?></dd>
											<br>
											<dt> Fecha hasta: </dt>
											<dd> <?php echo($reserva["fecha_fin"]) ?></dd>
												<br>
											<dt> Capacidad: </dt>
											<dd> <?php echo($couch["capacidad"]) ?></dd>
											<br>
											<br>
											<form>
														 <input class="btn btn-lg col-md-offset-1" id="botoncitoatras" type="button" value="Volver atras" onclick="history.go(-1)">
										 </form>
										</d1>

								</div>

							</div>



							<?php include("./modal.php") ?>

							<?php   }
							?>

						<div>
						</body>

						</html>
