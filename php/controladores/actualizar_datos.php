<?php
    include("../modelos/modelos.php");
    $data = array();
    if (isset($_POST['datos']) && isset($_POST['roles']) && isset($_POST['empleado_id'])) {
        $datos = $_POST['datos'];
        $roles = $_POST['roles'];
        $empleado_id = $_POST['empleado_id'];
        $empleados = new ModeloEmpleados();
        $empleados->update_empleados($datos, $empleado_id);
        $empleado_rol = new ModeloRoles($empleado_id);
        $empleado_rol->update_empleado_rol($roles);
        echo json_encode(['error'=> null]);        
    }else{
        echo json_encode(['error'=> "No llego ningun dato o no llegaron completos"]);        
    }