<?php
   require_once("./conectarBD.php");
   session_start();
if( isset($_SESSION['admin']) ){

    $nombre= $_POST['nomTipo'];
    $queryNombreTipo="SELECT nombreTipo FROM tipo_couch WHERE nombreTipo='".$nombre."'";
    $resultadoNombreTipo= mysqli_query($conexion, $queryNombreTipo);
    if((mysqli_num_rows($resultadoNombreTipo) == 0)){
        $insert="INSERT INTO tipo_couch (nombreTipo) VALUES('".$nombre."')";
        // esta mierda es re copada : die ($insert);
        mysqli_query($conexion,$insert);
        header("Location: ./alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");
    } else {
        header("Location: ./alta_tipos_hospedaje_form.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");
    }
  } else {

	header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }
    ?>
