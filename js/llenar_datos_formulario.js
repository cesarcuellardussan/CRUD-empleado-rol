$(function() {
    $(document).on("click", ".actualizar , .eliminar", function(event) {
        validarDatos();
        ResetHide();
        let empleado_id = $(this).data("empleado");
        if ($(this).hasClass("actualizar")) {
            $("#titulo-actualizar , #actualizar").show();
            $("#actualizar").data("empleado", empleado_id);
        } else {
            $("#titulo-eliminar , #eliminar").show();
            $("#eliminar").data("empleado", empleado_id);
        }
        //$("#formulario")[0].reset(); // reset con jquery        

        $.ajax({ url: './php/controladores/llenar_datos_formulario.php', type: 'GET', dataType: 'json', data: { empleado_id: empleado_id } }).done(function(respuesta) {

            var DataRoles = respuesta.DataRoles;
            var DataEmpleados = respuesta.DataEmpleados[0];

            //llenar formulario
            $("#formulario").find(':input').each(function() {
                var elemento = this;
                var element = $(this);
                Object.keys(DataEmpleados).forEach(function(NombreCampo, value) {
                    if (elemento.name == NombreCampo) {
                        if (elemento.type == "radio") {
                            if (element.val() == DataEmpleados[NombreCampo]) {
                                element.prop("checked", true);
                            }
                        } else if (elemento.type == "checkbox" && DataEmpleados[NombreCampo] == "1") {
                            element.prop("checked", true);
                        } else {
                            element.val(DataEmpleados[NombreCampo]);
                        }
                    }
                });
            });
            //llenar checkbox ROLES
            Object.keys(DataRoles).forEach(function(i, value) {
                $("input[name='roles[]']").each(function() {
                    if ($(this).val() == DataRoles[i].rol_id) $(this).prop('checked', true);
                });

            });
        });
    });
});