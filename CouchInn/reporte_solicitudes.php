<?php
session_start();
require_once("./conectarBD.php");
if( isset($_SESSION['admin']) ){
  $fecha =$_POST['fechaDesde'];
  $fechaDesde= date("Y-m-d", strtotime($fecha));
  $fecha2 =$_POST['fechaHasta'];
  $fechaHasta= date("Y-m-d", strtotime($fecha2));
  if($fechaDesde > $fechaHasta) {
   header("location: ./solicitudes.php?msg=Revisa tu fecha! La primera fecha debe ser menor a la segunda. &&class=alert-warning");
   die();
  }
	?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>
		<title>Solicitudes aceptadas</title>

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
			<?php if (isset($_GET['msg'])) { ?>
				<div id="alert" role="alert" class="center-block col-md-offset-1 col-md-12 alert alert-success <?php echo($_GET['class']) ?>">
					<?php echo($_GET['msg'])?>
				</div>
				<?php } ?>
        <div class="panel-heading">
          <h3 style="font-size: 170%;">Entre las fechas...</h3>
        </div>
        <div class="panel-body ">
          </br>
            <div class="control-group">
              <div class="controls col-md-offset-1">
              <form class="form-horizontal" name="formu_tarjeta" method="post" action="mostrar_ganancias.php">
                              <div class="form-group row">
                                <label for="titCouch" class="col-sm-2 form-control-label">Fecha Inicio</label>
                                <div class="col-sm-10">
                              <?php echo $fechaDesde; ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="titCouch" class="col-sm-2 form-control-label">Fecha Fin</label>
                                <div class="col-sm-10">
                                <?php echo $fechaHasta; ?>
                                </div>
                              </div>

                            <br>
                              <div class="controls form-horizontal col-md-offset-1">
                                <div class="form-group col-sm-offset-2 col-sm-4">
                                <button type="button" class="btn btn-default" onclick="location.href='./solicitudes.php' ">Volver a la Busqueda</button>
                                </div>
                              </div>
                            </form>
                              </div>

            </div>
            <div>


            </div>

          </main>

          </div>

          <br>
          <br>
				<div class="panel-heading">
					<h3 style="font-size: 170%;">Solicitudes aceptadas </h3>
				</div>
				<div class="panel-body ">
          <?php
          $query=" SELECT * FROM reserva, usuario INNER JOIN couch WHERE (reserva.id_couch= couch.id_couch) AND (reserva.id_usuario= usuario.id_usuario) AND (fecha_aceptada BETWEEN '$fechaDesde' AND '$fechaHasta') AND aceptada= '1'";

          $result=mysqli_query($conexion,$query);
          if(mysqli_num_rows($result) == 0){
            ?>
            <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
           No se aceptaron solicitudes entre estas fechas.
            </div>
              <?php
        die();
          }
          ?>
					<table class="table table-hover">
						<thead class="thead-inverse">
							<tr style="font-weight: bold">
								<th>N°</th>
								<th>Nombre del Couch</th>
                <th>Desde:</th>
                <th>Hasta:</th>
                <th>Huesped:</th>
                <th>Fecha aceptada:</th>

							</tr>
						</thead>
						<?php
						$x=0;

						while($fila = mysqli_fetch_array($result)) {
							?>
							<tr>
                <td> <?php echo $x; $x++; ?> </td>
                <td> <?php echo($fila['nombre'])?></td>
                <td> <?php echo($fila['fecha_inicio'])?></td>
                <td> <?php echo($fila['fecha_fin'])?></td>
                <td> <?php echo($fila['apeynombre'])?></td>
                <td> <?php echo($fila['fecha_aceptada'])?></td>

              </tr>

							<?php } ?>

						</table>
					</div>
          <div class="panel-heading">
            		<?php $cant= $x; ?>
            <h3 style="font-size: 170%;">La cantidad total de solicitudes aceptadas fue:<?php echo($cant)?> </h3>
          </div>
				</div>

		</body>

		</html>
		<?php
	} else {
		header("Location: index.php?msg=Debe estar logueado para ver esta pagina&&class=alert-danger");
	} ?>
