<?php
require_once("./conectarBD.php");
session_start();
if( isset($_SESSION['id_usuario']) ){

  $idCouch= $_POST['secreto'];



  $query="SELECT * FROM reserva INNER JOIN  Couch ON (Couch.id_couch=reserva.id_couch) WHERE reserva.id_couch='$idCouch'";
  $resultado=mysqli_query($conexion,$query);
  $cant_couchs=mysqli_num_rows($resultado);
  echo "cantidad de reservas con este id";
  echo $cant_couchs;
  if ($cant_couchs == 0){
    echo $idCouch;


    $update="DELETE FROM Couch WHERE id_couch='$idCouch'";
    print($update);
    mysqli_query($conexion,$update);
    header("Location: ./listado_de_mis_couch.php?msg=No hay reservas asociadas. Se ha eliminado correctamente&&class=alert-success");
    } else{
      $update="UPDATE Couch SET disponibilidad='0'  WHERE id_couch='$idCouch'";
      mysqli_query($conexion,$update);
      header("Location: ./listado_de_mis_couch.php?msg=Error, hay reservas asociadas al couch. Su visibilidad se cambiara a no visible. No se eliminara&&class=alert-danger");
  }
}else {

  header("Location: ./index.php?msg=Debe estar logueado para ver esta pagina&&class=alert-warning");
}
?>
