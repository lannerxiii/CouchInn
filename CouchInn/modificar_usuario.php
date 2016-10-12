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
		<script>
		$(document).ready(function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '1900:1998',

				onSelect: function (date) {
					var dob = new Date(date);
					if (dob.getFullYear() + 18 > today.getFullYear())
					{
						alert(" Debes ser mayor de 18 para poder registrarte! ");
						$('#datepicker').datepicker('setDate', null);

					}
				}

			});
			$("#datepicker").datepicker("option","dateformat","dd-mm-yy");
		});
		function validarWEA() {
				var x = document.forms["modUser"]["telUsuario"].value;

					if(/\D/.test(x)){
						alert("Solo puedes ingresar numeros en el campo Telefono");
						return false;
				}
				var z = document.forms["modUser"]["nombreUsuario"].value;
				if (/[^a-zA-Z\s]/.test(z)) {
						alert("Solo letras en el nombre");
						return false;
				}
				var z = document.forms["modUser"]["nacionalidad"].value;
				if (/[^a-zA-Z\s]/.test(z)) {
						alert("Solo letras en la nacionalidad");
						return false;
				}
		}
		function cancelar() {
				var ask = window.confirm("Esta seguro que desea cancelar?");
				if (ask) {
						document.location.href = "index.php";

				}
		}

		</script>
		<title>¡Bienvenidos a CouchInn!</title>

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
		</style>

	</head>
	<body>
		<header >
			<div class="jumbotron">
				<div class="container text-center">
					<img src="https://i.imgsafe.org/f0d2b89.png" class="fitImage">
				</div>
			</div>
		</header>

		<?php include("navbar2.php"); ?>

		<?php include("random_background.php"); ?>
		<body background="<?php echo $bg[array_rand($bg)]; ?>">

			<div class="container col-sm-8 col-sm-offset-2">
				<?php if (isset($_GET['msg'])) { ?>
					<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
						<?php echo($_GET['msg'])?>
					</div>
					<?php } ?>
					<main class="container col-sm-12 col-sm-offset-0">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 align="center"style="font-size: 170%;">Modifica tus datos</h3>
							</div>
							<div class="controls col-md-offset-1">

								<?php
								//cargo los datos para mostrar en el placeholder
										$id_user = $_SESSION['id_usuario'];
										$query = "SELECT * FROM usuario WHERE id_usuario = $id_user ";
										$resultado=mysqli_query($conexion, $query);
										$datos = mysqli_fetch_array($resultado);
								?>

								<form class="form-horizontal" name="modUser" onsubmit="return validarWEA(this)" method="post" action="./modificar_usuario_consulta.php" enctype="multipart/form-data">


									<div class="form-group">
										<label class="control-label" for="idUser"></label>
										<input type="hidden" name="idUser" class="form-control" id="idUser" value=<?php echo($_SESSION['id_usuario'])?>>
									</div>
									<div class="form-group">
										<label class="control-label" for="idUser"></label>
										<input type="hidden" name="claveOculta" class="form-control" id="idUser" value=<?php echo($datos["clave"]);?>>
									</div>

									<div class="form-group row">
										<label for="titCouch" class="col-sm-2 form-control-label">Nombre y Apellido</label>
										<div class="col-sm-10">
											<input type="text" name="nombreUsuario" required class="form-control" id="nomUser" value="<?php echo($datos["apeynombre"]);?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="inputPassword3" class="col-sm-2 form-control-label">Email</label>
										<div class="col-sm-10">
											<input type="email" name="email" class="form-control" id="emailUser" value="<?php echo($datos["email"]);?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="ubCouch" class="col-sm-2 form-control-label">Telefono</label>
										<div class="col-sm-10">
											<input type="text" name="telUsuario" class="form-control" id="telUser" value="<?php echo($datos["telefono"]);?>">
										</div>
									</div>

									<div class="form-group row">
										<label for="inputPassword3" class="col-sm-2 form-control-label">Contraseña Antigua*</label>
										<div class="col-sm-10">
											<input type="password" name="passUsuario" class="form-control" id="pass" value="">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputPassword3" class="col-sm-2 form-control-label">Nueva Contraseña*</label>
										<div class="col-sm-10">
											<input type="password" name="passNueva" class="form-control" id="titCouch" placeholder="">
										</div>
									</div>

									<div class="form-group row">
										<label for="dirCouch" class="col-sm-2 form-control-label">Nacionalidad</label>
										<div class="col-sm-10">
											<input type="text" name="nacionalidad" class="form-control" id="dirCouch" value="<?php echo($datos["nacionalidad"]);?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 form-control-label" for="signup-email">Fecha de Nacimiento</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="datepicker"  readonly name="fecha"  value="<?php echo($datos["fecha_de_nacimiento"]);?>" max="00/00/1998" min="00/00/0000" aria-describedby="helpBlock-fNac" >
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 form-control-label" for="signup-email">Sexo</label>
										<div class="col-sm-10">
											<?php
												if ($datos["sexo"] = "H"){

											print('<input type="radio" name="sex" required value="H" checked="checked" /> Hombre  ');
											print('<input type="radio" name="sex" value="M" /> Mujer');
										}else {
											print('<input type="radio" name="sex" required value="H" /> Hombre ');
										  print('<input type="radio" name="sex" value="M" checked="checked"/> Mujer');
										}
										?>
										</div>
										<br><br>
										*Si no quieres modificar tu contraseña, simplemente deja estos campos en blanco!
									</div>

									<!-- botones de envio -->
									<div class="form-group">
										<button type="submit" class="btn btn-default btn-lg" onclick="return confirm('¿Está seguro de modificar con estos datos?')" name="submit">Aceptar</button>
										<a class="btn btn-default btn-lg" onclick="return cancelar()">Cancelar</a>
									</div>
								</form>
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

				<?php  } ?>
