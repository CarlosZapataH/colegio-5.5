function seccionChange() {
    var idGrado = $('select[id=grado]').val();
    $('#seccion').empty();
    secciones.forEach(function (seccion) {
        if (seccion['grado_id'] == idGrado) {
            $('#seccion').append('<option value=' + seccion['id'] + '>' + seccion['name'] + '</option>')
        }
    });
}