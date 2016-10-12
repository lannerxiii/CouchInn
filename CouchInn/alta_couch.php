<?php
require_once("./conectarBD.php");
session_start();

if( !isset($_POST['submit']) ){
  header("Location: ./index.php?msg=ACCESO DENEGADO&&class=alert-danger");
  exit();
}else {

  $capacidad = $_POST['capacidad'];
  $lugar = $_POST['lugar'];
  $descripcion = $_POST['descripcion'];
  $hoy = date("Y-m-d");
  $nombre = $_POST['nombre'];
  $tipo = $_POST['tipo'];
  $id_user = $_SESSION['id_usuario'];
  $warning= false;


  $query= "SELECT nombre FROM Couch WHERE nombre='$nombre'";
  $resultado= mysqli_query($conexion, $query);

  if(mysqli_num_rows($resultado) == 0){
    $query="INSERT INTO Couch (idUsuario, idTipo, nombre, descripcion, lugar,capacidad,fecha ) VALUES ('". $id_user . "','" . $tipo . "','" . $nombre ." ', '" . $descripcion . "','" . $lugar. "','" . $capacidad . "','" . $hoy . "')";
    echo ($query);
    mysqli_query($conexion, $query);
    //recoge el id resultante
    $idCouch=mysqli_insert_id($conexion);
    //direccion base para los couch, se crea una carpeta para cada usuario
    $dirBase = "./img/" . $id_user . "/";
    $dirBase2 = "img/" . $id_user . "/";

    //si el usuario no posee una carpeta para guardar sus fotos, la crea
    if( ! file_exists($dirBase)) {
      mkdir($dirBase2, 0777);}
      //valida las imagenes una por una
      $total = count($_FILES['imgCouch']['name']);
      $tipoImgCouch = $_FILES['imgCouch']['type'][0];
      echo $tipoImgCouch;

      if (!($tipoImgCouch == 'image/png' || $tipoImgCouch == 'image/jpg' || $tipoImgCouch == 'image/jpeg')){
        $query = "DELETE FROM Couch WHERE id_couch = $idCouch";
        mysqli_query($conexion, $query);
        header("location: ./index.php?msg=Por favor asegurate de que estas subiendo una foto&&class=alert-danger");
        die();
      }

      for ( $i = 0; $i < $total; $i++){
        $ok=true;
        //ruta propiamente de la imagen

        //valida que sea es una imagen
        $tipoImgCouch = $_FILES['imgCouch']['type'][$i];
        if (!($tipoImgCouch == 'image/png' || $tipoImgCouch == 'image/jpg' || $tipoImgCouch == 'image/jpeg' || empty($_FILES['imgCouch']['type'][$i])) ) {
        $ok = false;
        }

        //valida que la imagen no exista
// podria renombrarlas asi no pasa esta bananada        if (file_exists($dirCompleta)) { $ok=false;}

        if($ok){
            $dirCompleta = $dirBase ."fotocouch".$id_user."-".$idCouch."-".$i;
          move_uploaded_file($_FILES['imgCouch']['tmp_name'][$i], $dirCompleta);
          $dir2= $dirBase2.basename($_FILES["imgCouch"]["name"][$i]);
          $query="INSERT INTO foto(id_couch, ruta) VALUES ('".$idCouch."','".$dirCompleta."')";
          mysqli_query($conexion, $query);
          if($i == 0){
            $query= "UPDATE Couch SET foto_listado='$dirCompleta' WHERE id_couch='$idCouch'";
            mysqli_query($conexion, $query);
          }
        }
        else {
          $dirCompleta = $dirBase ."fotocouch".$id_user."-".$idCouch."-".$i;
        $query="INSERT INTO foto(id_couch, ruta) VALUES ('".$idCouch."','".$dirCompleta."')";
        mysqli_query($conexion, $query);
        if($ok == false){
          header("location: ./index.php?msg=El couch se agrego correctamente, pero la carga de ALGUNAS imagenes fallo, podes revisar y arreglar esto desde la opcion Modificar Couch&&class=alert-danger");
          die();
        }
      }
      }
      header("location: ./index.php?msg=Su couch se creo correctamente&&class=alert-success");
    }else {
      header("location: ./index.php?msg=Error, ya hay couch con ese nombre&&class=alert-warning");
    }

  }
  ?>
