<?php
require_once("./conectarBD.php");
session_start();

$idCouch = $_POST['secreto']; //ID DEL COUCH QUE DESEA RESERVAR. (SE RECIBE BIEN)
$fecha =$_POST['fechaDesde'];
$fechaDesde= date("Y-m-d", strtotime($fecha));
$fecha2 =$_POST['fechaHasta'];
$fechaHasta= date("Y-m-d", strtotime($fecha2));
$capacidad = $_POST['capacidad'];
$idUsuario = $_POST['secreto_idUsuario'];

var_dump ($fechaDesde);
var_dump($fechaHasta);

if($fechaDesde > $fechaHasta) {
 header("location: ./ver_listado_couch.php?msg=Revisa tu fecha! La primera fecha debe ser menor a la segunda. &&class=alert-warning");
 die();
}
$queryTabla="SELECT * FROM couch WHERE couch.id_couch='$idCouch'";
$couch=mysqli_query($conexion, $queryTabla);
$couch = mysqli_fetch_array($couch);

 if($capacidad  > $couch['capacidad']) {
   header("location: ./ver_listado_couch.php?msg=La capacidad que ingresaste supera a la capacidad ofrecida por el couch. &&class=alert-warning");
   die();
     }
$idDueno= $couch['idUsuario'];

  $resultado= mysqli_query($conexion, $query);
  if(mysqli_num_rows($resultado) == 0){
    $query="INSERT INTO reserva (id_couch, capac, fecha_inicio, fecha_fin, id_usuario, id_duenoCouch) VALUES ('". $idCouch . "','" . $capacidad . "','" . $fechaDesde ." ', '" . $fechaHasta . "' ,'" . $idUsuario . "','" . $idDueno . "')";
    echo ($query);
    mysqli_query($conexion, $query);
    header("location: ./index.php?msg=Su solicitud ha sido enviada y quedara pendiente de aceptacion. &&class=alert-success");
    }

  //}
  ?>
