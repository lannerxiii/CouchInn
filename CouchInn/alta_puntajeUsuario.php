<?php
if(isset($_GET)) {
    include_once("./conectarBD.php");
    $idUsuario=$_GET['id_usuario'];
    $idReserva=$_GET['id_reserva'];
    $idCouch=$_GET['id_couch'];
    $puntaje=$_GET['puntReser'];
    $comentario=$_GET['puntUser'];
    //guarda el puntaje para el usuario
    var_dump($_GET);
    die();
    $queryPuntaje ="INSERT INTO puntos_usuario(id_usuario,id_reserva, puntuacion,comentario) VALUES ($idUsuario,$idReserva, $puntaje,$comentario)";

    mysqli_query($conexion, $queryPuntaje);
    //actualiza la reserva
    $idPuntaje= mysqli_insert_id($conexion);
    $queryReserva= "UPDATE reserva SET id_puntajeUsuario='$idPuntaje' WHERE id_reserva='$idReserva'";
    mysqli_query($conexion, $queryReserva);
    header("Location: ./mis_huespedes.php?msg=Su opinion ha sido registrada&&class=alert-success");
}else{
    echo("que haces pillin? ;)");
}
