Pasos para ejecutar la aplicacion

paso 1:
Importar la base de datos que esta en el archivo "examen.sql"
La version de la base de datos, la creacion de tablas y datos
estan dentro de ese archivo.

Tener en cuenta: Del diseño original de las tablas
En la tabla "empleado_rol" se añadio una columna
llamada "id" y se asigno como llave primaria, esto con el fin
de no tener problemas a la hora de hacer un "delete" en esa tabla.

Configurar las credenciales de conexion a la base de datos mediante
el archivo "scripts/conexion.php" (ya se encuentra configurada
para que funcione con el archivo que se anexo "examen.sql"
teniendo las siguientes credenciales      
     public $servername = "localhost";
     public $username = "root";
     public $password = "";
     public $dbname = "examen";
     public $conn;
)


Paso 2:
Copie y pegue todo el codigo fuente con sus carpetas en un servidor,
en mi caso ejecuté la aplicacion web en un servidor local "xampp".


Paso 3:
Abra en "Google Chrome" el archivo index.php
e interaccione con el aplicativo web. 
Cree, actualice y  elimine usuarios.


Datos tecnicos:

1. Se utilizo bootstrap
2. Se utilizo para los iconos Fontawesome 
3. Se utilizo para las validaciones de los campos jQueryValidate
   (Hubiera deseado poder hacer las validaciones en javascript puro
    El jQueryValidate a veces se queda en aplicaciones web grandes)
4. Se utilizo programacion orientadas a objetos PHP
5. Se utilizo el patron de arquitectura MVC
6. Para los mensajes de error y confirmacion cuando se crea, modifica o
   elimina, se utilizo SweetAlert2
7. Para la tabla se utilizo DataTable


Cualquier inquietud no duden en contactarme
correo: cesar.cuellar26@hotmail.com
cel: 3124253540
nombre: Ing. Cesar Augusto Cuellar
