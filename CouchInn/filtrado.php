<!DOCTYPE html>

<html>

	<?php

		require_once('sesion_class.php');
		$sesion= new sesion;

		//---Incluimos el head
		include_once('view/head.html');

	?>

	<body class="container">

		<?php

			//---Incluimos el header
			include_once('view/header.html');

			//---Incluimos el nav
			include_once('view/navBar/navBar.php');

		?>

		<main>
			<?php
				if(count($_GET)>0){
					if(isset($_GET['busqueda'])){
						$titulo=$_GET['busqueda'];
						$tit="`titulo` LIKE '%$titulo%' OR `descripcion` LIKE '%$titulo%'";
						$con = "SELECT * FROM `publicacion` WHERE "."$tit";
					}
					else{
						$con="SELECT * FROM `publicacion` WHERE ";
						$con2="SELECT `idPublicacion` FROM `usuariosolicita` WHERE ";
						$sub="";
						if(isset($_GET['provincias'])){
							if(!empty($_GET['provincias'])){
								$prov=$_GET['provincias'];
								$sub=$sub."AND `provincia` = '$prov' ";
							}
						}
						if(isset($_GET['localidades'])){
							if(!empty($_GET['localidades'])){
								$loc=$_GET['localidades'];
								$sub=$sub."AND `localidad` = '$loc' ";
							}
						}
						if(isset($_GET['plazas'])){
							if(!empty($_GET['plazas'])){
								$plaza=$_GET['plazas'];
								$sub=$sub."AND `cantPlazas` = '$plaza' ";
							}
						}
						if(isset($_GET['tipos'])){
							if(!empty($_GET['tipos'])){
								$tipo=$_GET['tipos'];
								$sub=$sub."AND `idTipo` = '$tipo' ";
							}
						}
						if(isset($_GET['datepicker']) and isset($_GET['datepicker2'])){
							if(!empty($_GET['datepicker']) and !empty($_GET['datepicker2'])){
								$desde=$_GET['datepicker'];
								$hasta=$_GET['datepicker2'];
								$con2=$con2."('".$desde."' BETWEEN fecha_inicio AND fecha_fin) OR ('".$hasta."' BETWEEN fecha_inicio AND fecha_fin) OR (fecha_inicio BETWEEN '".$desde."' AND '".$hasta."') OR (fecha_fin BETWEEN '".$desde."' AND '".$hasta."') AND (aceptada = '1') ";
								$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
							}
							else{
								if(!empty($_GET['datepicker'])){
									$desde=$_GET['datepicker'];
									$con2=$con2."`desde`>='$desde' AND `estado`='aceptada' ";
									$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
								}
								if(!empty($_GET['datepicker2'])){
									$hasta=$_GET['datepicker2'];
									$con2=$con2."`hasta`<='$hasta' AND `estado`='aceptada' ";
									$sub=$sub."AND `idPublicacion` NOT IN (".$con2.")";
								}
							}
						}
						$con=$con.substr($sub, 3, strlen($sub)-3);
					}
				}
				else{
					$con="SELECT * FROM `publicacion`";
				}
				require_once('busqueda.php');
				$resul=busqueda($con);
					if(!empty($resul)){?>
						<table class="table table hover">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Provincia</th>
								<th>Localidad</th>
								<th>CantPlazas</th>
								<th></th>
							</tr><?php
						foreach($resul as $res){?>
							<tr>
								<?php
								$idUser=$res['idUsuarioPublica'];
								$con2="SELECT premium FROM usuario WHERE idusuario='$idUser'";;
								$res2=busqueda($con2);
								foreach($res2 as $r){
									if($r['premium']== 1){
										echo "<td><img src=mostrarImagen.php?id_Publi=$res[idPublicacion] id='imagen'></td>";
									}
									else{
										echo "<td><img src=img/logo.png id='imagen'></td>";
									}
								}
								echo "<td><a href=visualizarpublicacion.php?idpubli=$res[idPublicacion]>$res[titulo]</a></td>";
								?>
								<td>
									<?php
										$con="SELECT `provincia` FROM `lista_provincias` WHERE id='$res[provincia]'";
										$prov=busqueda($con);
										if(!empty($prov)){
											foreach($prov as $p){
												echo $p['provincia'];
											}
										}
									?>
								</td>
								<td>
									<?php
										$con="SELECT `localidad` FROM `lista_localidades` WHERE id='$res[localidad]'";
										$loc=busqueda($con);
										if(!empty($loc)){
											foreach($loc as $l){
												echo $l['localidad'];
											}
										}
									?>
								</td>
								<td><?php echo $res['cantPlazas'];?></td>
								<td>
									<div>
										<br>
										<input class="btn btn-color" type="button" value="Ver couch" onclick="window.location.href='visualizarpublicacion.php?idpubli=<?php echo $res['idPublicacion'];?>'">
									</div>
								</td>
							</tr>
						<?php
						}
					}
					else{?>

						<div class="alert alert-info">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>No se obtubieron resultados.</strong>
							<br>>Revise la ortografia de la palabra.
							<br>>Utilice palabras mas genericas o menos palabras.
						</div><?php
					}?>

				</table>
		</main>

		<blockquote>

		<?php
			require_once('view/footer.html');
		?>

		</blockquote>

	</body>

</html>
