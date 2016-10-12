<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['admin']) ){
    $nombre= $_POST['nomTipo'];
    $visibilidad= $_POST['checkVis'];
    $idTipo= $_POST['idTipo'];
echo $nombre;
echo $visibilidad;
echo $idTipo;
    if ($visibilidad == "visible") {
        $x=1;
    } else {
       $x=0;
    }
      $queryId="SELECT * FROM tipo_couch WHERE id_tipo='".$idTipo."'";
      $resultadoId= mysqli_query($conexion, $queryId);
      $update="UPDATE tipo_couch SET nombreTipo='$nombre' , visible='$x' WHERE id_tipo='".$idTipo."'";
      if(mysqli_query($conexion,$update)){
        header("Location: ./modificacion_tipo_hospedaje.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");
      }
      else{
          header("Location: ./modificacion_tipo_hospedaje.php?msg=Error, no podes nombrar dos tipos igual&&class=alert-danger");
      }
 }else {
    header("Location: ./index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
