<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['sesion_usuario']) ){

    $comentario= $_POST['comentario'];
    $idCouch= $_POST['secreto1'];
    $idUsuario= $_POST['secreto2'];
    print $comentario;
    print $idCouch;
    print $idUsuario;

      $query="INSERT INTO preguntasrespuestas (idCouch, idUsuario, pregunta) VALUES ('". $idCouch . "','". $idUsuario . "','". $comentario . "')";
    mysqli_query($conexion, $query);
    header('Location: detalle_couch.php?secreto='.$idCouch.'&enviar=Ver+Couch&msg=Mensaje agregado satifactoriamente');

  } else {

	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
