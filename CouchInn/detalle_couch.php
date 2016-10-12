<?php
session_start();
require_once("./conectarBD.php");
if( ! isset($_GET['secreto'])) {

	header("Location: index.php?msg=ACCESO DENEGADO &&class=alert-danger");
	exit();
}else {
	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php include("includes.php"); ?>
		<title>Ver Detalle</title>

		<style>
		.navbar {
			margin-bottom: 50px;
			border-radius: 0;
		}

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
		.dl-horizontal dd {
			margin-left: 130px;
			font-size: larger;
		}
		.dl-horizontal dt {
			float: left;
			width: 115px;
			clear: left;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		.sol {
			padding: 10%;
		}
		.des {
			padding: 5%;
		}
		.botoncitoverde {
			color: #333;
			background-color: #96ac3c;
			border-color: #96ac3c;
		}
		.carousel-indicators li{display:none;}
		.carousel {
  max-height: 600px;
	max-width: : 500px;
  overflow: hidden;

  .item img {
    width: 100%;
    height: auto;
  }
}
textarea {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
.wii {
    display: flex;
}
.panel-body {
    background-color: #fff;
    padding: 5px;
		border-radius: 5px;
}
<?php include("./css/commentstyle.css"); ?>
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
		function showDiv() {
		   document.getElementById('welcomeDiv').style.display = "block";
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
	<?php if (isset($_GET['msg'])) { ?>
		<div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info">
			<?php echo($_GET['msg'])?>
		</div>
		<?php } ?>
	<div class="container col-sm-10 col-sm-offset-1">
		<main class="container col-sm-12 col-sm-offset-0">

				<div class="panel-body" >
					<?php
					$idCouch=$_GET['secreto'];
					$query="SELECT * FROM couch INNER JOIN tipo_couch ON (couch.idTipo = tipo_couch.id_tipo) WHERE couch.id_couch='$idCouch'";
					$resultado=mysqli_query($conexion, $query);
					$first= true;


					while ( $couch = mysqli_fetch_array($resultado)) {
						//busca las fotos del couch para agregarlas al carousel
						$query_foto="SELECT ruta FROM foto WHERE id_couch='$idCouch'";

						$resultado_foto=mysqli_query($conexion, $query_foto);

						$cant_fotos=mysqli_num_rows($resultado_foto);

						?>

						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">

								<?php for($i = 0; $i < $cant_fotos; $i++){ ?>

									<li data-target="#myCarousel" data-slide-to=<?php echo($i); if($i == 0){ echo(" class=active");} ?>></li>

									<?php } ?>

								</ol>

								<!-- Wrapper for slides class="img-responsive center-block"-->
								<div class="carousel-inner" role="listbox">

									<?php while ( $foto = mysqli_fetch_array($resultado_foto)) {
										if( $first){ $first=false;?>
											<div class="item active">
												<img style="height:500px;width:1050px" src=<?php echo($foto["ruta"]);?> >
											</div>
											<?php } else {
												$ruta= $foto["ruta"];
												if (file_exists($ruta)){
													?>
													<div class="item">

														<img style="height:500px;width:1050px" src=<?php echo($foto["ruta"]);?> >
													</div>
													<?php }
												} } ?>

											</div>
											<!-- Controls -->
											<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
												<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
											<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
												<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
										</div>


										<div class="panel panel-default">
											<div class="panel-heading">
												<p class="h3 col-md-offset-2"> <?php echo($couch["nombre"]) ?></p>
											</div>
											<div class="panel-body">


												<div class="col-md-offset-0 col-md-8 des">
													<d1 class="dl-horizontal" >
														<dt> Descripcion: </dt>
														<dd> <?php echo($couch["descripcion"]); $r1=$couch["descripcion"];?></dd>
														<br>
														<dt> Tipo de Couch:</dt>
														<dd> <?php echo($couch["nombreTipo"]) ?></dd>
														<br>
														<dt> Ubicacion: </dt>
														<dd> <?php echo($couch["lugar"]) ?></dd>
														<br>
														<dt> Capacidad: </dt>
														<dd> <?php echo($couch["capacidad"]); $r2=$couch["capacidad"]; ?></dd>
														<br>
														<?php
																	$promedioQuery= "SELECT AVG(puntaje) AS promedio FROM puntoscouch WHERE id_couch ='$idCouch'";
																	$promedioConsulta= mysqli_query($conexion, $promedioQuery);
																	while ($promedio = mysqli_fetch_array($promedioConsulta)) {
																		 //controla que haya puntajes
																			if($promedio['promedio'] == NULL){ ?>

																		 <dt>Puntaje: </dt>
																		 <dd> Todavia no ha sido puntuado </dd>

															 <?php       } else {
															?>
																		<dt> Puntaje: </dt>
																		<dd style="display: flex;"> <?php echo(substr($promedio['promedio'], 0, 4)); ?>
																			<form class="form-horizontal"  method="GET" action="listadoPuntajes.php" >
																					<input type="hidden" name="idCouch" value="<?php echo $idCouch ?>"/>
																			<input class="botoncitoverde btn btn-xs col-md-offset-1" id="botoncitoatras" type="submit" value="Ver detalles">
</form>
																		</dd>
																 <?php }}
															?>
													</d1>

												</div>

												<div class="col-md-offset-0 col-md-4 sol">

													<?php
													$query="SELECT * FROM couch INNER JOIN tipo_couch ON (couch.idTipo = tipo_couch.id_tipo) WHERE couch.id_couch='$idCouch'";
													$resultado=mysqli_query($conexion, $query);
													$couch = mysqli_fetch_array($resultado);


													if( (isset($_SESSION['sesion_usuario'])) && ($couch["idUsuario"] != $_SESSION["id_usuario"]) && (!isset($_SESSION['admin'])) ){
														?>
														<form action="solicitar_reserva.php" method="POST">
															<input type="submit" class="botoncitoverde btn btn-lg" value="Solicitar reserva" name="enviar"/>
															<input type="hidden" name="secreto" value="<?php echo $idCouch ?>"/>
														</form>
														<?php } ?>
													</div>
												</div>
												<?php
													if( (isset($_SESSION['sesion_usuario'])) && ($couch["idUsuario"] != $_SESSION["id_usuario"])  && (!isset($_SESSION['admin'])) ){

												?>
												Deja un comentario:
												<form action="./agregarComentario.php" method="post">
													<div>
														<textarea name="comentario"  required id="comments" class=" col-sm-12 col-sm-offset-0" style="font-family:sans-serif;font-size:1.2em;"></textarea>
													</div>
													<input type="hidden" name="secreto1" value="<?php echo $idCouch ?>"/>
													<input type="hidden" name="secreto2" value="<?php echo $_SESSION["id_usuario"] ?>"/>
													<input type="submit" class="botoncitoverde btn col-sm-12 col-sm-offset-0" onclick="return confirm('Enviar este comentario?')" value="Agregar Pregunta" name="Enviar Comentario"/>
												</form>
												<br>
												<br>

												<br>
												<br>
												<?php } ?>

<hr></hr>

												<?php include("./modal.php") ?>

												<?php
												$query="SELECT * FROM preguntasrespuestas WHERE idCouch='$idCouch' ";
												$resultadoP=mysqli_query($conexion, $query);






												while ( $preguntas = mysqli_fetch_array($resultadoP)) {
													?>
												<div id="w">
													<?php
													 $id_userP = $preguntas["idUsuario"];
													$query="SELECT * FROM usuario WHERE id_usuario='$id_userP' ";
													$resultadoU=mysqli_query($conexion, $query);
													$nombres = mysqli_fetch_array($resultadoU);
?>
											    <div id="container">
											      <ul id="comments">
															<li class="cmmnt">
															  <div class="avatar"><img src="img/dummy.png" width="55" height="55" ></div>
															  <div style="display: inline" class="cmmnt-content">
															      <header ><?php echo $nombres["apeynombre"]; ?></header>
															    <p style="display: inline" ><?php echo $preguntas["pregunta"]; ?></p>
																	<br><br>




																	</div>
																	<?php if ($preguntas["respuesta"] != "") { ?>
																	<ul class="replies">
																		<li class="cmmnt">
																		<div class="avatar"><img src="img/dummy.png" width="55" height="55" ></div>
																			<div class="cmmnt-content">
																			<header>Dueño del Couch</header>
																				<p><?php echo $preguntas["respuesta"]; ?></p>

																			</div>
																		</li>
																	</ul>
																	<?php } else {
																				if (  (isset($_SESSION['sesion_usuario'])) &&  ($couch["idUsuario"] == $_SESSION["id_usuario"])) {	?>
																					 <button type="button" class=" botoncitoverde btn btn-xs" data-toggle="collapse" data-target="#welcomeDiv<?php echo $preguntas["idPreg"] ?>">Responder</button>
																		<div id="welcomeDiv<?php echo $preguntas["idPreg"] ?>"   class="answer_list collapse" >
																			<form action="./agregarRespuesta.php"   method="post">
																				<div>
																					<textarea   required name="respuesta"  class=" col-sm-12 col-sm-offset-0" row="1" style="font-family:sans-serif;font-size:1.2em;" required>Responde</textarea>
																				</div>
																				<input type="hidden" name="secretoP" value="<?php echo $preguntas["idPreg"] ?>"/>
																				<input type="hidden" name="secreto1" value="<?php echo $idCouch ?>"/>
																				<input type="submit" class="botoncitoverde btn btn-xs" value="Enviar respuesta" name="Enviar Comentario"/>
																			</form>
																		</div>


<?php

																}	} ?>

																</li>
																<hr></hr>


																</ul>
																</div>


											    </div>

													<?php } ?>

												<?php   } }
												?>
											</body>



								</div>
								</html>
