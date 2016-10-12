<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['sesion_usuario']) ){
    $rech= $_POST['secretoRech'];

      $update="UPDATE reserva SET aceptada='2'WHERE id_reserva='".$rech."'";
      print $update;
      

      mysqli_query($conexion,$update);
        header("Location: ./reservas_a_mis_couchs.php?msg=Reserva Rechazada&&class=alert-success");

 }else {
    header("Location: ./index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
