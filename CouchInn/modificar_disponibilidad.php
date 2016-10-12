<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['id_usuario'])){
    $idcouch= $_POST['secreto'];
    $disponibilidad= $_POST['disponibilidad'];
    echo $idcouch;
    echo $disponibilidad;

    if ($disponibilidad == 1) {
        $x=0;
    } else {
       $x=1;
    }
      $queryId="SELECT * FROM couch WHERE couch.id_couch='".$idcouch."'";
      echo $queryId;
      $resultadoId= mysqli_query($conexion, $queryId);
      $update="UPDATE couch SET couch.disponibilidad='$x' WHERE couch.id_couch='".$idcouch."'";
      echo $update;

      if(mysqli_query($conexion,$update)){
        header("Location: ./listado_de_mis_couch.php?msg=Haz modificado la disponibilidad del couch correctamente&&class=alert-success");
      }
      else{
          header("Location: ./listado_de_mis_couch.php?msg=No se ha podido cambiar la visibilidad&&class=alert-danger");
      }
 }else {
    header("Location: ./index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
