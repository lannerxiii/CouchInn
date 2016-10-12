<?php
session_start();
require_once("./conectarBD.php");

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
		.panel-primary>.panel-heading {
		    color: #fff;
		    background-color: #96ac3c;
		    border-color: #96ac3c;
		}
		.panel-primary {
    border-color: #96ac3c;
		font-size: large;
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

		<?php
          include_once("conectarBD.php");
         $queryPuntajes="SELECT apeynombre,comentario,puntaje FROM puntoscouch INNER JOIN usuario ON (puntoscouch.id_usuario = usuario.id_usuario) WHERE puntoscouch.id_couch='".$_GET['idCouch']."'";
         $consultaPuntajes= mysqli_query($conexion, $queryPuntajes);
		
         while ($puntajes = mysqli_fetch_array($consultaPuntajes)){
     ?>


     <div class="panel panel-primary ">
         <div class="panel-heading">
             <p> El usuario <?php echo($puntajes['apeynombre']);?> ha dado una calificacion de: </p>
         </div>
         <div class="panel-body">
             <p> Puntaje otorgado: <?php echo($puntajes['puntaje']); ?> Puntos</p>
<br>
             <p> Comentario:

                 <?php
                 if(!isset($puntajes['comentario'])) {
                     echo("El usuario no ha realizado ningún comentario");
                 } else {
                    echo($puntajes['comentario']);
                 }
                 ?>
             </p>

         </div>
     </div>

     <?php } ?>
						</div>
							<?php include("./modal.php") ?>
						</body>

						</html>
