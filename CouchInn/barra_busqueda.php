<form class="navbar-form navbar-left" role="search" action="listado_filtrado.php" method="GET" onsubmit=" return validarBusqueda(this)">
	<div class="form-group">
		<input type="text" id="busqueda" name="titulo" class="form-control" placeholder="Buscar Couch">
		<input class="btn btn-default" id="botoncitobusqueda" type="button" value="Avanzado" onclick="window.location.href='./avanzado.php'">
		<input type="submit" id="botoncitobusqueda" class="btn btn-default" value="Buscar">
	</div>
</form>
