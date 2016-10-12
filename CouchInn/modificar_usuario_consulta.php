<?php
$conexion = mysqli_connect( "localhost", "root", "", "prueba");

if ($conexion->connect_error) {
	die("Connection failed: ".$conexion->connect_error);
}

if( !($_POST['email'] == "") ){
	$id_user = $_POST['idUser'];
	$clave= $_POST['passUsuario'];
	$claveNueva= $_POST['passNueva'];
	$claveOculta= $_POST['claveOculta'];
	if(( $_POST['passNueva'] == "") &&( $_POST['passUsuario'] == "")){
		$clave=	$claveOculta;
		$claveNueva=$claveOculta;

		$query= "SELECT clave FROM usuario WHERE clave='$clave' ";

	}else{
		if(( $_POST['passNueva'] != "") &&  ( $_POST['passUsuario'] == "") ){
			header("Location: ./modificar_usuario.php?msg=Ingrese su contraseña antigua. &&class=alert-danger");
			die();
		}else {
			if(( $_POST['passNueva'] != "") &&  ( $_POST['passUsuario'] != "") ){
				$query= "SELECT clave FROM usuario WHERE clave='$clave' ";
			} else {
				header("Location: ./modificar_usuario.php?msg=Dejaste el campo Nueva contraseña en blanco, no te preocupes, tu contraseña no cambio. &&class=alert-danger");
				die();
			}
		}
	}
	$resultado= mysqli_query($conexion, $query);
	if(mysqli_num_rows($resultado) == 0){
		header("Location: ./modificar_usuario.php?msg=Contraseña Antigua incorrecta. &&class=alert-danger");
		die();
	}

	$email= $_POST['email'];
	$update= "UPDATE usuario SET email='$email' WHERE id_usuario='$id_user'";
	print($update);

	if(mysqli_query($conexion,$update)){


		$nombre= $_POST['nombreUsuario'];
		$telefono=$_POST['telUsuario'];
		$nacionalidad=$_POST['nacionalidad'];
		$fecha=$_POST['fecha'];
		$sexo=$_POST['sex'];
		//en sus vidas hagan este codigo cochino//
		$update= "UPDATE usuario SET clave='$claveNueva' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$update= "UPDATE usuario SET apeynombre='$nombre' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$update= "UPDATE usuario SET telefono='$telefono' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$update= "UPDATE usuario SET nacionalidad='$nacionalidad' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$update= "UPDATE usuario SET sexo='$sexo' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$update= "UPDATE usuario SET fecha_de_nacimiento='$fecha' WHERE id_usuario='$id_user'";
		mysqli_query($conexion,$update);
		$_SESSION["nom"]= $nombre;
		header("Location: ./modificar_usuario.php?msg=¡Datos modificados satifactoriamente!&&class=alert-success");
	} else {

		header("Location: ./modificar_usuario.php?msg=¡Ya existe un usuario con ese Email! No puedes cambiarlo a esa direccion &&class=alert-danger");

	}
}else {

	header("Location: ./index.php?msg=ACCESO DENEGADO. &&class=alert-danger");

}
