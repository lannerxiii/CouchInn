<?php
require_once("./conectarBD.php");
session_start();
if( isset($_SESSION['idUsuario']) )

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("includes.php"); ?>
	<link rel="stylesheet" href="css/mystyle.css">
	<title>Mis reservas</title>
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
	.rechazada {
		background-color:#ff8888;
	}
	.aceptada {
		background-color: #96ff88;
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
			$usuarioactual = $_SESSION["id_usuario"];
			require_once("./conectarBD.php");
			$queryTabla="SELECT * FROM reserva WHERE reserva.id_duenoCouch='$usuarioactual'";
			$result=mysqli_query($conexion,$queryTabla);
			$queryInner="SELECT * FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) WHERE reserva.id_duenoCouch='$usuarioactual'";
			$result2=mysqli_query($conexion,$queryInner);
			if(mysqli_num_rows($result2) == 0){
				?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
					Todavia no te hicieron ninguna reserva
				</div>
				<?php
				die();
			}

			$queryInner="SELECT * FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) WHERE reserva.id_duenoCouch='$usuarioactual' ";
			$result2=mysqli_query($conexion,$queryInner);


			if(mysqli_num_rows($result2) == 0){
				?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
					No tenes reservas pendientes de administracion
				</div>
				<?php
				die();
			}
			?>


			<div class="table-responsive col-sm-12 col-sm-offset-0">
				<div class="panel-heading">
					<h1 align="center" style="font-size: 170%;">Reservas a mis Couchs</h1>
				</div>
				<div class="panel-body">

					<table class="table ">
						<thead style="font-weight: bold" class"center-block">
							<tr>

								<th>Foto</th>
								<th>Nombre</th>
								<th>Ver Detalle</th>
								<th>Entre Fechas</th>
								<th>Cantidad de personas</th>
								<th>Puntaje Usuario</th>
								<th>Aceptar </th>
								<th>Rechazar</th>
								<th>Ver Contacto</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rutaDefault="/img/sofacito.png";
							$queryInner="SELECT * FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) WHERE reserva.id_duenoCouch='$usuarioactual'";

							$idusuario=$_SESSION["id_usuario"];
							$queryTablaUsuarios="SELECT premiun FROM usuario WHERE usuario.id_usuario='$idusuario'";
							$resultadoUsuarios=mysqli_query($conexion, $queryTablaUsuarios);
							$filaUsuarios =mysqli_fetch_array($resultadoUsuarios);

							$prem=$filaUsuarios['premiun'];
							$result2=mysqli_query($conexion,$queryInner);
							$verde="";
							$deshabilitado="";
							while(($fila = mysqli_fetch_array($result)) && ($fila2= mysqli_fetch_array($result2))) {
								$verde="";
								$deshabilitado="";
								if ( $fila2['aceptada'] == 1){
									$verde="aceptada";
									$deshabilitado="disabled";
								}
								if ( $fila2['aceptada'] == 2){
									$verde="rechazada";
									$deshabilitado="disabled";
								}
								?>

								<tr class="<?php echo $verde?>">

									<?php
									$idusuario=$_SESSION["id_usuario"];
									$queryTablaUsuarios="SELECT * FROM usuario WHERE usuario.id_usuario='$idusuario'";
									$resultadoUsuarios=mysqli_query($conexion, $queryTablaUsuarios);
									$filaUsuarios =mysqli_fetch_array($resultadoUsuarios);
									$idpuntos=$fila2['id_usuario'];
									$promedioQuery= "SELECT ROUND(AVG(puntuacion),2) AS promedio FROM puntos_usuario WHERE id_usuario ='$idpuntos'";


									$promedioConsulta= mysqli_query($conexion, $promedioQuery);
									$puntuacion=mysqli_fetch_array($promedioConsulta);




										if ($prem == 0) {
											?>

											<td> <?php echo "<img src='./img/sofacito.png' height='150px' width='150px'></td>" ?> </td>
											<?php }else {
												$ruta=$fila2['foto_listado'];
												?>
												<td> <?php echo "<img class='img-circle' src='$ruta' height='150px' width='150px'></td>" ?> </td>
												<?php	} ?>
												<td> <?php echo $fila2['nombre']?></td>

												<td>
													<form action="detalle_couch.php" method="GET">
														<input type="hidden" name="secreto" value="<?php echo $fila['id_couch']?>"/>
														<input type="submit" class="btn btn-default"  value="Ver" name="enviar"/>
													</form>
												</td>

												<td> <?php echo $fila2['fecha_inicio']; echo "  -  "; echo $fila2['fecha_fin'];?></td>
												<td> <?php echo $fila2['capac']?></td>
												<td> <?php 									if ($puntuacion['promedio'] == NULL) {
													echo "Sin Puntaje";
												}else {
													echo $puntuacion['promedio'];
												}?></td>
												<td>
													<form  method="POST" action="aceptar_reserva.php" >
														<input type="hidden" name="finicio" value="<?php echo $fila2['fecha_inicio']?>"/>
														<input type="hidden" name="ffin" value="<?php echo $fila2['fecha_fin']?>"/>
														<input type="hidden" name="idCouch" value="<?php echo $fila['id_couch']?>"/>
														<input type="hidden" name="secretoAcept" value="<?php echo $fila2['id_reserva']?>"/>
														<input type="submit" class="btn btn-default" <?php echo $deshabilitado?> onclick="return confirm('Si aceptas esta reserva, seran rechazadas todas las que tomen total o parcialmente la misma fecha y esten pendientes. Si ya hay otra aceptada en la misma fecha, la actual sera rechazada. Estas seguro?')" value="Aceptar" name="enviar"/>
													</form>
												</td>
												<td>
													<form  method="POST" action="rechazar_reserva.php" >
														<input type="hidden" name="secretoRech" value="<?php echo $fila2['id_reserva']?>"/>
														<input type="submit" class="btn btn-default" <?php echo $deshabilitado?> onclick="return confirm(Seguro que vas a rechazar?)" value="Rechazar" name="enviar"/>
													</form>
												</td>
												<?php
												if ( $verde != ""){
													$cosa= '';
													?>
													<td>
															<form method="POST" action="./ver_contacto.php">
																<?php	if ( $fila2['aceptada'] == 2){ $cosa = 'disabled'; } ?>
															<input type="hidden" name="secreto" value="<?php echo $fila2['id_reserva']?>"/>
															<input type="submit" class="btn btn-default"   <?php	 echo $cosa ?> value="Ver Contacto" name="enviar"/>
														</form>
														<td>
															<?php	}else {
																?>
																<td>
																	<form method="POST" action="./ver_contacto.php">
																		<input type="hidden" name="secreto" value="<?php echo $fila2['id_reserva']?>"/>
																		<input type="submit" class="btn btn-default" disabled  value="Ver Contacto" name="enviar"/>
																	</form>
																	<td>
																		<?php
																	} ?>
																	<?php
																	?>
																</tr>

																<?php  } ?>
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
