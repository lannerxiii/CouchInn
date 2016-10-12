<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['sesion_usuario']) ){

    $respuesta= $_POST['respuesta'];
    $idPreg= $_POST['secretoP'];
    $idCouch= $_POST['secreto1'];
print $respuesta;
print $idPreg;

    $update= "UPDATE preguntasrespuestas SET respuesta='$respuesta' WHERE idPreg='$idPreg'";
    mysqli_query($conexion,$update);

    header('Location: detalle_couch.php?secreto='.$idCouch.'&enviar=Ver+Couch&msg=Mensaje agregado satifactoriamente');

  } else {

	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
