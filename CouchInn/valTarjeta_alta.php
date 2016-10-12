<?php
    session_start();
    include_once("./conectarBD.php");
    $nroTarjeta=$_POST['nroTarjeta'];
    $idUsuario=$_SESSION['id_usuario'];
    $hoy = date("Y-m-d");
    $query= "SELECT numero FROM tarjetas WHERE numero='".$nroTarjeta."'";
    echo $query;
    $resultado=mysqli_query($conexion, $query);
    $num_rows = mysqli_num_rows($resultado);
    echo "$num_rows Rows\n";
    if (mysqli_num_rows($resultado) == 1) {
       echo "LLEGUE";
        $x=1;
        $update="UPDATE usuario SET premiun='".$x."' WHERE id_usuario='".$idUsuario."'";
        mysqli_query($conexion, $update);
        $update="UPDATE usuario SET fecha_premium='".$hoy."' WHERE id_usuario='".$idUsuario."'";
        mysqli_query($conexion, $update);

    header("Location: ./index.php?msg=Pago realizado Exitosamente! Ya puedes disfrutar de tus beneficios Premium!&&class=alert-success");
    } else {
        header("Location: ./index.php?msg=Pago no realizado. Nº de tarjeta incorrecta o rechazado. Por favor verifica la tarjeta y vuelve a intentarlo &&class=alert-danger");
    }
?>
