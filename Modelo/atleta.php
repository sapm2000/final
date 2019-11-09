<?php
require_once("../Config/ClaseBase.php");
require_once("../Config/Conexion.php");
class Atleta extends ClaseBase
{
	private $cedula, $nombre, $apellido, $f_nac, $tipos, $estadoc, $sexo, $id_nivel,$n_eme,$n_tel,$correo,$id_municipio,$id_parroquia,$correol,$empresa,$id_municipio1,$id_parroquia1,$direccion1;

	public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function getCedula()
	{
		return $this->cedula;
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

	public function setF_nac($f_nac)
	{
		$this->f_nac = $f_nac;
	}

	public function getF_nac()
	{
		return $this->f_nac;
	}

	public function setTipos($tipos)
	{
		$this->tipos = $tipos;
	}

	public function getTipos()
	{
		return $this->tipos;
	}

	public function setEstadoc($estadoc)
	{
		$this->estadoc = $estadoc;
	}

	public function getEstadoc()
	{
		return $this->estadoc;
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function setId_nivel($id_nivel)
	{
		$this->id_nivel = $id_nivel;
	}

	public function getId_nivel()
	{
		return $this->id_nivel;
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

	public function setId_municipio($id_municipio)
	{
		$this->id_municipio = $id_municipio;
	}

	public function getId_municipio()
	{
		return $this->id_municipio;
	}
	public function setId_parroquia($id_parroquia)
	{
		$this->id_parroquia = $id_parroquia;
	}

	public function getId_parroquia()
	{
		return $this->id_parroquia;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setId_atleta($id_atleta)
	{
		$this->id_atleta = $id_atleta;
	}

	public function getId_atleta()
	{
		return $this->id_atleta;
	}

	public function setId_discapacidad($id_discapacidad)
	{
		$this->id_discapacidad = $id_discapacidad;
	}

	public function getId_discapacidad()
	{
		return $this->id_discapacidad;
	}

	public function setId_registro_medico($id_registro_medico)
	{
		$this->id_registro_medico = $id_registro_medico;
	}

	public function getId_registro_medico()
	{
		return $this->id_registro_medico;
	}

	public function setId_disciplina($id_disciplina)
	{
		$this->id_disciplina = $id_disciplina;
	}

	public function getId_disciplina()
	{
		return $this->id_disciplina;
	}

	public function setId_modalidad($id_modalidad)
	{
		$this->id_modalidad = $id_modalidad;
	}

	public function getId_modalidad()
	{
		return $this->id_modalidad;
	}

	public function setId_estatus($id_estatus)
	{
		$this->id_estatus = $id_estatus;
	}

	public function getId_estatus()
	{
		return $this->id_estatus;
	}

	public function setBecar($becar)
	{
		$this->becar = $becar;
	}

	public function getBecar()
	{
		return $this->becar;
	}

	public function setId_talla($id_talla)
	{
		$this->id_talla = $id_talla;
	}

	public function getId_talla()
	{
		return $this->id_talla;
	}

	public function setId_calzado($id_calzado)
	{
		$this->id_calzado = $id_calzado;
	}

	public function getId_calzado()
	{
		return $this->id_calzado;
	}

	public function setPeso($peso)
	{
		$this->peso = $peso;
	}

	public function getPeso()
	{
		return $this->peso;

	}

	public function setAltura($altura)
	{
		$this->altura = $altura;
	}

	public function getAltura()
	{
		return $this->altura;

	}

	public function setMano($mano)
	{
		$this->mano = $mano;
	}

	public function getMano()
	{
		return $this->mano;

	}

	public function setNac($nac)
	{
		$this->nac = $nac;
	}

	public function getNac()
	{
		return $this->nac;

	}
	public function setFecha_medica($fecha_medica)
	{
		$this->fecha_medica = $fecha_medica;
	}

	public function getFecha_medica()
	{
		return $this->fecha_medica;

	}

	public function setPrimer($primer)
	{
		$this->primer = $primer;
	}

	public function getPrimer()
	{
		return $this->primer;

	}
	public function setSegundo($segundo)
	{
		$this->segundo = $segundo;
	}

	public function getSegundo()
	{
		return $this->segundo;

	}

	
	
	

	public function guardarAtleta()
	{
		$con = Conexion::getInstance();
		$sql = "INSERT INTO $this->tabla (nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,id_nivel,correo,n_tel,n_eme,id_municipio,id_parroquia,direccion) VALUES ('$this->nac','$this->cedula','$this->nombre','$this->apellido','$this->f_nac','$this->tipos','$this->estadoc','$this->sexo','$this->id_nivel','$this->correo','$this->n_tel','$this->n_eme','$this->id_municipio','$this->id_parroquia','$this->direccion')";
		$result = $con->db->prepare($sql);
		$insert = $result->execute();
		return $insert;
	}

		public function selecmax()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT MAX(id) FROM atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}


		public function guardarDatos()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO datoll (correol,empresa,id_municipio1,id_parroquia1,direccion1,id_atleta) VALUES ('$this->correol','$this->empresa','$this->id_municipio1','$this->parroquia1','$this->direccion1','$this->id_atleta')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}	
		public function agregardatosc()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET correo='$this->correo', n_tel='$this->n_tel', n_eme='$this->n_eme', id_municipio='$this->id_municipio', id_parroquia='$this->id_parroquia', direccion='$this->direccion' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}


		public function modificarDatosp()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET nac='$this->nac', cedula='$this->cedula', nombre='$this->nombre', apellido='$this->apellido', f_nac='$this->f_nac', tipos='$this->tipos', estadoc='$this->estadoc', sexo='$this->sexo', id_nivel='$this->id_nivel' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function updateestado()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET activo=1 WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function updateestado2()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET activo=2 WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function updateestado1()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE atleta SET activo=0 WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function getAllAtleta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.*, tallas.talla, calzados.calzado FROM atleta LEFT OUTER JOIN tallas ON atleta.id_talla=tallas.id LEFT OUTER JOIN calzados ON atleta.id_calzado=calzados.id WHERE activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		public function getAllAtletai()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.*, tallas.talla, calzados.calzado FROM atleta LEFT OUTER JOIN tallas ON atleta.id_talla=tallas.id LEFT OUTER JOIN calzados ON atleta.id_calzado=calzados.id WHERE activo=1";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getAllAtletaglorioso()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.*, tallas.talla, calzados.calzado FROM atleta LEFT OUTER JOIN tallas ON atleta.id_talla=tallas.id LEFT OUTER JOIN calzados ON atleta.id_calzado=calzados.id WHERE activo=2";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}


