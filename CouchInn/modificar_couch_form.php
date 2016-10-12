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
    <title>Modifica tu Couch</title>
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
    .botoncitoverde {
    color: #333;
    background-color: #96ac3c;
    border-color: #96ac3c;
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
  	    var ask = window.confirm("Esta seguro que desea cancelar?");
  	    if (ask) {
  	        document.location.href = "listado_de_mis_couch.php";

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

  <?php
  require_once("./conectarBD.php");
  $query= "SELECT id_tipo,nombreTipo FROM tipo_couch WHERE visible = 1";
  $result=mysqli_query($conexion, $query);
  $id_couch = $_POST['secreto']; 
  $query = "SELECT * FROM Couch WHERE id_couch = $id_couch ";
  $resultado=mysqli_query($conexion, $query);
  $datos = mysqli_fetch_array($resultado);
  //consulta para las fotos//
  $query2 = "SELECT * FROM foto WHERE id_couch = $id_couch ";
  $resultado2=mysqli_query($conexion, $query2);


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
            <h3 style="font-size: 170%;">Modifica los datos de tu Couch</h3>
          </div>
          <div class="controls col-md-offset-1">
            <br>
            <form class="form-horizontal" name="altaCouch" method="post" action="modificar_couch_consulta.php" enctype="multipart/form-data">



              <div class="form-group row">
                <label for="titCouch" class="col-sm-2 form-control-label">Titulo</label>
                <div class="col-sm-10">
                  <input type="text" required name="nombre" class="form-control" id="titCouch"  value="<?php echo($datos["nombre"]);?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 form-control-label">Descripcion</label>
                <div class="col-sm-10">
                  <textarea name="descripcion" class="form-control" id="descCouch" maxlength="500"  aria-describedby="helpBlock-nom" rows="5" cols="50" required><?php echo($datos["descripcion"]);?> </textarea>
                </div>
              </div>


              <!-- ubicacion couch -->
              <div class="form-group row">
                <label for="ubCouch" class="col-sm-2 form-control-label">Lugar</label>
                <div class="col-sm-10">
                  <input type="text" required name="lugar" class="form-control" id="ubCouch" value="<?php echo($datos["lugar"]);?>">
                </div>
              </div>




              <div class="form-group row">
                <label for="dirCouch" class="col-sm-2 form-control-label">Capacidad</label>
                <div class="col-sm-10">
                  <input type="number" name="capacidad" class="form-control" min="1" value="<?php echo($datos["capacidad"]);?>">
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
				
                    <input class="btn  btn-file" type="file" name="imgCouch[]" id="imgCouchRequired">
                    <input class="btn  btn-file" type="file" name="imgCouch[]" id="imgCouch">
                    <input class="btn btn-file" type="file" name="imgCouch[]" id="imgCouch">
                    <input class="btn btn-file" type="file" name="imgCouch[]" id="imgCouch">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="dirCouch" class="col-sm-2 form-control-label btn-file">Fotos Actuales<span style="..."></span></label>
                  <div class="col-sm-10">

                    <?php $i = 0; while ( $datosf = mysqli_fetch_array($resultado2) ){ ?>

                      <img class='img-circle' src='<?php echo($datosf['ruta']); ?>' height='125px' width='125px'>
                      <?php
                      if($i == 0){
                        ?>
                        <input type="hidden" disabled="disabled" name="checkboxArray[]" value="m" />
                        <input type="checkbox"  disabled="disabled" name="checkboxArray[]"  value="<?php echo($i); ?>"  />No permitido
                        <?php
                      }
                      if($i != 0){
                        ?>
                        <input type="hidden" name="checkboxArray[]" value="m" />
                        <input type="checkbox" name="checkboxArray[]" value="<?php echo($i); ?>" />Borrar
                        <?php
                      }
                      ?>
                      <?php $i++; } ?>
                    </div>
                  </div>


                  <h1>*Tene en cuenta que es obligatorio minimo 1 foto, y la primera de ellas sera la que se mostrara en el listado (solo Premium)</h1>
                  <br><br>


                  <!-- botones de envio -->
                  <div class="form-group">
                    <input type="hidden" name="secreto" value="<?php echo $datos['id_couch']?>"/>
                    <button type="submit" class="btn btn-default" onclick="return confirm('¿Está seguro de modificar con estos datos?')"  name="submit">Modifica mi Couch!</button>
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
