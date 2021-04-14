<?php
    require_once("../../scripts/conexion.php");
     
    class ModeloEmpleados
    {
        public $datos;        
        public $empleado_id;
        public $conn;

        function __construct() {
            $conexion = new conexion();
            $this->conn = $conexion->conn;
        }

        function insert_empleados($datos){
            $this->datos = $datos;
            $data = str_replace('\\', '',$this->datos);
            $data = json_decode($data,true);                
            $campos = array();
            $values = array();
            foreach ($data as $item => $index) {
                $campos[] = $item;
                $values[] = "'".$index."'";
            }
            try {                                
                $sql = "INSERT INTO empleados (".implode(',',$campos).") VALUES(".implode(',',$values).")";
                $stmt = $this->conn->prepare($sql);                
                $stmt->execute();
                return $this->conn->lastInsertId();
            } catch(PDOException $e) {
                echo json_encode($sql . "<br>" . $e->getMessage());
            }              
        }

        function select_empleados($empleado_id = null){
            $this->empleado_id = $empleado_id;
            try {                       
                if ($this->empleado_id != null) {
                    $where = " WHERE id = {$this->empleado_id}";
                }else{
                    $where = "";
                }
                $sql ="SELECT * FROM empleados ".$where;                
                $stmt = $this->conn->prepare($sql);                
                $stmt->execute();
                $empleados = array();
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {        
                        $empleados[] = $fila;
                    //$empleados[] = [$fila['nombre'], $fila['email'], $fila['sexo'], $fila['area_id'], $fila['boletin'], $fila['descripcion']];                    
                }
                
                return $empleados;
            } catch(PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }

        function update_empleados($datos, $empleado_id){
            $this->datos = $datos;
            $this->empleado_id = $empleado_id;
            $data = str_replace('\\', '',$this->datos);
            $data = json_decode($data,true);                
            $sqlArrayset = array();
            foreach($data as $columnas => $valores){
                $sqlArrayset[] = "$columnas = '$valores'";
            }
            try {                                                                               
                $sql = "UPDATE empleados SET ".implode(' , ', $sqlArrayset)." WHERE id = '{$this->empleado_id}'";
                $stmt = $this->conn->prepare($sql);                
                $stmt->execute();
                return $stmt->rowCount();
            } catch(PDOException $e) {
                echo json_encode($sql . "<br>" . $e->getMessage());
            }              
        }

        function delete_empleados($empleado_id){
            $this->empleado_id = $empleado_id;
            try {                       
                $sql = "DELETE FROM empleados WHERE id =  {$this->empleado_id}";
                $this->conn->exec($sql);                       
            } catch(PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }


    }

    class ModeloRoles
    {
        public $datos;        
        public $empleado_id;
        public $conn;

        function __construct($empleado_id) {            
            $this->empleado_id = $empleado_id;
            $conexion = new conexion();
            $this->conn = $conexion->conn;
        }

        function insert_empleado_rol($datos){            
            $this->datos = $datos;
            $data = str_replace('\\', '',$this->datos);
            try {                                
                foreach ($data as $rol => $rol_id) {
                    $sql = "INSERT INTO empleado_rol (empleado_id, rol_id) VALUES('{$this->empleado_id}', '$rol_id')";
                    $stmt = $this->conn->prepare($sql);                
                    $stmt->execute();
                }
                return $this->select_empleado_rol();
            } catch(PDOException $e) {
                echo json_encode($sql . "<br>" . $e->getMessage());
            }
                          
        }

        function select_empleado_rol(){
            try {                               
                $sql ="SELECT * FROM empleado_rol WHERE empleado_id = {$this->empleado_id}";
                $stmt = $this->conn->prepare($sql);                
                $stmt->execute();
                $empleados_rol = array();
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {        
                    $empleados_rol[] = $fila;                    
                }
                return $empleados_rol;
            } catch(PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }

        function update_empleado_rol($datos){            
            $this->datos = $datos;
            $data = str_replace('\\', '',$this->datos);
            try {                                                
                for ($i=0; $i < 3; $i++) { 
                    $sql = "DELETE FROM empleado_rol WHERE id = (SELECT max(id) FROM empleado_rol WHERE empleado_id = {$this->empleado_id})";
                    $this->conn->exec($sql);    
                }                
                foreach ($data as $rol => $rol_id) {
                    $sql = "INSERT INTO empleado_rol (empleado_id, rol_id) VALUES('{$this->empleado_id}', '$rol_id')";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                }
                return $this->select_empleado_rol();
            } catch(PDOException $e) {
                echo json_encode($sql . "<br>" . $e->getMessage());
            }
                          
        }

        function delete_empleado_rol(){
            try {                       
                for ($i=0; $i < 3; $i++) { 
                    $sql = "DELETE FROM empleado_rol WHERE id = (SELECT max(id) FROM empleado_rol WHERE empleado_id = {$this->empleado_id})";
                    $this->conn->exec($sql);    
                }   
            } catch(PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }

    }

    class ModeloArea
    {
        public $area_id;
        public $conn;

        function __construct() {     
            $conexion = new conexion();
            $this->conn = $conexion->conn;       
        }

        function select_area($area_id){
            $this->area_id = $area_id;
            try {                            
                $sql ="SELECT * FROM areas WHERE id = {$this->area_id}";
                $stmt = $this->conn->prepare($sql);                
                $stmt->execute();
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {        
                    $area[] = $fila;
                }
                return $area;
            } catch(PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }

    }
    
?>    