		public function todoslosatletas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula FROM atleta";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
			
		}

		public function detdiscapacidad()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_discapacidad FROM puente_discapacidad WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetDiscapacidad()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_discapacidad.id AS iddi, discapacidades.discapacidad, atleta.id FROM puente_discapacidad INNER JOIN discapacidades ON puente_discapacidad.id_discapacidad=discapacidades.id INNER JOIN atleta ON puente_discapacidad.id_atleta=atleta.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente1()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_discapacidad (id_atleta,id_discapacidad) VALUES ('$this->id_atleta',$this->id_discapacidad)";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deletedisca()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_discapacidad WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function detregistro_medicos()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_registro_medico FROM puente_registro_medico WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetRegistro_medico()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_registro_medico.id AS idal, puente_registro_medico.fecha_medica, registro_medicos.registro_medico, atleta.id FROM puente_registro_medico INNER JOIN registro_medicos ON puente_registro_medico.id_registro_medico=registro_medicos.id INNER JOIN atleta ON puente_registro_medico.id_atleta=atleta.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_registro_medico (id_atleta,id_registro_medico,fecha_medica) VALUES ('$this->id_atleta','$this->id_registro_medico','$this->fecha_medica')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deleteRegistro_medico()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_registro_medico WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function detdisciplinas()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT id_modalidad FROM puente_disciplina WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function consdetDisciplina()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT puente_disciplina.id AS iddis,estatus.estatu, disciplinas.disciplina,modalidades.modalidad, atleta.id, puente_disciplina.becar FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.id=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function getBbecar()
		{
			$cc=Conexion::getInstance();
			//$sql="SELECT a.*, b.descrip AS std FROM parroquia AS a INNER JOIN municipio AS b ON b.id=a.id_municipio ORDER BY std";
			$sql="SELECT becar FROM puente_disciplina WHERE id_atleta=$this->id_atleta";
			$result=$cc->db->prepare($sql);
			$result->execute();
			$trae=$result->fetchAll();
			return ($trae);
		}

		public function guardarPuente2()
		{
			$con = Conexion::getInstance();
			$sql = "INSERT INTO puente_disciplina (id_atleta,id_disciplina,id_modalidad,id_estatus,becar) VALUES ('$this->id_atleta','$this->id_disciplina','$this->id_modalidad','$this->id_estatus','$this->becar')";
			$result = $con->db->prepare($sql);
			$insert = $result->execute();
			return $insert;
		}

		public function deleteDisciplina()
		{
			$cc = Conexion::getInstance();
			$sql = "DELETE FROM puente_disciplina WHERE id = $this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			return ($result);
		}

		public function getEstatus()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT * FROM puente_disciplina WHERE id=$this->id";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function modificarEstatus()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE puente_disciplina SET id_estatus='$this->id_estatus', becar='$this->becar' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function modificarIndumentaria()
		{
			$con = Conexion::getInstance();
			$sql = "UPDATE $this->tabla SET id_talla='$this->id_talla', id_calzado='$this->id_calzado', altura='$this->altura', peso='$this->peso', mano='$this->mano' WHERE id=$this->id";
			$result = $con->db->prepare($sql);
			$cambio = $result->execute();
			return $cambio;
		}

		public function getDatosPersonales()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getPrimerdigito()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.cedula like '$this->primer%'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getUltimodigito()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.cedula like '%$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		public function getFechaNac()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.f_nac BETWEEN '$this->primer' AND '$this->segundo'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getTiposangre()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.tipos='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getEstadocivil()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.estadoc='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		public function getSsexo()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.sexo='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getnnivel()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and nivels.id='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getNacionalidad()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT nac,cedula,nombre,apellido,f_nac,tipos,estadoc,sexo,nivel FROM atleta INNER JOIN nivels on atleta.id_nivel=nivels.id WHERE atleta.activo=0 and atleta.nac='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getIndumentaria()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getPpeso()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0 AND atleta.peso BETWEEN $this->primer AND $this->segundo";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getAaltura()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0 AND atleta.altura BETWEEN $this->primer AND $this->segundo";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getTtalla()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0 AND  tallas.id=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		
		public function getCcalzado()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0 AND  calzados.id=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getMmano()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,peso,altura,talla,calzado,mano FROM atleta INNER JOIN tallas on atleta.id_talla=tallas.id INNER JOIN calzados ON atleta.id_calzado=calzados.id WHERE atleta.activo=0 AND  atleta.mano='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getContacto()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,correo,n_tel,n_eme,descrip,descrips,direccion FROM atleta INNER JOIN municipio ON atleta.id_municipio=municipio.id INNER JOIN parroquia ON atleta.id_parroquia=parroquia.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getOperadora()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,correo,n_tel,n_eme,descrip,descrips,direccion FROM atleta INNER JOIN municipio ON atleta.id_municipio=municipio.id INNER JOIN parroquia ON atleta.id_parroquia=parroquia.id WHERE atleta.activo=0 and atleta.n_tel like '$this->primer%'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getMmunicipio()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,correo,n_tel,n_eme,descrip,descrips,direccion FROM atleta INNER JOIN municipio ON atleta.id_municipio=municipio.id INNER JOIN parroquia ON atleta.id_parroquia=parroquia.id WHERE atleta.activo=0 and municipio.id=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		public function getPparroquia()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT cedula,nac,correo,n_tel,n_eme,descrip,descrips,direccion FROM atleta INNER JOIN municipio ON atleta.id_municipio=municipio.id INNER JOIN parroquia ON atleta.id_parroquia=parroquia.id WHERE atleta.activo=0 and municipio.id=$this->id_municipio and parroquia.id=$this->id_parroquia";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getBancario()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula AS atlecedula ,atleta.nac AS atlenac,cuenta.nac,cuenta.cedula,cuenta.nombre,cuenta.apellido,bancos.banco,cuenta.numeroc,cuenta.tipo FROM cuenta INNER JOIN atleta ON cuenta.id_atleta=atleta.id INNER JOIN bancos ON cuenta.id_banco=bancos.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getBbancos()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula AS atlecedula ,atleta.nac AS atlenac,cuenta.nac,cuenta.cedula,cuenta.nombre,cuenta.apellido,bancos.banco,cuenta.numeroc,cuenta.tipo FROM cuenta INNER JOIN atleta ON cuenta.id_atleta=atleta.id INNER JOIN bancos ON cuenta.id_banco=bancos.id WHERE atleta.activo=0 AND bancos.id=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function gettipocuenta()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula AS atlecedula ,atleta.nac AS atlenac,cuenta.nac,cuenta.cedula,cuenta.nombre,cuenta.apellido,bancos.banco,cuenta.numeroc,cuenta.tipo FROM cuenta INNER JOIN atleta ON cuenta.id_atleta=atleta.id INNER JOIN bancos ON cuenta.id_banco=bancos.id WHERE atleta.activo=0 AND cuenta.tipo='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getdisandmodhombres()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='M'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function traeDisciplinas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina FROM disciplinas";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function traemodalidades()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT modalidades.modalidad FROM modalidades WHERE modalidades.id_disciplina=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentamodalidadesdefinitivo()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT COUNT(*) FROM modalidades WHERE modalidades.id_disciplina=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentaDisciplina()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT COUNT(*) FROM disciplinas";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function detalledisciplinas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='M' and disciplinas.disciplina='$this->primer' GROUP BY atleta.nombre";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function detallemodalidad()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.nombre,atleta.nac,atleta.apellido,atleta.cedula,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus on puente_disciplina.id_estatus=estatus.id  WHERE modalidades.modalidad='$this->segundo' and atleta.activo=0 and atleta.sexo='M' ORDER BY modalidades.modalidad , atleta.cedula";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function detallemodalidadmujer()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.nombre,atleta.nac,atleta.apellido,atleta.cedula,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus on puente_disciplina.id_estatus=estatus.id  WHERE modalidades.modalidad='$this->segundo' and atleta.activo=0 and atleta.sexo='F' ORDER BY modalidades.modalidad , atleta.cedula";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function detalledisciplinasmujer()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='F' and disciplinas.disciplina='$this->primer' GROUP BY atleta.nombre";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}


		public function cuentapordisciplina()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='M' and disciplinas.disciplina='$this->primer' GROUP BY atleta.nombre ";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentapormodalidad()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT COUNT(*) AS total FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id  WHERE atleta.activo=0 and atleta.sexo='M' and modalidades.modalidad='$this->segundo'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentapormodalidadmujer()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT COUNT(*) AS total FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id  WHERE atleta.activo=0 and atleta.sexo='F' and modalidades.modalidad='$this->segundo'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function traela()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina FROM disciplinas WHERE disciplinas.id='$this->primer'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentapordisciplinamujer()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='F' and disciplinas.disciplina='$this->primer' GROUP BY atleta.nombre ";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}


		public function getdisandmodmujeres()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and atleta.sexo='F'";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getDdisciplinas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and puente_disciplina.id_disciplina=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getEestatus()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and puente_disciplina.id_estatus=$this->primer";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentadisciplinas()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,id_disciplina, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id WHERE atleta.activo=0 GROUP BY id_disciplina ";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentadisciplinashombres()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,id_disciplina, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id WHERE atleta.activo=0 and atleta.sexo='M' GROUP BY id_disciplina ";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
		

		public function cuentadisciplinasmujeres()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,id_disciplina, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id WHERE atleta.activo=0 and atleta.sexo='F' GROUP BY id_disciplina ";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentamodalidades()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,modalidades.modalidad,puente_disciplina.id_modalidad, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id WHERE atleta.activo=0  GROUP BY id_modalidad";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentamodalidadeshombre()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,modalidades.modalidad,puente_disciplina.id_modalidad, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id WHERE atleta.activo=0 AND atleta.sexo='M' GROUP BY id_modalidad";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function cuentamodalidadesmujer()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT disciplinas.disciplina,modalidades.modalidad,puente_disciplina.id_modalidad, COUNT(*) AS total FROM puente_disciplina INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN atleta ON puente_disciplina.id_atleta=atleta.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id WHERE atleta.activo=0 AND atleta.sexo='F' GROUP BY id_modalidad";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getMmodalidad()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.cedula, atleta.nac, atleta.nombre,atleta.apellido,disciplinas.disciplina,modalidades.modalidad,estatus.estatu FROM puente_disciplina INNER JOIN atleta on puente_disciplina.id_atleta=atleta.id INNER JOIN disciplinas ON puente_disciplina.id_disciplina=disciplinas.id INNER JOIN modalidades ON puente_disciplina.id_modalidad=modalidades.id INNER JOIN estatus ON puente_disciplina.id_estatus=estatus.id WHERE atleta.activo=0 and puente_disciplina.id_disciplina=$this->id_disciplina and puente_disciplina.id_modalidad=$this->id_modalidad";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getLlaboral()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.nombre, atleta.apellido,atleta.nac,atleta.cedula,datoll.correol,datoll.empresa,municipio.descrips,parroquia.descrip,datoll.direccion1 from atleta INNER JOIN datoll ON atleta.id=datoll.id_atleta INNER JOIN parroquia ON datoll.id_parroquia1=parroquia.id INNER JOIN municipio  ON datoll.id_municipio1=municipio.id WHERE not datoll.correol='' AND  atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getMedico()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.nombre, atleta.apellido,atleta.nac,atleta.cedula, puente_registro_medico.fecha_medica,registro_medicos.registro_medico  from puente_registro_medico INNER JOIN atleta ON puente_registro_medico.id_atleta=atleta.id INNER JOIN registro_medicos ON puente_registro_medico.id_registro_medico=registro_medicos.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}

		public function getDiscappacidades()
		{
			$cc = Conexion::getInstance();
			$sql = "SELECT atleta.nombre, atleta.apellido,atleta.nac,atleta.cedula, discapacidades.discapacidad FROM puente_discapacidad INNER JOIN atleta ON puente_discapacidad.id_atleta=atleta.id INNER JOIN discapacidades ON puente_discapacidad.id_discapacidad=discapacidades.id WHERE atleta.activo=0";
			$result = $cc->db->prepare($sql);
			$result->execute();
			$trae = $result->fetchAll();
			return ($trae);
		}
}


?>