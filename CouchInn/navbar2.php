<?php
//echo ($_SESSION['admin']);
if (session_status() == PHP_SESSION_NONE){
  session_start();
}
if( isset($_SESSION['sesion_usuario']) ){
  if( isset($_SESSION['nom'])){
$miNombre =$_SESSION['nom'];
}else{
  $miNombre ="Admin";
}

  if( isset($_SESSION['admin'])) {

    ?>

    <nav class="navbar navbar-inverse navbar-fixed" id="my">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li ><a href = "index.php" ><span class="glyphicon glyphicon-home"></span> Home</a ></li >


              <li class="dropdown" >
                <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Administracion <span class="caret" ></span ></a >
                  <ul class="dropdown-menu" >
                    <li ><a href = "alta_tipos_hospedaje_form.php" > Agregar tipos de hospedajes</a ></li >
                      <li ><a href = "modificacion_tipo_hospedaje.php" > Listar y Modificar tipos de hospedajes</a ></li >
                        <li ><a href = "mis_ganancias.php" > Mis Ganancias</a ></li >

                            <li ><a href = "solicitudes.php" > Solicitudes aceptadas</a ></li >
                      </ul >
                    </li >
                    <li class="dropdown" >
                      <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Couchs <span class="caret" ></span ></a >
                        <ul class="dropdown-menu" >
                          <li ><a href = "./ver_listado_couch.php" > Listado de Couchs </a ></li >
                          </ul >
                        </li >

                        <li class="dropdown" >

                              <?php include("barra_busqueda.php"); ?>
                            </ul>
                            <ul class="main-nav navbar-nav navbar-right">
                                <li><a  href="index.php"><span class="glyphicon glyphicon-star"></span> Bienvenido <?php echo($miNombre) ?>! </a></li>
                              <li><a  href="./cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                            </ul>
                          </div>
                        </div>
                      </nav>

                      <?php
                      //si no es admin muestra la pagina de usuario comun
                    } else {
                      ?>

                      <nav class="navbar navbar-inverse navbar-fixed" id="my">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>

                          </div>
                          <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                              <li class=""><a href="./index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                              <?php
                              $x = 1;
                              //Si no es premium, mostrar boton para hacerse premium, estaria agregar un mensaje de que ya es premium en el caso de que lo sea con un else
                              include_once("conectarBD.php");
                              $query= "SELECT premiun FROM usuario WHERE id_usuario='".$_SESSION['id_usuario']."' AND premiun='".$x."' ";
                              $resultado= mysqli_query($conexion, $query);

                              if(mysqli_num_rows($resultado) == 0){
                                ?>

                                <li ><a href = "./hacerse_premium.php" > Ser Premium</a ></li >

                                  <?php }  ?>
                                  <li class="dropdown" >
                                    <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Couchs <span class="caret" ></span ></a >
                                      <ul class="dropdown-menu" >
                                        <li ><a href = "./ver_listado_couch.php" > Listado de Couchs </a ></li >
                                        <li ><a href = "./agregar_couch.php" > Agregar Couch </a ></li >
                                        <li ><a href = "./listado_de_mis_couch.php" > Listado de mis Couch </a ></li >
                                        <li ><a href = "./listado_de_mis_reservas.php" > Mis reservas hechas </a ></li >
                                        <li ><a href = "./reservas_a_mis_couchs.php" > Reservas de mis Couchs </a ></li >
                                        <li ><a href = "./listado_donde_me_aloje.php" > Couchs donde me hospede </a ></li >
<li ><a href = "./mis_huespedes.php" > Mis huespedes </a ></li >
                                      </ul >
                                      </li >
                                      <li class="dropdown" >
                                        <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Mi perfil <span class="caret" ></span ></a >
                                          <ul class="dropdown-menu" >
                                          
                                              <li ><a href = "modificar_usuario.php" > Modificar perfil </a ></li>
                                              </ul>
                                            </li>
                                            <?php include("barra_busqueda.php");
                                          ?>
                                          </ul>
                                          <ul class="main-nav navbar-nav navbar-right">
                                              <li><a  href="./modificar_usuario.php"><span class="glyphicon glyphicon-user"></span> Bienvenido <?php echo($miNombre) ?>! </a></li>
                                            <li><a  href="./cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span>  Cerrar Sesion</a></li>
                                          </ul>

                                        </div>
                                      </div>
                                    </nav>
                                    <?php }  } else {?>
                                      <nav class="navbar navbar-inverse navbar-fixed" id="my">
                                        <div class="container-fluid">
                                          <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                            </button>

                                          </div>
                                          <div class="collapse navbar-collapse" id="myNavbar">
                                            <ul class="nav navbar-nav">
                                              <li class=""><a href="./index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                                              <li class="dropdown" >
                                                <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Couchs <span class="caret" ></span ></a >
                                                  <ul class="dropdown-menu" >
                                                    <li><a href = "./ver_listado_couch.php" > Listado de Couchs </a ></li >
                        <!--NATICAMI-->
                                                    </ul>
                                                  </li >
                                                  <li><a href="#">¿Quienes Somos?</a></li>
                                                  <li><a href="#">F.A.Q s</a></li>

                                                  <?php include("barra_busqueda.php"); ?>
                                                </ul>
                                                <ul class="main-nav navbar-nav navbar-right">
                                                  <li><a class="cd-signin" href="#0"><span class="glyphicon glyphicon-user"></span> Iniciar Sesion</a></li>
                                                  <li><a class="cd-signup" href="#0"><span class="glyphicon glyphicon-pencil"></span> Crear Cuenta</a></li>
                                                </ul>
                                              </div>
                                            </div>
                                          </nav>

                                          <?php } ?>
