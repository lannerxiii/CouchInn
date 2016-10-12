function valFormularioAlta() {
    var x = document.forms["myForm"]["telefono"].value;

      if(/\D/.test(x)){
        alert("Solo puedes ingresar numeros en el campo Telefono");
        return false;
    }
}
function valTarjeta() {
    var x = document.forms["formu_tarjeta"]["nroTarjeta"].value;

      if(/\D/.test(x)){
        alert("Por Favor ingrese solo numeros");
        return false;
    }
}
