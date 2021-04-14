$(function() {
    //Actualizar datos en tablas
    $(document).on('click', "#actualizar", function(event) {
        validarDatos();
        if ($("#formulario").valid() == false) {
            return;
        }
        Swal.fire({
            title: '\u00BFEst&aacute; seguro?',
            text: "¡Actualizar\u00E1 un empleado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'S\u00CD, actualizar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let empleado_id = $(this).data("empleado");
                let datos = CapturarDatos();
                let roles = CapturarRoles();
                $.ajax({
                    url: './php/controladores/actualizar_datos.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { datos: JSON.stringify(datos), roles: roles, empleado_id: empleado_id }
                }).done(function(respuesta) {
                    if (respuesta.error == null) {
                        ResetHide();
                        DatosTabla();
                        $("#myModal").modal("hide");
                        Swal.fire(
                            'Actualizado!',
                            'El empleado ha sido actualizado.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                            respuesta.error,
                            'error'
                        )
                    }
                });
            }
        })
    });
});