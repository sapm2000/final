<?php
class Conexion
{
	public $db;   // manejo de la conexion a la base de datos    
    private static $dns = "mysql:dbname=fundey;host=localhost"; //paso de nombre del servidor y de la base de datos
    private static $user = "root";  //nombre del usuario en MySQL
    private static $pass = "";     //clave del usuario en MySQL
    private static $instance; 

    public function __construct ()  
    {        
       $this->db = new PDO(self::$dns,self::$user,self::$pass); //donde se crea la conexión a la base de datos usando los PDO (PHP Data Object) 
    } 

    public static function getInstance() //Función que debo llamar en el controlador que me permite utilizar la variable de conexión a la BD
    { 
        if(!isset(self::$instance)) 
        { 
            $object= __CLASS__; 
            self::$instance=new $object; 
        } 
        return self::$instance; 
    }    
}

?>