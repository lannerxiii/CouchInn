function is1to5(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if( charCode > 48 && charCode < 54)
        return true;
    return false;
}

function changeValue( valueId, changeId) {
    document.getElementById(changeId).value = document.getElementById(valueId).value
}
