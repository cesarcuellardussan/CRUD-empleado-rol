<?php
    require_once("./scripts/conexion.php");
?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--CDN Font-awesome (Iconos)-->    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>    
</head>
<body>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Crear empleado</h1>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <header class="container">                                        
                    <article class="alert alert-info">
                        Los campos con asterisco (*) son obligatorios 
                    </article>    
                </header>        
                <section class="container">
                    <form class="mx-4" method="POST" action="./php/guardar_datos.php" autocomplete="off">
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">Nombre completo *</label>                        
                            <input type="text" id="nombre" name="nombre" class="form-control form-control-sm col-md-9" placeholder="Nombre completo del empleado">                        
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">Correo electr&oacute;nico *</label>                        
                            <input type="email" id="" name="email" class="form-control form-control-sm col-md-9" placeholder="Correo electr&oacute;nico">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">Sexo *</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sexo">Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sexo">Femenino
                                    </label>
                                </div>                
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">&Aacute;rea *</label>
                            <select class="form-control form-control-sm col-md-9" id="" name="area">
                                <option>Administraci&oacute;n</option>
                                <option>Calidad</option>
                                <option>Producci&oacute;n</option>
                                <option>Ventas</option>                    
                            </select>                
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">Descripci&oacute;n *</label>
                            <textarea class="form-control form-control-sm col-md-9" rows="3" id="descripcion" name="descripcion" placeholder="Descripci&oacute;n de la experiencia del empleado"></textarea>                
                            <!--<input type="email" id="" class="form-control form-control-sm col-md" placeholder="Correo electr&oacute;nico">-->
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold"></label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id="boletin" name="boletin"> Deseo recibir bolet&iacute;n informativo
                                    </label>
                                </div>                    
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold">Roles *</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" name=""> Profesional de proyectos – Desarrollo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id=""> Gerente estrat&eacute;gico
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="" id=""> Auxiliar administrativo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 font-weight-bold"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-info">Guardar</button>  
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<br>
    <header class="container">
        <h1>Lista de empleados</h1>
    </header>    
    <nav class="container">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus"></i> Crear</button>
    </nav>
    <section class="container">
        <table class="table table-striped table-responsive-md">
            <thead>
                <tr>
                    <th><i class="fas fa-user"></i> Nombre</th>
                    <th><i class="fas fa-at"></i> Email</th>                
                    <th><i class="fas fa-venus-mars"></i> Sexo</th>
                    <th><i class="fas fa-briefcase"></i> &Aacute;rea</th>
                    <th><i class="fas fa-envelope"></i> Bolet&iacute;n</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gladis Fern&aacute;ndez</td>
                    <td>gfernandez@example.com</td>
                    <td>Femenino</td>
                    <td>Ventas</td>
                    <td>Si</td>
                    <td class="text-center"><i class="far fa-edit"></i></td>
                    <td class="text-center"><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Felipe G&oacute;mez</td>
                    <td>fgomez@example.com</td>
                    <td>Masculino</td>
                    <td>Calidad</td>
                    <td>No</td>
                    <td class="text-center"><i class="far fa-edit"></i></td>
                    <td class="text-center"><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Adriana Loaiza</td>
                    <td>aloaiza@example.com</td>
                    <td>Femenino</td>
                    <td>Producci&oacute;</td>
                    <td>Si</td>
                    <td class="text-center"><i class="far fa-edit"></i></td>
                    <td class="text-center"><i class="fas fa-trash-alt"></i></td>
                </tr>
            </tbody>
    </table>
    </section>
</body>
</html>