<?php
session_start();
if( isset($_SESSION['admin']) ){

	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>
		<title>Lista de hospedajes</title>

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
		.form-control{
			width:25%;
			display: inline;
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
		.panel-body{
			background-color: #fff;

		}
		.panel-heading{
			background-color: #d9d9d9;
		}
		#botoncitobusqueda {
		    color: #333;
		    background-color: #96ac3c;
		    border-color: #96ac3c;
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
	<div class="container">


		<?php
		require_once("./conectarBD.php");
		$queryTabla="SELECT nombreTipo, visible, id_tipo FROM tipo_couch ORDER BY id_tipo";
		$result=mysqli_query($conexion,$queryTabla);

		?>
		<main class="container">
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="center-block col-md-offset-1 col-md-12 alert alert-success <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg'])?>
				</div>
				<?php } ?>
				<div class="panel-heading">
					<h3 align="center" style="font-size: 170%;">Listado de Tipos</h3>
				</div>
				<div class="panel-body ">
					<table align="center" class="table table-hover">
						<thead class="thead-inverse">
							<tr align="center"style="font-weight: bold">
								<th >ID</th>
								<th>Nombre</th>
								<th>Visibilidad</th>
								<th>Modificacion</th>
								<th>Eliminacion</th>
							</tr>
						</thead>
						<?php
						$x=1;
						while($fila = mysqli_fetch_array($result)) {
							?>
							<tr>
								<td> <?php echo $x ?> </td>
								<td> <?php echo($fila['nombreTipo'])?></td>

								<?php
								$x++;
								$checked = 'No Visible';
								$value=1;
								if ($fila['visible'] == $value) $checked = 'Visible';
								?>
								<td> <?php  echo $checked  ?></td>

								<td>
									<form action="modificar_tipo_consulta.php" method="POST">

										<input type="hidden" name="secreto" value="<?php echo $fila['id_tipo']?>">
										<input type="submit" class="btn btn-default" value="Modificar" name="enviar">
									</form>
								</td>
								<td>
									<form action="eliminar_tipo_consulta.php" onsubmit="return confirmacion()" method="POST">

										<input type="hidden" name="secreto" value="<?php echo $fila['id_tipo']?>">
										<input type="submit" class="btn btn-default" value="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar este tipo de couch?')" name="enviar">

									</form>

								</td>
							</tr>

							<?php } ?>

						</table>
					</div>
				</div>
			</main>
		</body>

		</html>
		<?php
	} else {
		header("Location: index.php?msg=Debe estar logueado para ver esta pagina&&class=alert-danger");
	} ?>
