
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
	function myFunction() {
		var x = document.getElementById("imgCouchRequired").required;
	}

	$(document).ready(function() {
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '2016:2030',
minDate: 0,
			onSelect: function (date) {
				var dob = new Date(date);
				var today = new Date();
			}
		});
		$("#datepicker2").datepicker("option","dateformat","dd-mm-yy");
	});
  $(document).ready(function() {
    $( "#datepicker3" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '2016:2030',
minDate: 0,
      onSelect: function (date) {
        var dob = new Date(date);
        var today = new Date();
      }
    });
    $("#datepicker3").datepicker("option","dateformat","dd-mm-yy");
  });
	function cancelar() {
	    var ask = window.confirm("Esta seguro que desea cancelar?");
	    if (ask) {
	        document.location.href = "index.php";

	    }
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
  dt {
      float: left;
      width: 115px;
      /* overflow: hidden; */
      clear: left;
      /* text-align: right; */
      text-overflow: ellipsis;
      white-space: nowrap;
  }

  </style>
</head>
</head>
<?php include("random_background.php");$conexion = mysqli_connect( "localhost", "root", "", "prueba"); ?>
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
      $tamaño=count($_GET);


      if($tamaño==1){
        if(isset($_GET['titulo'])){
          $titulo=$_GET['titulo'];
          $tit="`nombre` LIKE '%$titulo%' OR `descripcion` LIKE '%$titulo%'";
          $con = "SELECT * FROM couch WHERE "."$tit";

        }
      } else{
        $con="SELECT * FROM Couch WHERE ";
        $con2="SELECT `id_couch` FROM `reserva` WHERE ";
        $sub="";
        if(isset($_GET['titulo'])){
          if(!empty($_GET['titulo'])){
            $titulo=$_GET['titulo'];
            $tit="`nombre` LIKE '%$titulo%' ";
            $sub =  $sub."AND $tit";
          }
        }

        if(isset($_GET['descripcion'])){
          if(!empty($_GET['descripcion'])){
            $descripcion=$_GET['descripcion'];
            $des="`descripcion` LIKE '%$descripcion%' ";
            $sub = $sub."AND $des";
          }
        }

        if(isset($_GET['lugar'])){
          if(!empty($_GET['lugar'])){
            $loc=$_GET['lugar'];
            $loca="`lugar` LIKE '%$loc%' ";
            $sub=$sub."AND $loca ";
          }
        }
        if(isset($_GET['capacidad'])){
          if(!empty($_GET['capacidad'])){
            $plaza=$_GET['capacidad'];
            $sub=$sub."AND `capacidad` >= '$plaza' ";
          }
        }
        if(isset($_GET['tipo'])){
          print ($_GET['tipo']);

          if(!empty($_GET['tipo'])){
            if ($_GET['tipo'] == 'selected'){
              $tipo="";
            }else{
            $tipo=$_GET['tipo'];
              $sub=$sub."AND `idTipo` = '$tipo' ";
          }

          }
        }
        if(isset($_GET['datepicker']) and isset($_GET['datepicker2'])){
          if(!empty($_GET['datepicker']) and !empty($_GET['datepicker2'])){
            $desde= date("Y-m-d", strtotime($_GET['datepicker']));

            $hasta=date("Y-m-d", strtotime($_GET['datepicker2']));

	$con2=$con2."('".$desde."' BETWEEN fecha_inicio AND fecha_fin) OR ('".$hasta."' BETWEEN fecha_inicio AND fecha_fin) OR (fecha_inicio BETWEEN '".$desde."' AND '".$hasta."') OR (fecha_fin BETWEEN '".$desde."' AND '".$hasta."') AND (aceptada = '1') ";
            $sub=$sub."AND `id_couch`  NOT IN (".$con2.")";
          }
          else{
            if(!empty($_GET['datepicker'])){
              $desde=$_GET['datepicker'];
              $con2=$con2."`fecha_inicio`>='$desde' AND `aceptada`='0' ";
              $sub=$sub."AND `id_couch`  IN (".$con2.")";
            }
            if(!empty($_GET['datepicker2'])){
              $hasta=$_GET['datepicker2'];
              $con2=$con2."`fecha_fin`<='$hasta' AND `aceptada`='0' ";
              $sub=$sub."AND `id_couch`  IN (".$con2.")";
            }
          }
        }
        $con=$con.substr($sub, 3, strlen($sub)-3);



      }

      $result=mysqli_query($conexion,$con);
      $x=0;
      if (is_bool($result) === true) {
        ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
        No ingresaste datos, se mostraran todos los couchs.
        </div>
          <?php
        $con="SELECT * FROM Couch";
        $result=mysqli_query($conexion,$con);
        $x=0;
      }
      if(mysqli_num_rows($result) == 0){
        ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
        No se encontro ninguna coincidencia, se mostraran todos los couchs.
        </div>
          <?php
        $con="SELECT * FROM Couch";
        $result=mysqli_query($conexion,$con);

      }
      ?>
<?php
  $tipo=$_GET['tipo'];
$cosa="SELECT * FROM tipo_couch WHERE `id_tipo` = '$tipo' ";
$resultipo=mysqli_query($conexion,$cosa);
$paratipo = mysqli_fetch_array($resultipo);

if ( ( $x == 0) && ( $tamaño != 1)){ ?>
  <main class="container col-sm-12 col-sm-offset-0">
    <?php if (isset($_GET['msg'])) { ?>
      <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
        <?php echo($_GET['msg'])?>
      </div>
      <?php } ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 align="center" style="font-size: 170%;">Tu busqueda...</h3>
        </div>
        <div class="panel-body">
          Podes seguir agregando filtros o eliminando los que deseas desde aca
          <?php
          require_once("./conectarBD.php");
          $queryy= "SELECT id_tipo,nombreTipo FROM tipo_couch WHERE visible = 1";
          $resultt=mysqli_query($conexion, $queryy);
          ?>
          <br><br><br>
          <div class="controls col-md-offset-1">
            <form class="form-horizontal" action="listado_filtrado.php" method="GET" onsubmit=" return validarBusquedaAvanzada(this)">

              <div class="form-group row">
                <label for="titCouch" class="col-sm-2 form-control-label">Titulo</label>
                <div class="col-sm-10">
                  <input type="text"  name="titulo" class="form-control" id="titCouch" value=<?php echo($_GET['titulo']); ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="titCouch" class="col-sm-2 form-control-label">Descripcion</label>
                <div class="col-sm-10">
                  <input type="text"  name="descripcion" class="form-control" id="titCouch" value=<?php echo($_GET['descripcion']); ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="ubCouch" class="col-sm-2 form-control-label">Ubicacion</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" id="ciudad" name="lugar" value=<?php echo($_GET['lugar']); ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="fecha" class="col-sm-2 form-control-label" >Fecha Inicio:</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" id="datepicker3" name="datepicker" value=<?php echo($_GET['datepicker']); ?> >
                </div>
              </div>

              <div class="form-group row">
                <label for="fecha" class="col-sm-2 form-control-label" >Fecha Fin:</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" id="datepicker2" name="datepicker2" value=<?php echo($_GET['datepicker2']); ?> >
                </div>
              </div>

              <div class="form-group row">
                <label for="apellido" class="col-sm-2 form-control-label" >Capacidad</label>
                <div class="col-sm-10">

                  <input class="form-control" type="number" min="1" id="plazas" name="capacidad" value=<?php echo($_GET['capacidad']); ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="dirCouch" class="col-sm-2 form-control-label">Tipo de Couch</label>
                <div class="col-sm-10">
                  <select class="form-control" id="tipCouch" name="tipo" >

                        <option value=<?php echo($paratipo['id_tipo']); ?> selected><?php echo($paratipo['nombreTipo']); ?></option>

                    <?php while ( $tipos = mysqli_fetch_array($resultt) ){ ?>
                      <option value=<?php echo($tipos['id_tipo']); ?>> <?php echo($tipos['nombreTipo']); ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit"  class="btn btn-default btn-lg" >Busca!</button>
                  <a class="btn btn-default btn-lg" onclick="return cancelar()" >Cancelar</a>

                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
<?php } ?>
      <div class="table-responsive col-sm-12 col-sm-offset-0">
        <div class="panel-heading">
          <h1 align="center"style="font-size: 170%;">Listado de Couchs</h1>
        </div>
        <div class="panel-body">

          <table class="table table-striped">
            <thead style="font-weight: bold" class"center-block">
              <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $rutaDefault="/img/sofacito.png";

              while($fila = mysqli_fetch_array($result) ) {
                ?>

                <tr>
                  <?php
                  $idtipo=$fila['idUsuario'];
                  $queryTablaUsuarios="SELECT premiun FROM usuario WHERE id_usuario='$idtipo'";
                  $resultadoUsuarios=mysqli_query($conexion,$queryTablaUsuarios);
                  $filaUsuarios =mysqli_fetch_array($resultadoUsuarios);

                  $prem=$filaUsuarios['premiun'];
                  if ($prem == 0) {
                    ?>
                    <td> <?php echo "<img src='./img/sofacito.png' height='150px' width='150px'></td>" ?> </td>
                    <?php }else {
                      $ruta=$fila['foto_listado'];
                      ?>
                      <td> <?php echo "<img class='img-circle' src='$ruta' height='150px' width='150px'></td>" ?> </td>
                      <?php	} ?>
                      <td> <?php echo $fila['nombre']?></td>

                      <td>
                        <form action="detalle_couch.php" method="GET">
                          <input type="hidden" name="secreto" value="<?php echo $fila['id_couch']?>">
                          <input type="submit" class="btn btn-default" value="Ver Couch" name="enviar">
                        </form>
                      </td>
                    </tr>

                    <?php } ?>
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
