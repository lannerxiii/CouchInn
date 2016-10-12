<?php

    include_once("../conectarBD.php");

	if (isset($_POST["aceptar"])){
        $queryDecisionReserva="UPDATE reserva SET estado='Aceptada' WHERE id_reserva='".$_POST["aceptar"]."'";
        mysqli_query($conexion, $queryDecisionReserva);
        $querySeleccionarReserva= "SELECT finicio, ffin FROM reserva WHERE id_reserva='".$_POST["aceptar"]."'";
        //Cuando se acepta una reserva, se deben rechazar las que estan espera y abarcan la fecha aceptada.
        $resSeleccionarReserva = mysqli_query($conexion, $querySeleccionarReserva);
        while ($res = mysqli_fetch_array($resSeleccionarReserva)){
            $queryRechazarLasDemas="UPDATE reserva SET estado='Rechazada' WHERE (('".$res["finicio"]."' BETWEEN finicio AND fFin) OR ('".$res["ffin"]."' BETWEEN finicio AND ffin) OR (finicio BETWEEN '".$res["finicio"]."' AND '".$res["ffin"]."') OR (ffin BETWEEN '".$res["finicio"]."' AND '".$res["ffin"]."')) AND (id_couch='".$_POST["idCouch"]."') AND (estado = 'En espera')";
            mysqli_query($conexion, $queryRechazarLasDemas);
        }

    }
    else{
        $queryDecisionReserva="UPDATE reserva SET estado='Rechazada' WHERE id_reserva='".$_POST["rechazar"]."'";
        mysqli_query($conexion, $queryDecisionReserva);
    }

    header("Location: ../detalle_couch.php?id=".$_POST['idCouch']);
?>
