<?php
    include("../modelos/modelos.php");
    $data = array();
    if (isset($_GET['empleado_id'])) {
        $empleado_id = $_GET['empleado_id'];    

        $empleados = new ModeloEmpleados();
        $DataEmpleados = $empleados->select_empleados($empleado_id);        

        $roles = new ModeloRoles($empleado_id);
        $DataRoles = $roles->select_empleado_rol();

        echo json_encode(['DataEmpleados'=>$DataEmpleados, 'DataRoles'=>$DataRoles]);

    }else{
        echo json_encode(['error'=> "No llego ningun parametro de busqueda"]);
    }