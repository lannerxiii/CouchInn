<?php

    include_once("./conectarBD.php");
    $algo=$_POST["secretoAcept"];
    print $algo;

    $fDesde = $_POST['finicio'];
  	$fHasta = $_POST['ffin'];
      $hoy = date("Y-m-d");
  	  $queryReservar="SELECT * FROM reserva WHERE (('".$fDesde."' BETWEEN fecha_inicio AND fecha_fin) OR ('".$fHasta."' BETWEEN fecha_inicio AND fecha_fin) OR (fecha_inicio BETWEEN '".$fDesde."' AND '".$fHasta."') OR (fecha_fin BETWEEN '".$fDesde."' AND '".$fHasta."')) AND (id_couch='".$_POST["idCouch"]."') AND (aceptada = '1')";
      $resultadoReservar= mysqli_query($conexion, $queryReservar);
      //Si no hay reservas para las fechas solicitadas, carga la solicitud
      if((mysqli_num_rows($resultadoReservar) == 0)){
        $idReserva=$_POST["secretoAcept"];
        $queryDecisionReserva="UPDATE reserva SET aceptada='1' WHERE id_reserva='$idReserva'";
        mysqli_query($conexion, $queryDecisionReserva);
        $queryDecisionReserva="UPDATE reserva SET fecha_aceptada='$hoy' WHERE id_reserva='$idReserva'";
        mysqli_query($conexion, $queryDecisionReserva);
        $querySeleccionarReserva= "SELECT fecha_inicio, fecha_fin FROM reserva WHERE id_reserva='$idReserva'";

        //Cuando se acepta una reserva, se deben rechazar las que estan espera y abarcan la fecha aceptada.
        $resSeleccionarReserva = mysqli_query($conexion, $querySeleccionarReserva);

        while ($res = mysqli_fetch_array($resSeleccionarReserva)){
            $queryRechazarLasDemas="UPDATE reserva SET aceptada='2' WHERE (('".$res["fecha_inicio"]."' BETWEEN fecha_inicio AND fecha_fin) OR ('".$res["fecha_fin"]."' BETWEEN fecha_inicio AND fecha_fin) OR (fecha_inicio BETWEEN '".$res["fecha_inicio"]."' AND '".$res["fecha_fin"]."') OR (fecha_fin BETWEEN '".$res["fecha_inicio"]."' AND '".$res["fecha_fin"]."')) AND (id_couch='".$_POST["idCouch"]."') AND (aceptada = '0')";

            mysqli_query($conexion, $queryRechazarLasDemas);
        }

    }
    else{
        $queryDecisionReserva="UPDATE reserva SET aceptada='2' WHERE id_reserva='".$_POST["secretoAcept"]."'";
        mysqli_query($conexion, $queryDecisionReserva);
        header("Location: ./reservas_a_mis_couchs.php?msg=Ya hay una reserva ACEPTADA en este mismo rango de fecha, por lo tanto no puedes aceptarla, reserva rechazada &&class=alert-alert");
        die();
    }

    header("Location: ./reservas_a_mis_couchs.php?msg=Reserva aceptada correctamente, las otras reservas PENDIENTES en la misma fecha fueron RECHAZADAS &&class=alert-info");
?>
