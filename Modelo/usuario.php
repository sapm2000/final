<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Usuario extends ClaseBase
{
	private $usuario, $nombre, $apellido, $clave, $n_tel, $n_eme, $correo, $conf_clave;

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

	public function setN_tel($n_tel)
	{
		$this->n_tel = $n_tel;
	}

	public function getN_tel()
	{
		return $this->n_tel;
	}

	public function setN_eme($n_eme)
	{
		$this->n_eme = $n_eme;
	}

	public function getN_eme()
	{
		return $this->n_eme;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setConf_clave($conf_clave)
	{
		$this->conf_clave = $conf_clave;
	}

	public function getConf_clave()
	{
		return $this->conf_clave;
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setClave_vieja($clave_vieja)
	{
		$this->clave_vieja = $clave_vieja;
	}

	public function getClave_vieja()
	{
		return $this->clave_vieja;
	}


	
	public function guardarUsuario()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (nombre,apellido,usuario,clave,n_eme,n_tel,correo,conf_clave,tipo) VALUES ('$this->nombre','$this->apellido','$this->usuario','$this->clave','$this->n_eme','$this->n_tel','$this->correo','$this->conf_clave','$this->tipo')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

	public function modificarUsuario()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET nombre='$this->nombre', apellido='$this->apellido', usuario='$this->usuario', n_tel='$this->n_tel', n_eme='$this->n_eme', correo='$this->correo' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function getByContra()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT clave FROM usuarios WHERE id=$this->id";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
	}

	public function guardarclave()
	{

		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET clave='$this->clave' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}
	public function todoslosusuarios()
	{
		$cc = Conexion::getInstance();
		$sql = "SELECT usuario FROM usuarios";
		$result = $cc->db->prepare($sql);
		$result->execute();
		$trae = $result->fetchAll();
		return ($trae);
		
	}

	public function modificarTipo()
	{
		$con = Conexion::getInstance();
		$sql = "UPDATE $this->tabla SET tipo='$this->tipo' WHERE id=$this->id";
		$result = $con->db->prepare($sql);
		$cambio = $result->execute();
		return $cambio;
	}

	public function IniciarSesion()
	{
		$con = Conexion::getInstance();
		$sql = "SELECT * FROM usuarios WHERE usuario='$this->usuario' AND clave='$this->clave'";
		$result = $con->db->prepare($sql);
		$result->execute();
		$sesion = $result->fetchAll(); //Acomoda en un arreglo e resultado de la búsqueda
		return $sesion; //Para que retorne el resultado de la búsqueda
	} //Función que me permite validar la sesión 

	
}


?>