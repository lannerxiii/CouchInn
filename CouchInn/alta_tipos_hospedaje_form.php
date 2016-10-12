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
	<title>Alta de tipo</title>

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
#histeria{
	padding-left:1.5%;
}
#botoncitobusqueda {
    color: #333;
    background-color: #96ac3c;
    border-color: #96ac3c;
}

  </style>
	<script>

 function YNconfirm() {
if (window.confirm('¿Realmente queres cancelar los cambios?'))
{
	window.location.href = 'modificacion_tipo_hospedaje.php';
}
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
      <div class="container" id="QueRompeGuindas">

					<div class="panel panel-default">
						<?php if (isset($_GET['msg'])) { ?>
								<div id="alert" role="alert" class="col-md-offset-0 col-md-12 alert <?php echo($_GET['class']) ?>">
										<?php echo($_GET['msg'])?>
								</div>
						<?php } ?>
						<div class="panel-heading">
							<h1  style="font-size: 170%;">Alta de Tipo</h1>
						</div>

						<div class="panel-body">
          <form class="form-horizontal" name="nomTipo" method="post" onsubmit="return valTipoHospedaje()" action="./alta_tipo_hospedaje.php">
              <div class="form-horizontal">
                 <label class="control-label  "  for="nomTipo">Escriba el nuevo tipo de Hospedaje:</label>
							 <br>
							 <br>
                  <input type="text" name="nomTipo" class="form-control" id="nomTipo" placeholder="Ej: departamento" aria-describedby="helpBlock-nom" required>
                  <span id="glyphicon-nom" aria-hidden="true"></span>
                  <span id="helpBlock-nom" class="help-block"></span>
              </div>
              <div class="form-group" id="histeria">
                  <button type="submit" class="btn btn-default">Agregar</button>
                  <button type="button" class="btn btn-default" onclick="return YNconfirm()">Cancelar</button>
              </div>
          </form>
      </div>
		</div>

    </body>

</html>
<?php } else {

	header("Location: index.php?msg=ACCESO DENEGADO&&class=alert-danger");
	exit();
}?>
