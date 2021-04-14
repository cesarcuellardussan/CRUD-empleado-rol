$(function() {
    //Insertar datos en tablas
    $(document).on('click', "#guardar", function(event) {
        validarDatos();
        if ($("#formulario").valid() == false) {
            return;
        }
        Swal.fire({
            title: '\u00BFEst&aacute; seguro?',
            text: "¡Crear\u00E1 un empleado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'S\u00CD, crearlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let datos = CapturarDatos();
                let roles = CapturarRoles();
                $.ajax({
                    url: './php/controladores/insertar_datos.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { datos: JSON.stringify(datos), roles: roles }
                }).done(function(respuesta) {
                    if (respuesta.error == null) {
                        ResetHide();
                        DatosTabla();
                        $("#myModal").modal("hide");
                        Swal.fire(
                            'Creado!',
                            'El empleado ha sido creado.',
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