
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>
	<link rel="stylesheet" href="css/mystyle.css">
	<title>Listado de Couchs</title>
	<script>

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
		background-image: "background.jpg";
	}
	td {
		vertical-align: middle !important;
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
	.img-circle {
		border-radius: 50%;
	}
	.encabezado-panel{
		color: #333;
		background-color: #f5f5f5;
		border-color: #ddd;
	}
	#QueRompeGuindas{
		width: 95%;
		background:./img/background.jpg;
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
	<?php include("./modal.php") ?>

	<?php if (isset($_GET['msg'])) { ?>
		<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
			<?php echo($_GET['msg']); ?>
		</div>
		<?php } ?>
		<script src="js/validaciones.js"></script>
		<main class="container" id="QueRompeGuindas">
			<?php
			require_once("./conectarBD.php");
			$queryTabla="SELECT * FROM couch  WHERE disponibilidad= '1'";


			$result=mysqli_query($conexion,$queryTabla);

			?>


			<div class="table-responsive col-sm-12 col-sm-offset-0">
				<div class="panel-heading">
					<h1 align="center" style="font-size: 170%;">Listado de Couchs</h1>
				</div>
				<div class="panel-body">

					<table class="table table-striped">
						<thead style="font-weight: bold" class"center-block">
							<tr>
								<th>Foto</th>
								<th>Nombre</th>
								<th>Link</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rutaDefault="/img/sofacito.png";

							while($fila = mysqli_fetch_array($result) ) {
								?>

								<tr>
									<?php
									$idtipo=$fila['idUsuario'];
									$queryTablaUsuarios="SELECT premiun FROM usuario WHERE id_usuario='$idtipo'";
									$resultadoUsuarios=mysqli_query($conexion,$queryTablaUsuarios);
									$filaUsuarios =mysqli_fetch_array($resultadoUsuarios);

									$prem=$filaUsuarios['premiun'];
									if ($prem == 0) {
										?>
										<td> <?php echo "<img src='./img/sofacito.png' height='150px' width='150px'></td>" ?> </td>
										<?php }else {
											$ruta=$fila['foto_listado'];
											?>
											<td> <?php echo "<img class='img-circle' src='$ruta' height='150px' width='150px'></td>" ?> </td>
											<?php	} ?>
											<td> <?php echo $fila['nombre']?></td>

											<td>
												<form action="detalle_couch.php" method="GET">
													<input type="hidden" name="secreto" value="<?php echo $fila['id_couch']?>">
													<input type="submit" class="btn btn-default" value="Ver Couch" name="enviar">
												</form>
											</td>
										</tr>

										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

					</main>

				</body>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script src="js/main.js"></script> <!-- Gem jQuery -->

				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>

				<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				<script src="js/validaciones.js"></script>
				</html>
