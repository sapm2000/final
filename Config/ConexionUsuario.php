<?php
class ConexionUsuario
{ 
    public $db;
    private static $dns = "mysql:dbname=fundey;host=localhost"; //paso de nombre del servidor y de la base de datos
    private static $user = "root";  //nombre del usuario en MySQL
    private static $pass = "";     //clave del usuario en MySQL
    private static $instance; 

    public function __construct ()  
    {        
       $this->db = new PDO(self::$dns,self::$user,self::$pass);
    } 

    public static function getInstance()
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
