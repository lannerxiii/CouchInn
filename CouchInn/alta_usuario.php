<?php
	$conexion = mysqli_connect( "localhost", "root", "", "prueba");

	if ($conexion->connect_error) {
		die("Connection failed: ".$conexion->connect_error);
	}

	if( !($_POST['email'] == "") ){
    $email= $_POST['email'];

    $query= "SELECT email FROM usuario WHERE email='".$email."'";
    $resultado= mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultado) == 0){

        $nombre= $_POST['apnom'];
        $clave= $_POST['contraseña'];
        $telefono=$_POST['telefono'];
        $nacionalidad=$_POST['nacionalidad'];
        $fecha=$_POST['fecha'];
				$sexo=$_POST['sex'];

        $insert="INSERT INTO usuario (apeynombre, clave, email, nacionalidad, telefono, fecha_de_nacimiento, sexo)  VALUES ('".$nombre."','".$clave."','".$email."','".$nacionalidad."','".$telefono."','".$fecha."','".$sexo."')";

        mysqli_query($conexion,$insert);
        ?><script type="text/javascript">alert("fuck");</script>
        <?php
  		header("Location: ./index.php?msg=¡Usuario creado satifactoriamente! Ya puedes iniciar sesion&&class=alert-success");
    } else {

        header("Location: ./index.php?msg=¡Ya existe un usuario con ese Email! Prueba registrarte con otro correo &&class=alert-danger");

    }
	}else {

	header("Location: ./index.php?msg=Que haces intentando entrar por la URL? No señor. ACCESO DENEGADO. &&class=alert-danger");

}
