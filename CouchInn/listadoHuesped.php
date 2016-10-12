<?php
if(!isset($_SESSION['sesion_usuario'])){
    session_start();
}
if($_SESSION['id_usuario'] == true) {
    include_once("conectarBD.php");
    $queryPuntajes = "SELECT nombre, puntuacion, apeynombre,reserva.id_couch, reserva.id_reserva, reserva.id_usuario, DATE_FORMAT(fecha_inicio, '%d-%m-%y') AS fecha_inicio, DATE_FORMAT(fecha_fin,'%d-%m-%y') AS fecha_fin FROM reserva INNER JOIN usuario ON (reserva.id_usuario = usuario.id_usuario ) INNER JOIN puntos_usuario ON(reserva.id_puntajeUsuario = puntos_usuario.id_puntosusuario) INNER JOIN couch ON (reserva.id_couch = couch.id_couch) WHERE id_puntajeUsuario IS NOT NULL AND reserva.id_couch IN (SELECT id_couch FROM couch WHERE idUsuario ='" . $_SESSION['id_usuario'] . "')";
    $consultaPuntajes = mysqli_query($conexion, $queryPuntajes);
    if (mysqli_num_rows($consultaPuntajes) == 0) { ?>
      <div class="panel-body">
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-info">
            Todavia no puntuaste ningun huesped.
        </div></div>
    <?php }
    while ($puntajes = mysqli_fetch_array($consultaPuntajes)) { ?>

        <div style="font-size: large;"class="panel panel-primary ">
            <div class="panel-heading">
                <p> Puntaje para el usuario <?php echo($puntajes['apeynombre']); ?> para el couch: <?php echo($puntajes['nombre']); ?> : </p>
            </div>
            <div class="panel-body">

                <p>Período de estadía desde: <?php echo $puntajes['fecha_inicio'] . " hasta " . $puntajes['fecha_fin']; ?></p>
                <p>Puntaje otorgado: <?php echo($puntajes['puntuacion']); ?> puntos</p>
                <?php
                $promedioQuery = "SELECT ROUND(AVG(puntuacion),2) AS promedio FROM puntos_usuario WHERE id_usuario ='" . $puntajes['id_usuario'] . "'";

                $promedioConsulta = mysqli_query($conexion, $promedioQuery);
                if ($promedio = mysqli_fetch_array($promedioConsulta)) {
                    ?>
                    <p> Puntaje promedio: <?php echo($promedio['promedio']); ?></p>
                    <?php
                }
                ?>
                <p></p>
            </div>
        </div>

    <?php }
} else{
    header("Location: /index.php?msg=No posee permiso para puntuar usuarios&&class=alert-danger");
}?>
