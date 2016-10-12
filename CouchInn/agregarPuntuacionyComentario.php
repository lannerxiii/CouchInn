<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['sesion_usuario']) ){
    //$puntaje=$_POST['puntaje']
    $comentario= $_POST['comentario'];
    $idCouch= $_POST['secreto1'];
    $idUsuario= $_POST['secreto2'];
    print $puntaje;
    print $comentario;
    print $idCouch;
    print $idUsuario;
    //en puntuacion iria un campo comentario acompañado con el puntaje
    if(puntuacion.idUsuario=$idUsuario){
        header("Location: listado_donde_me_aloje.php?msg=Usted ya ha puntuado este couch&&class=alert-warning");
    $query="INSERT INTO puntuacion (idCouch, idUsuario, puntuacion,comentario) VALUES ('". $idCouch . "','". $idUsuario . "','". $puntaje . "','". $comentario . "')";
    mysqli_query($conexion, $query);
    header('Location: detalle_couch.php?secreto='.$idCouch.'&enviar=Ver+Couch&msg=El puntaje fue agregado satifactoriamente');

  } else {

	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
