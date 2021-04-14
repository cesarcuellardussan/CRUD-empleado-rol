<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <!--CDN Bootstrap 4 y Jquery-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>    
    <!--<script src="https://cdn.jsdelivr.net/npm/ jquery-validation@1.19.3 /dist/additional-methods.min.js"></script>    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--LIBRERIA DATATABLE-->    
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>    

    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> 

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.bootstrap4.min.css"> 
    <!--CDN Font-awesome (Iconos)-->    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--CDN SweetAlert 2-->    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--JS -->
    <!--Validaciones-->
    <script src="./js/traduccion_jquery_validate.js"></script>
    <script src="./js/validaciones.js"></script>
    <!--CRUD-->
    <script src="./js/capturar_datos.js"></script>
    <script src="./js/insertar_datos.js"></script>
    <script src="./js/actualizar_datos.js"></script>
    <script src="./js/eliminar_datos.js"></script>
    <script src="./js/llenar_datos_tabla.js"></script>
    <script src="./js/llenar_datos_formulario.js"></script>        
    <!--CSS-->    
    <style> .error { color: #F00; background-color: #FFF;} th, td { white-space: nowrap; } div.dataTables_wrapper { margin: 0 auto;} .swal2-container {z-index: 100000;}</style>
    <script> function ResetHide() {$("#formulario")[0].reset(); $(".titulos , .acciones").hide(); } </script>
    
</head>
<body>
    <?php require_once("./vistas/modal_formulario.html");?>
<br>
    <header class="container">
        <h1>Lista de empleados</h1>
    </header>    
    <nav class="container">        
        <button type="button" id="btn-crear" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal" onclick='ResetHide(); $("#titulo-crear , #guardar").show();'><i class="fas fa-user-plus"></i> Crear</button>
    </nav>

    <?php require_once("./vistas/tabla.html");?>
    <br>
    <?php require_once("./vistas/tabla.html");?>
    
</body>
</html>