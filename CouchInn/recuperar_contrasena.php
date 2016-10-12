<?php
   require_once("./conectarBD.php");
   session_start();
if( !isset($_SESSION['admin']) ){
    $clave="123456789";
    $email= $_POST['email'];

    $chequeo="SELECT * FROM usuario WHERE email='$email'";

    $resultado=mysqli_query($conexion,$chequeo);
    printf($chequeo);
    printf(mysqli_num_rows($resultado));

    if(mysqli_num_rows($resultado) == 1){
        $update="UPDATE usuario SET clave='$clave' WHERE email='$email'";
          $resultado=mysqli_query($conexion,$update);

      header("Location: ./index.php?msg=Envio de Mail Exitoso! Revisa tu correo para ver la nueva contraseña&&class=alert-success");
    }
    else{
        header("Location: ./index.php?msg=No hay usuario registrado con ese mail. ¿Lo ingresaste Correctamente?&&class=alert-danger");
    }
  } else {

	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
