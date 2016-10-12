<?php
session_start();
require_once("./conectarBD.php");
if( isset($_SESSION['admin']) ){
  ?>
  <!DOCTYPE html>
  <html lang="es" class="no-js">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("includes.php"); ?>
    <title>Mis Ganancias</title>

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

    function validate() {
      if (!/^[a-zA-Z]+( +[a-zA-Z]+)*$/g.test(document.nomTipo.nomTipo.value)) {
        alert("Ingrese solamente letras por favor");
        document.nomTipo.nomTipo.focus();
        return false;
      }
      return true;
    }

    $(document).ready(function() {
      $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2016:2080',

        onSelect: function (date) {
          var dob = new Date(date);
          var today = new Date();
        }

      });
      $("#datepicker").datepicker("option","dateformat","yy-mm-dd");
    });
    $(document).ready(function() {
      $( "#datepicker2" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2016:2080',

        onSelect: function (date) {
          var dob = new Date(date);
          var today = new Date();
        }

      });
      $("#datepicker2").datepicker("option","dateformat","yy-mm-dd");
    });

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

  <div class="container col-sm-8 col-sm-offset-2">
    <?php if (isset($_GET['msg'])) { ?>
      <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
        <?php echo($_GET['msg']); ?>
      </div>
      <?php } ?>
      <main class="container col-sm-12 col-sm-offset-0">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 align="center" style="font-size: 170%;">Mis Ganancias</h3>
          </div>
          <div>
            <body>
              <br>

            </body>

          </div>

          <div class="panel-body">
            Ingesa dos fechas para ver la lista de usuarios que se hicieron Premium entre ellas
            Tambien veras cuanto dinero haz ganado!
          </br></br>
          <div class="control-group">
            <div class="controls col-md-offset-1">
              <form class="form-horizontal" name="formu_tarjeta" method="POST" action="mostrar_ganancias.php">


                <div class="form-group row">
                  <label for="titCouch" class="col-sm-2 form-control-label">Fecha Inicio</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fechaDesde" id="datepicker" placeholder="Fecha desde" min="00/00/0000" aria-describedby="helpBlock-fNac" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="titCouch" class="col-sm-2 form-control-label">Fecha Fin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fechaHasta" id="datepicker2" placeholder="Fecha desde" min="00/00/0000" aria-describedby="helpBlock-fNac" required>

                  </div>
                </div>
                <br>
                <div class="controls form-horizontal col-md-offset-1">
                  <div class="form-group col-sm-offset-2 col-sm-4">
                    <input type="submit"  value= "Calcular" onclick="return confirm(¿Confirma la fecha?)" class="btn btn-default">
                    <!--<button type="submit" onclick=valTarjeta() class="btn btn-default">Hacerme Premium</button> -->
                    <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </main>

        <main class="container col-sm-12 col-sm-offset-0">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center" style="font-size: 170%;">Usuarios Premium y mis ganancias</h3>
          </div>
          <div class="panel-body ">
            <?php
            $query="SELECT * FROM usuario WHERE premiun=1 AND fecha_premium IS NOT NULL";
            $result=mysqli_query($conexion,$query);
            if(mysqli_num_rows($result) == 0){
              ?>
              <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info ?>">
             No hay ganancias
              </div>
                <?php
          die();
            }
            ?>
            <table class="table table-hover">
              <thead class="thead-inverse">
                <tr style="font-weight: bold">
                  <th>N°</th>
                  <th>Nombre Usuario</th>
                  <th>Mail Usuario</th>
                  <th>Fecha del Pago</th>
                  <th>Monto abonado</th>
                </tr>
              </thead>
              <?php
              $x=1;

              while($fila = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td> <?php echo $x; $x++; ?> </td>
                  <td> <?php echo($fila['apeynombre'])?></td>
                  <td> <?php echo($fila['email'])?></td>
                  <td> <?php echo($fila['fecha_premium'])?></td>
                  <td> $70 </td>

                </tr>

                <?php } ?>

              </table>
            </div>
              <div class="panel-heading">
                    <?php $total= $x * 70; $total= $total - 70; ?>
                <h3 style="font-size: 170%;">Mi ganancia total fue: $<?php echo($total)?> </h3>
              </div>
            </div>
          </main>

          </div>
        </div>
      </div>
  </div>
</body>



      <script src="./js/jquery.min.js"></script>
      <script src="js/main.js"></script> <!-- Gem jQuery -->
      <link rel="stylesheet" href="./js/jquery-ui.css">
      <script src="./js/jquery-1.10.2.js"></script>
      <script src="./js/jquery-ui.js"></script>
      <script src="js/validaciones.js"></script>

      <?php  } else {

        header("Location: ./index.php?msg=ACCESO DENEGADO&&class=alert-danger");
      }

      ?>
