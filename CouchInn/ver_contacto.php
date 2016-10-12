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
		<title>Ver Contacto</title>

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


			$idReserva=$_POST['secreto'];
			$query="SELECT * FROM reserva INNER JOIN usuario ON (reserva.id_usuario= usuario.id_usuario) WHERE reserva.id_reserva='$idReserva'";
			$resultado=mysqli_query($conexion, $query);
			$first= true;
			$usuario = mysqli_fetch_array($resultado);


				$query="SELECT * FROM reserva WHERE id_reserva='$idReserva'";

				$resultado2 = mysqli_query($conexion, $query);
				$reserva = mysqli_fetch_array($resultado2);
				$cant=mysqli_num_rows($resultado);

				?>




							<div class="panel panel-default">
								<div class="panel-heading">
								<p class="h3 col-md-offset-0"> Contacto: <?php echo($usuario["apeynombre"]) ?></p>
								</div>
								<div class="panel-body">


									<div class="col-md-offset-0 col-md-6 inf_couch">
										<d1 class="dl-horizontal" >
											<dt> E-mail: </dt>
											<dd> <?php echo($usuario["email"]) ?></dd>
											<br>
											<dt> Telefono: </dt>
											<dd> <?php echo($usuario["telefono"]) ?></dd>
											<br>
											<form>
														 <input class="btn btn-lg col-md-offset-1" id="botoncitoatras" type="button" value="Volver a mis reservas" onclick="window.location.href='./reservas_a_mis_couchs.php'">
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
