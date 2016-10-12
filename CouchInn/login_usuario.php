<?php

$conexion = mysqli_connect( "localhost", "root", "", "prueba");

if( (isset($_POST['User'])) & (isset($_POST['Pass'])) ){

    $email= $_POST['User'];
    $clave= $_POST['Pass'];
    $query= "SELECT * FROM usuario WHERE email='".$email."' AND clave='".$clave."'";
    $resultado=mysqli_query($conexion, $query);
    $queryAdmin= "SELECT * FROM administrador WHERE email='".$email."' AND clave='".$clave."'";
    $resultadoAdmin=mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) == 1) {
        session_start();
        $row= mysqli_fetch_array($resultado);
        $_SESSION["sesion_usuario"] = true;
        $_SESSION["id_usuario"]= $row['id_usuario'];
        $_SESSION["nom"]= $row['apeynombre'];
        $class="alert-success";
        $msg="Se ha iniciado sesión correctamente";
    // si no es usuario comun se fija si es admin

    } else {
        $queryAdmin = "SELECT * FROM administrador WHERE email='". $email ."' AND clave='".$clave."'";
        $resultadoAdmin = mysqli_query($conexion, $queryAdmin);
        if (mysqli_num_rows($resultadoAdmin) == 1) {
            session_start();
            $rowAdmin = mysqli_fetch_array($resultadoAdmin);
            $_SESSION["sesion_usuario"] = true;
            $_SESSION["id_usuario"] = $rowAdmin['id_admin'];
            $_SESSION['admin'] = true;
            $class = "alert-success";
            $msg = "Se ha iniciado sesión correctamente como administrador";
        //si no es ninguno de los dos tira error
        } else {
            $class = "alert-danger";
            $msg = "<strong>Error al iniciar sesión</strong>. Usuario o contraseña incorrecta";
        }
    }

    header("Location: ./index.php?class=".$class."&&msg=".$msg);
}
else{
	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}
?>
