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
  $nombre = $_POST['nombre'];
  $tipo = $_POST['tipo'];
  $id_user = $_SESSION['id_usuario'];
  $id_couch = $_POST['secreto'];

  $warning= false;


  $query= "SELECT nombre FROM Couch WHERE nombre='$nombre'";
  $update= "UPDATE Couch SET nombre='$nombre' WHERE id_couch='$id_couch'";
  if(mysqli_query($conexion,$update)){

    $update= "UPDATE Couch SET capacidad='$capacidad' WHERE id_couch='$id_couch'";
    mysqli_query($conexion,$update);
    $update= "UPDATE Couch SET lugar='$lugar' WHERE id_couch='$id_couch'";
    mysqli_query($conexion,$update);
    $update= "UPDATE Couch SET descripcion='$descripcion' WHERE id_couch='$id_couch'";
    mysqli_query($conexion,$update);
    $update= "UPDATE Couch SET tipo='$tipo' WHERE id_couch='$id_couch'";
    mysqli_query($conexion,$update);

    //direccion base para los couch, se crea una carpeta para cada usuario
    $dirBase = "./img/" . $id_user . "/";
    $dirBase2 = "img/" . $id_user . "/";

    $checkboxes = isset($_POST['checkboxArray']) ? $_POST['checkboxArray'] : array();
    print_r($checkboxes);


    foreach ($checkboxes as  $val) {
          $dirBorrado = $dirBase ."fotocouch".$id_user."-".$id_couch."-".$val;
          print($dirBorrado);
          unlink($dirBorrado);


    }

    //si el usuario no posee una carpeta para guardar sus fotos, la crea
    if( ! file_exists($dirBase)) {
      mkdir($dirBase2, 0777);}
      //valida las imagenes una por una
      $total = count($_FILES['imgCouch']['name']);
      $tipoImgCouch = $_FILES['imgCouch']['type'][0];
      echo $tipoImgCouch;



      for ( $i = 0; $i < $total; $i++){
        $ok=true;

        $tipoImgCouch = $_FILES['imgCouch']['type'][$i];
        if (!($tipoImgCouch == 'image/png' || $tipoImgCouch == 'image/jpg' || $tipoImgCouch == 'image/jpeg' || empty($_FILES['imgCouch']['type'][$i])) ) {
          $ok=false;
        }
        if($ok){
            $dirCompleta = $dirBase ."fotocouch".$id_user."-".$id_couch."-".$i;
          move_uploaded_file($_FILES['imgCouch']['tmp_name'][$i], $dirCompleta);
          $dir2= $dirBase2.basename($_FILES["imgCouch"]["name"][$i]);
          $query="INSERT INTO foto(id_couch, ruta) VALUES ('".$id_couch."','".$dirCompleta."')";
          mysqli_query($conexion, $query);
          if($i == 0){
            $query= "UPDATE Couch SET foto_listado='$dirCompleta' WHERE id_couch='$id_couch'";
            mysqli_query($conexion, $query);
          }
        }
        else {
          if($ok == false){
            header("location: ./index.php?msg=El couch se modifico correctamente, pero la carga de ALGUNAS imagenes fallo, podes revisar y arreglar esto desde la opcion Modificar Couch&&class=alert-danger");
            die();
          }
        }
      }
      header("location: ./listado_de_mis_couch.php?msg=Su couch se Modifico Correctamente correctamente&&class=alert-success");
    }else {
      header("location: ./index.php?msg=Error, ya hay couch con ese nombre&&class=alert-warning");
    }

  }
  ?>
