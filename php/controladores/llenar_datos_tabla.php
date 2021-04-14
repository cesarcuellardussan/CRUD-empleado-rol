<?php
    $data = array();
    if (isset($_GET['token'])) {
        include("../modelos/modelos.php");
        $empleados = new ModeloEmpleados();
        $areas = new ModeloArea();
        $filas = $empleados->select_empleados();
        foreach ($filas as $campo => $valor) {
            $sexo = $valor['sexo'] == "M" ? "Masculino" : "Femenino";
            $area = $areas->select_area($valor['area_id']);
            $boletin = $valor['boletin'] == 1? "Si":"No";
            $data[] = [ 
                      $valor['nombre'] 
                    , $valor['email']
                    , $sexo
                    , $area[0]['nombre']
                    , $boletin
                    , '<span class="actualizar" data-empleado="'.$valor['id'].'" data-toggle="modal" data-toggle="collapse" href="#actualizar" data-target="#myModal"><i class="far fa-edit fa-lg"></i></span>'
                    , '<span class="eliminar" data-empleado="'.$valor['id'].'" data-toggle="modal" data-toggle="collapse" href="#eliminar" data-target="#myModal"><i class="fas fa-trash-alt fa-lg"></i></span>'
                ];
        }
        echo json_encode(['data' => $data]);
    }else{
        echo json_encode(['data' => $data]);
    }