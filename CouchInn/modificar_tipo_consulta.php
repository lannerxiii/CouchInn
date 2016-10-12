<?php
session_start();
if( isset($_SESSION['admin']) ){

	if ( !isset($_POST['secreto'])) {
		header("Location: ./index.php?msg=ACCESO DENEGADO&&class=alert-danger");
		exit();
	}

?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>
	<title>Modificar hospedaje</title>

	<style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
      padding-top: 15px;
      padding-bottom: 15px;

    }
		.jumbotron .container {
    max-width: 45%;
}
		body {
		  font-size: 100%;
		  font-family: "Open Sans", sans-serif;
		}

    /* Add a gray background color and some padding to the footer */
    footer {
    background-color: #f2f2f2;
      padding: 25px;
    }
    .fitImage {
    max-width:85%;
    max-height: 85%;
}
.form-control{
  display: inline;
  width: 50%;


}
#botoncitobusqueda {
    color: #333;
    background-color: #96ac3c;
    border-color: #96ac3c;
}

  </style>
	<script>
	function YNconfirm() {
 if (window.confirm('¿Realmente queres cancelar los cambios?'))
 {
   window.location.href = 'modificacion_tipo_hospedaje.php';
 }
}

function validate() {
    if (!/^[a-zA-Z]+( +[a-zA-Z]+)*$/g.test(document.nomTipo.nomTipo.value)) {
        alert("Ingrese solamente letras por favor");
        document.nomTipo.nomTipo.focus();
        return false;
    }
		return true;
}

</script>
</head>
</head>
       <?php include("random_background.php"); ?>
<body background="<?php echo $bg[array_rand($bg)]; ?>">
		<header >
	    <div class="jumbotron">
	      <div class="container text-center">
	    <img src="./img/f0d2b89.png" class="fitImage">
	      </div>
	    </div>
    </header>

    <?php include("navbar2.php"); ?>


      <?php
            require_once("./conectarBD.php");
            $id_tipo= $_POST['secreto'];
            $queryFila="SELECT * FROM tipo_couch WHERE id_tipo='".$id_tipo."'";
            $result=mysqli_query($conexion,$queryFila);
            $row= mysqli_fetch_array($result);
            $checked="";
      ?>

      <body>
          <div class="container col-sm-8 col-sm-offset-2">
              <?php if (isset($_GET['msg'])) { ?>
                  <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
                      <?php echo($_GET['msg'])?>
                  </div>
              <?php } ?>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h1>Modificacion de Tipo</h1>
							</div>

							<div class="panel-body">
             <form class="form-horizontal" name="nomTipo" method="post" onsubmit="return validate()" action="modificartipo_consulta.php">

						      <div class="form-group ">
                     <label class="col-sm-4 control-label" for="nomTipo">Nombre:</label>
                     <input type="hidden" name="idTipo" value="<?php echo($row['id_tipo']) ?>">
										 <div class="col-sm-6">
										 <input type="text"  name="nomTipo"  required class="form-control" id="nomTipo" placeholder="Nombre" aria-describedby="helpBlock-nomTipo" value="<?php echo($row['nombreTipo'])?>" required>
										 <label>
											 <?php if($row['visible'] == 1){
												 ?>  <input type="radio" name="checkVis" value="visible" checked >Visible
													<input type="radio" name="checkVis" value="no" >No Visible
												<?php }else {
													?>
													<input type="radio" name="checkVis" value="visible" >Visible
													 <input type="radio" name="checkVis" value="no" checked >No Visible

											<?php	} ?>

										 </label>
										</div>
                 </div>
                 <div class="form-group">
									 <div class="col-sm-offset-4 col-sm-4">
                     <button type="submit" class="btn btn-default">Aceptar</button>
                     <button type="button" onclick="YNconfirm()" class="btn btn-default" href="modificacion_tipo_hospedaje.php">Cancelar</button>
									 </div>
		             </div>
             </form>
						 </div>
						 </div>
         </div>
     </body>
    <?php  } else {

			  header("Location: ./index.php?msg=ACCESO DENEGADO&&class=alert-danger");
		}

		 ?>
