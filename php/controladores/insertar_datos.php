<?php
    include("../modelos/modelos.php");
    $data = array();
    if (isset($_POST['datos']) && isset($_POST['roles'])) {
        $datos = $_POST['datos'];
        $roles = $_POST['roles'];
        $empleados = new ModeloEmpleados();
        $empleado_id = $empleados->insert_empleados($datos);        
        $empleado_rol = new ModeloRoles($empleado_id);
        $empleado_rol->insert_empleado_rol($roles);
        echo json_encode(['error'=> null]);        
    }else{
        echo json_encode(['error'=> "No llego ningun dato o no llegaron completos"]);        
    }