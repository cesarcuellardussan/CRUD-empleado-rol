<?php
    include("../modelos/modelos.php");
    $data = array();
    if (isset($_POST['empleado_id'])) {        
        $empleado_id = $_POST['empleado_id'];
        $empleados = new ModeloEmpleados();
        $empleados->delete_empleados($empleado_id);
        $empleado_rol = new ModeloRoles($empleado_id);
        $empleado_rol->delete_empleado_rol();
        echo json_encode(['error'=> null]);        
    }else{
        echo json_encode(['error'=> "No llego ningun dato"]);        
    }