<?php
session_start();
if( isset($_SESSION['sesion_usuario']) ){

	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>
		<link rel="stylesheet" href="css/mystyle.css">
		<title>Conviertete en Premiun</title>
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
							<h3 style="font-size: 170%;">¡Conviertete en Premium!</h3>
						</div>
 						<div>
							<body>
								<br>


							</body>

 						</div>

						<div class="panel-body">
							¡Disfruta de los beneficios de ser Premium!. Al publicar un couch, cuando alguien busque en la pagina, se podrá visualizara una
						  foto previa sin necesidad de entrar a los detalles.
						</br></br>
							<div class="control-group">
									<?php include_once("formularioDeTarjeta.html") ?>
							</div>
							<div>


							</div>

						</main>
					</div>
				</body>

				</html>
				<?php
				//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
			} else {
				header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
			}?>
