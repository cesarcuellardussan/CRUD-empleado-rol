function CapturarDatos() {
    let datos = {};

    datos["nombre"] = $("#nombre").val();
    datos["email"] = $("#email").val();
    datos["sexo"] = $('input:radio[name=sexo]:checked').val();
    datos["area_id"] = $("#area_id").val();
    datos["descripcion"] = $("#descripcion").val();
    datos["boletin"] = $("#boletin").is(":checked") ? 1 : 0;

    return datos;
}

function CapturarRoles() {
    var roles = new Array();

    $("input[name='roles[]']:checked").each(function() {
        roles.push($(this).val());
    });

    return roles;
}