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
		function valTarjeta() {
			var x = document.forms["altaCouch"]["nroTarjeta"].value;

			if(/\D/.test(x)){
				alert("Por Favor ingrese solo numeros");
				return false;
			}
		}
		function cancelar() {
  	    var ask = window.confirm("Esta seguro que desea cancelar la carga?");
  	    if (ask) {
  	        document.location.href = "listado_de_mis_couch.php";

  	    }
  	}
		function onlyNumbers(event) {
    var Key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (Key == 13 || (Key >= 48 && Key <= 57)) return true;
    else return false;
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

	<?php
	require_once("./conectarBD.php");
	$query= "SELECT id_tipo,nombreTipo FROM tipo_couch WHERE visible = 1";
	$result=mysqli_query($conexion, $query);


	?>

	<div class="container col-sm-8 col-sm-offset-2">
		<main class="container col-sm-12 col-sm-offset-0">
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg'])?>
				</div>
				<?php } ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 style="font-size: 170%;">¡Agrega tu Couch!</h3>
					</div>
					<div class="controls col-md-offset-1">
						<br>
						<form class="form-horizontal" name="altaCouch" method="post" action="alta_couch.php" enctype="multipart/form-data">



							<div class="form-group row">
								<label for="titCouch" class="col-sm-2 form-control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" required name="nombre" class="form-control" id="titCouch" placeholder="Nombre del Couch">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 form-control-label">Descripcion</label>
								<div class="col-sm-10">
									<textarea name="descripcion" class="form-control" id="descCouch" maxlength="500" aria-describedby="helpBlock-nom" rows="5" cols="50" required> </textarea>
								</div>
							</div>


							<!-- ubicacion couch -->
							<div class="form-group row">
								<label for="ubCouch" class="col-sm-2 form-control-label">Lugar</label>
								<div class="col-sm-10">
									<input type="text" required name="lugar" class="form-control" id="ubCouch" placeholder="Lugar">
								</div>
							</div>




							<div class="form-group row">
								<label for="dirCouch" class="col-sm-2 form-control-label">Capacidad</label>
								<div class="col-sm-10">
  <input type="number" value="1" name="capacidad" id="capacidad"  onkeypress="return onlyNumbers(event);" class="form-control" min="1" >
									</div>
								</div>

								<!-- tipo couch -->
								<div class="form-group row">
									<label for="dirCouch" class="col-sm-2 form-control-label">Tipo de Couch</label>
									<div class="col-sm-10">
										<select class="form-control" id="tipCouch" name="tipo" required>
											<?php while ( $tipos = mysqli_fetch_array($result) ){ ?>

												<option value=<?php echo($tipos['id_tipo']); ?>> <?php echo($tipos['nombreTipo']); ?> </option>

												<?php } ?>
											</select>
										</div>
									</div>

									<!-- imagen couch -->


									<div class="form-group row">
										<label for="dirCouch" class="col-sm-2 form-control-label btn-file">Sube una foto<span style="...">*</span></label>
										<div class="col-sm-10">
											<!-- Negras, por ahora la validacion de la foto la hace html, yo despues me encargo con el
											SCRIPT que deje arriba incompleto que sea por js, no toquen eso q es n poco mas complicado -->
											<input class="btn  btn-file" type="file" name="imgCouch[]" id="imgCouchRequired" required>
											<input class="btn  btn-file" type="file" name="imgCouch[]" id="imgCouch">
											<input class="btn btn-file" type="file" name="imgCouch[]" id="imgCouch">
											<input class="btn btn-file" type="file" name="imgCouch[]" id="imgCouch">
										</div>

									</div>
									<h1>*Tene en cuenta que es obligatorio minimo 1 foto, y la primera de ellas sera la que se mostrara en el listado (solo Premium)</h1>
									<br><br>


									<!-- botones de envio -->
									<div class="form-group">
										<button type="submit" class="btn btn-default" onclick="return confirm('¿Aceptas agregar el couch con estos datos?')" name="submit">Agrega mi Couch!</button>
										<a class="btn btn-default" onclick="return cancelar()">Cancelar</a>
									</div>
								</form>
							</div>
						</div>

					</div>

				</body>

				</html>
				<?php
				//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
			} else {
				header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
			}?>
