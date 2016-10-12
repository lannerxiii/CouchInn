<?php
require_once("./conectarBD.php");
session_start();
if( isset($_SESSION['admin']) ){

  $idTipo= $_POST['secreto'];



  $query="SELECT * FROM tipo_couch INNER JOIN  Couch ON (Couch.idTipo = tipo_couch.id_tipo) WHERE tipo_couch.id_tipo='$idTipo'";
  $resultado=mysqli_query($conexion, $query);
  $cant_couchs=mysqli_num_rows($resultado);
  echo "cantidad de couchs con este id";
  echo $cant_couchs;
  if ($cant_couchs == 0){
    $update="DELETE FROM tipo_couch WHERE id_tipo='".$idTipo."'";
    mysqli_query($conexion,$update);
    header("Location: ./modificacion_tipo_hospedaje.php?msg=No hay couchs con este tipo. Su tipo se ha eliminado correctamente&&class=alert-success");
    } else{
      $update="UPDATE tipo_couch SET visible='0'  WHERE id_tipo='".$idTipo."'";
        mysqli_query($conexion,$update);
      header("Location: ./modificacion_tipo_hospedaje.php?msg=Error, hay couchs que tienen este tipo. Su visibilidad se cambiara a no visible. No se eliminara&&class=alert-danger");
  }
}else {

  header("Location: ./index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}
?>
