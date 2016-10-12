
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
  function is1to5(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if( charCode > 48 && charCode < 54)
    return true;
    return false;
  }

  function changeValue( valueId, changeId) {
    document.getElementById(changeId).value = document.getElementById(valueId).value
  }
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
  .panel-primary>.panel-heading {
    color: #fff;
    background-color: #96ac3c;
    border-color: #96ac3c;
  }
  .panel-primary {
    border-color: #96ac3c;
  }
  .form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
  }
  .botoncitoverde {
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
  <?php include("./modal.php"); ?>
  <?php require_once("./conectarBD.php");?>

    <script src="js/validaciones.js"></script>


    <main class="container" id="QueRompeGuindas">
      <div class="panel panel-default">

        <div class="panel-heading">
          <p  align="center" class="h3 col-md-offset-0">Huespedes por puntuar</p>
        </div>
        <div class="container">
          <?php
          $fecha_actual= date("Y-m-d");
          $id_usuario_actual= $_SESSION['id_usuario'] ;
          $queryRervasFin = "SELECT nombre,apeynombre,reserva.id_couch, id_reserva, reserva.id_usuario, DATE_FORMAT(fecha_inicio, '%d-%m-%y') AS fecha_inicio, DATE_FORMAT(fecha_fin,'%d-%m-%y') AS fecha_fin FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) INNER JOIN usuario ON (reserva.id_usuario = usuario.id_usuario ) WHERE aceptada='1' AND (reserva.fecha_fin <= '$fecha_actual')  AND id_puntajeUsuario IS NULL AND reserva.id_couch IN (SELECT id_couch FROM couch WHERE couch.idUsuario='$id_usuario_actual')";

          $consultaReservasFin = mysqli_query($conexion, $queryRervasFin);
            if  (isset($_GET['msg'])) { ?>
              <br><br>
          <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
              <?php echo($_GET['msg']); ?>
          </div>
                <?php }
          if (mysqli_num_rows($consultaReservasFin) == 0) { ?>
            <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info">
              No posee huespedes para puntuar
            </div>
            <?php }
            while ($reservasFin = mysqli_fetch_array($consultaReservasFin)) {
              if (!isset($reservasFin['id_puntajeUsuario'])) {
                ?>
                <br>
                <div class="panel panel-primary puntajeCouch">

                  <div class="panel-heading">
                    <p>Puntúe la estadía de su huesped: <?php echo $reservasFin['apeynombre']; ?> para el couch: <?php echo $reservasFin['nombre']; ?> del
                      dia: <?php echo($reservasFin['fecha_inicio']); ?> hasta el
                      dia: <?php echo($reservasFin['fecha_fin']); ?> </p>
                    </div>
                    <div class="panel-body">
                      <form method="get" action="./alta_puntajeUsuario.php" class="form-horizontal">
                        <div class="form-group">
                          <label for="puntReser" class="control-label">Puntua tu estadía: </label>
                          <input type="range" min="1" max="5" name="puntReser" id="puntReser"
                          onchange="changeValue('puntReser' , 'puntReserShow')">
                          <input type="text" id="puntReserShow" value="3" size="1" maxlength="1" min="1" max="5"
                          onkeypress="return is1to5(event)"
                          onchange="changeValue('puntReserShow', 'puntReser')" required>
                        </div>
                        Si lo deseas, deja un comentario
                        							<div>
                        								<textarea name="puntUser" id="comments" class=" col-sm-12 col-sm-offset-0" style="font-family:sans-serif;font-size:1.2em;"></textarea>
                        							</div>
                        <div class="form-group">

                          <input type="hidden" name="id_couch" value=<?php echo($reservasFin['id_couch']); ?>>
                          <input type="hidden" name="id_reserva" value=<?php echo($reservasFin['id_reserva']); ?>>
                          <input type="hidden" name="id_usuario" value=<?php echo($reservasFin['id_usuario']); ?>>
                          <input type="submit" class="botoncitoverde btn col-sm-12 col-sm-offset-0" onclick="return confirm('Seguro?')" value="Enviar mi puntuacion" name="Enviar Comentario"/>
                        </div>

                      </form>
                    </div>
                  </div>

                  <?php }
                } ?>

              </div>

            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <p align="center"class="h3 col-md-offset-0">Huespedes puntuados</p>
              </div>
              <?php include ("listadoHuesped.php");
              ?>
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
