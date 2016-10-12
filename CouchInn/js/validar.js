function validarDNI(){
	DNI = document.getElementById("nro_documento").value;

	if( DNI.length < 7 || DNI.length > 9 ) {
		alert('El campo Nro de Documento no respeta la loguitud de 7 o 9 digitos');
		return false;
	}

}

function validarAltaCuota(){

	anio = document.getElementById("anio").value;
	if( anio.length < 4 || anio.length > 4) {
		alert('El campo anio requiere 4 Digitos');
		return false;
	}

}

function validarLogin(){

	usuario = document.getElementById("usuario").value;
	password = document.getElementById("password").value;
	if( usuario == null || usuario.length == 0 ) {
		alert('El campo Usuario es obligatorio en el logueo');
		return false;
	}
	if( password == null || password.length == 0 ) {
		alert('El campo password es obligatorio en el logueo');
		return false;
	}

}

function validarAltaUsuario(){

	usuario = document.getElementById("nomUsuario").value;
	estado = document.getElementById("estado").value;
	email = document.getElementById("mail").value;
	rol = document.getElementById("rol").value;

	if( usuario == null || usuario.length == 0 ) {
		alert('El campo Usuario es obligatorio en el logueo');
		return false;
	}

	if( estado == null || estado.length == 0 ) {
		alert('El campo estado es obligatorio en el logueo');
		return false;
	}

	if( email == null || email.length == 0 ) {
		alert('El campo email es obligatorio en el logueo');
		return false;
	}
	else{
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if (!expr.test(email)){
			alert("Error: La dirección de correo " + email + " es incorrecta.");
		}
	}

	if( rol == null || rol.length == 0 ) {
		alert('El campo rol es obligatorio en el logueo');
		return false;
	}

}

function validarAltaAlumno(){

	nro_documento = document.getElementById("nro_documento").value;
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	fecha_nacimiento = document.getElementById("datepicker").value;
	sexo = document.getElementById("sexo").value;
	direccion = document.getElementById("direccion").value;
	mail = document.getElementById("mail").value;
	fecha_ingreso = document.getElementById("datepicker2").value;

	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	numeros = /\d/;
	s=/(f|m|F|M)/;

	if( nro_documento == null || nro_documento.length < 7 || nro_documento.length > 9 ) {
		alert('El campo Nro de Documento no respeta la loguitud de 7 o 9 digitos');
		return false;
	}

	if( nombre == null || nombre.length == 0 ) {
		alert('El campo nombre es obligatorio en el alta de Alumno');
		return false;
	}
	else{
	    if (numeros.test(nombre)){
			alert("El campo nombre no puede contener numeros. ingreselo nuevamente");
			return false;
		}
	}

	if( apellido == null || apellido.length == 0 ) {
		alert('El campo email es obligatorio en el alta de Alumno');
		return false;
	}
	else{
		if (numeros.test(nombre)){
			alert("El campo nombre no puede contener numeros. ingreselo nuevamente");
			return false;
		}
	}

	if( fecha_nacimiento == null || fecha_nacimiento.length == 0 ) {
		alert('El campo fecha_nacimiento es obligatorio en el alta de Alumno');
		return false;
	}
	if( sexo == null || sexo.length == 0 ) {
		alert('El campo sexo es obligatorio en el alta de Alumno');
		return false;
	}
	else{
		if (!s.test(sexo)){
			alert("El campo no respeta su formato de 1 digito(f, m, F o M). ingreselo nuevamente");
			return false;
		}
	}

	if( mail == null || mail.length == 0 ) {
		alert('El campo email es obligatorio en el Alta de Alumno');
		return false;
	}
	else{
	    if (!expr.test(mail)){
			alert("Error: La dirección de correo " + mail + " es incorrecta.");
			return false;
		}
	}

	if( direccion == null || direccion.length == 0 ) {
		alert('El campo direccion es obligatorio en el alta de Alumno');
		return false;
	}

	if( fecha_ingreso == null || fecha_ingreso.length == 0 ) {
		alert('El campo fecha_ingreso es obligatorio en el alta de Alumno');
		return false;
	}

}

function confirm_click() {
	return confirm("¿Esta seguro de querer realizar la baja de este Usuario?");
}

function confirm_click2() {
	return confirm("¿Esta seguro de querer realizar la baja de este Alumno?");
}

function confirm_click3() {
	return confirm("¿Esta seguro de querer realizar la baja de este Responsable?");
}

function confirm_click4() {
	return confirm("¿Esta seguro de querer realizar la baja de esta Cuota?");
}

function confirm_click5() {
	return confirm("¿Esta seguro de querer desvincular a este responsable del alumno?");
}

function habilitarUsuario(){
	return confirm("El Usuario se encuentra deshabilitado, por lo tanto no se podran modificar sus datos ¿Quiere habilitar al usuario nuevamente?");
}

function habilitarAlumno(){
	return confirm("El Alumno se encuentra deshabilitado, por lo tanto no se podran modificar sus datos ¿Quiere habilitar al alumno nuevamente?");
}

function habilitarResponsable(){
	return confirm("El Responsable se encuentra deshabilitado, por lo tanto no se podran modificar sus datos ¿Quiere habilitar al alumno nuevamente?");
}
