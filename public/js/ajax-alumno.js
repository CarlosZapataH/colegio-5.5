function alumnoSearch() {
    var parametros = {
        "nivel_id": $('select[id=nivel]').val(),
        "grado_id": $('select[id=grado]').val(),
        "seccion_id": $('select[id=seccion]').val()
    };
    $.ajax({
        data: parametros,
        type: 'get',
        url: 'alumnos/search',
        success: function (response) {
            $('#alumnos_table').empty();
            response.forEach(function (alumno) {
                var casilla = '';
                if (alumno['status'] == null) {
                    casilla = '<input type="checkbox" name="asistencia[]" value="' + alumno['id'] + '">'
                } else {
                    casilla = '<span class="badge badge-success">Asistió</span>'
                }
                $('#alumnos_table').append('<tr>' +
                    '<td>' + casilla + '</td>' +
                    '<td>' + alumno['full_name'] + '</td>' +
                    '<td>' + alumno['dni'] + '</td>' +
                    '</tr>');
            });
        }
    });
}

function assistanceSearch() {
    var parametros = {
        "nivel_id": $('select[id=nivel]').val(),
        "grado_id": $('select[id=grado]').val(),
        "seccion_id": $('select[id=seccion]').val(),
        "assistance_date": $('#assistance_date').val()
    };
    $.ajax({
        data: parametros,
        type: 'get',
        url: 'search',
        success: function (response) {
            $('#alumnos_table').empty();
            response.forEach(function (alumno) {
                $('#alumnos_table').append('<tr>' +
                    '<td>' + alumno['full_name'] + '</td>' +
                    '<td>' + alumno['dni'] + '</td>' +
                    '<td>' + alumno['created_at'] + '</td>' +
                    '</tr>');
            });
        }
    });
}