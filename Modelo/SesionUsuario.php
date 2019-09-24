<?php
require_once('../Config/ConexionUsuario.php');
class Usuario
{
	private $id, $nombre, $apellido, $usuario, $clave;

	public function __construct()
	{

	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setClave($clave)
	{
		$this->clave = $clave;
	}

	public function getClave()
	{
		return $this->clave;
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function IniciarSesion()
	{
		$con = ConexionUsuario::getInstance();
		$sql = "SELECT * FROM usuarios WHERE usuario='$this->usuario' AND clave='$this->clave'";
		$result = $con->db->prepare($sql);
		$result->execute();
		$sesion = $result->fetchAll(); //Acomoda en un arreglo e resultado de la búsqueda
		return $sesion; //Para que retorne el resultado de la búsqueda
	} //Función que me permite validar la sesión 

}
?>
