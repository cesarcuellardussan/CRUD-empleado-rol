function validarDatos() {
    //Validar campo de nombre completo
    jQuery.validator.addMethod('validarNombre', function(value, element) {
        return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
    }, "No se admiten caracteres especiales ni n&uacute;meros");

    jQuery.validator.addMethod("notEqualTo", function(elementValue, element, param) {
        return elementValue != param;
    }, "Por favor seleccione un tipo de &aacute;rea");


    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    $("#formulario").validate({
        rules: {
            nombre: {
                required: true,
                validarNombre: true
            },
            email: {
                required: true,
                email: true
            },
            sexo: {
                required: true
            },
            area_id: {
                required: true,
                notEqualTo: "default"
            },
            descripcion: {
                required: true,
                minlength: 1,
                maxlength: 255
            },
            'roles[]': {
                required: true
            }
        },

        messages: {
            sexo: {
                required: "Por favor seleccione un tipo de sexo"
            },
            area_id: {
                required: "Por favor seleccione un tipo de &aacute;rea"
            },

            'roles[]': {
                required: "Debes marcar al menos 1 casilla"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('#tipo_sexo'));
            } else if (element.is(":checkbox")) {
                error.appendTo(element.parents('#tipo_rol'));
            } else { // This is the default behavior 
                error.insertAfter(element);
            }
        }

    });
}
/*
$(function() {

    //Validar campo de nombre completo
    jQuery.validator.addMethod('validarNombre', function(value, element) {
        return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
    }, "No se admiten caracteres especiales ni n&uacute;meros");

    jQuery.validator.addMethod("notEqualTo", function(elementValue, element, param) {
        return elementValue != param;
    }, "Por favor seleccione un tipo de &aacute;rea");


    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    $("#formulario").validate({
        rules: {
            nombre: {
                required: true,
                validarNombre: true
            },
            email: {
                required: true,
                email: true
            },
            sexo: {
                required: true
            },
            area_id: {
                required: true,
                notEqualTo: "default"
            },
            descripcion: {
                required: true,
                minlength: 1,
                maxlength: 255
            },
            'roles[]': {
                required: true
            }
        },

        messages: {
            sexo: {
                required: "Por favor seleccione un tipo de sexo"
            },
            area_id: {
                required: "Por favor seleccione un tipo de &aacute;rea"
            },

            'roles[]': {
                required: "Debes marcar al menos 1 casilla"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('#tipo_sexo'));
            } else if (element.is(":checkbox")) {
                error.appendTo(element.parents('#tipo_rol'));
            } else { // This is the default behavior 
                error.insertAfter(element);
            }
        }

    });
    
});
*/