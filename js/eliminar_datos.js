$(function() {
    //Eliminar datos en tablas
    $(document).on('click', "#eliminar", function(event) {
        validarDatos();
        if ($("#formulario").valid() == false) {
            return;
        }
        Swal.fire({
            title: '\u00BFEst&aacute; seguro?',
            text: "¡Eliminar\u00E1 un empleado!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'S\u00CD, eliminarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let empleado_id = $(this).data("empleado");
                $.ajax({
                    url: './php/controladores/eliminar_datos.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { empleado_id: empleado_id }
                }).done(function(respuesta) {
                    if (respuesta.error == null) {
                        ResetHide();
                        DatosTabla();
                        $("#myModal").modal("hide");
                        Swal.fire(
                            'Eliminado!',
                            'El empleado ha sido eliminado.',
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