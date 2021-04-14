var tabla;
var atributosDatatableIndicadores = {
    language: {
        "decimal": "",
        "emptyTable": "No hay informaci&oacute;n",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    "order": [
        [0, "asc"]
    ],
    //"lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
    scrollY: "350px",
    scrollX: true,
    scrollCollapse: true,
    paging: false,
    dom: 'Bfrtip',
    buttons: ['excel'],
    "processing": true
};

function DatosTabla() {
    tabla.ajax.url('./php/controladores/llenar_datos_tabla.php?token=1').load(function(event) { /*code*/ });
}


$(function() {
    tabla = $('#tabla').DataTable(atributosDatatableIndicadores);
    DatosTabla();
});