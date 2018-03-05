function seccionChange() {
    var idGrado = $('select[id=grado]').val();
    $('#seccion').empty();
    secciones.forEach(function (seccion) {
        if (seccion['grado_id'] == idGrado) {
            $('#seccion').append('<option value=' + seccion['id'] + '>' + seccion['name'] + '</option>')
        }
    });
}

function gradoChange() {
    var idNivel = $('select[id=nivel]').val();
    $('#grado').empty();
    grados.forEach(function (grado) {
        if (grado['nivel_id'] == idNivel) {
            $('#grado').append('<option value=' + grado['id'] + '>' + grado['name'] + '</option>')
        }
    });
}