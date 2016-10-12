<?php

    if(isset($_GET)) {
        include("./conectarBD.php");
        $puntaje= $_GET['puntReser'];
        $contenido= $_GET['puntReserCont'];
        $idCouch= $_GET['id_couch'];
        $idReserva= $_GET['id_reserva'];
        $idUsuario= $_GET['id_usuario'];

        //agrega el puntaje a la bd
        var_dump($_GET);

        if($contenido == ""){
            $queryPregunta = "INSERT INTO puntoscouch(id_usuario, id_couch, puntaje) VALUES ('" . $idUsuario . "', '" . $idCouch . "', '" . $puntaje . "')";
            echo($queryPregunta);
        } else {
            $queryPregunta = "INSERT INTO puntoscouch(id_usuario, id_couch, comentario, puntaje) VALUES ('" . $idUsuario . "', '" . $idCouch . "', '" . $contenido . "', '" . $puntaje . "')";
            echo($queryPregunta);
        }
        mysqli_query($conexion, $queryPregunta);
        //cagregar el puntaje a la reserva
        $preguntaId= mysqli_insert_id($conexion);
        $queryReserva= "UPDATE reserva SET id_puntajeCouch='$preguntaId' WHERE id_reserva='".$idReserva."'";
        mysqli_query($conexion, $queryReserva);
        echo($queryReserva);
        header("Location: ./listado_donde_me_aloje.php?msg=Su opinion ha sido registrada&&class=alert-success");
    } else {
        echo("que intentas hacer pillin?");
    }
