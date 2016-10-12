<?php

if( !isset($_SESSION['sesion_usuario']) ){
	session_start();
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<link rel="stylesheet" href="css/manu.css">
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
      <div class="container">
          <?php if (isset($_GET['msg'])) { ?>
              <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
                  <?php echo($_GET['msg'])?>
              </div>
          <?php } ?>
          <form class="form-horizontal" name="nomTipo" method="post" onsubmit="return valTipoHospedaje()" action="./alta_tipo_hospedaje.php">
              <div class="form-group">
                 <label class="control-label" for="nomTipo">Nuevo tipo de hospedaje</label>
                  <input type="text" name="nomTipo" class="form-control" id="nomTipo" placeholder="Nombre" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Agregar</button>
                  <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
              </div>
          </form>
      </div>

    </body>

</html>
	<?php } ?>
