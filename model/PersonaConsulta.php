<?php

class PersonaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function limpiar()
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where idPersona>10 and sexo is not null');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    foreach ($registro as $key => $persona)
    {
      $consulta = $this->Conexion->prepare('SELECT p.idPersona FROM persona p, personal pl where pl.idPersona = p.idPersona and p.idPersona = :id');
      $consulta->bindValue(':id', $persona['idPersona']);
      $consulta->execute();
      $registro = $consulta->fetch();
      if (!$registro)
      {
        $consulta = $this->Conexion->prepare('SELECT p.idPersona FROM persona p, usuario u where u.idPersona = p.idPersona and p.idPersona = :id');
        $consulta->bindValue(':id', $persona['idPersona']);
        $consulta->execute();
        $registro = $consulta->fetch();
        if (!$registro)
        {
          $consulta = $this->Conexion->prepare('DELETE FROM persona where idPersona = :id');
          $consulta->bindValue(':id', $persona['idPersona']);
          $consulta->execute();
          $consulta = $this->Conexion->prepare('DELETE FROM telefono where idPersona = :id');
          $consulta->bindValue(':id', $persona['idPersona']);
          $consulta->execute();
        }
      }
    }
  }

  public function existePersonaCrear($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function obtenerIdPersona($ci)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona where CI=:ci');
    $consulta->bindParam(':ci', $ci);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }
  public function listaPersona()
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM persona');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaTelefonos($id)
  {
    $query = "SELECT *
              FROM telefono
              WHERE idPersona = :idPersona";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idPersona', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function edit($persona)
  {
    if ($persona->FechaNacimiento)
    {
      try
    	{
    		$this->Conexion->beginTransaction();

    		$query = 'UPDATE
        					  persona
        				  SET
          					primerNombre =  :primerNombre,
          					segundoNombre = :segundoNombre,
          					apellidoPaterno = :apellidoPaterno,
          					apellidoMaterno = :apellidoMaterno,
          					CI = :CI,
          					idLugarExpedicion = :idLugarExpedicion,
          					fechaNacimiento = :fechaNacimiento,
          					sexo = :sexo,
          					idEstadoCivil = :idEstadoCivil
          				WHERE
          					idPersona = :idPersona';

    		$stmtPersona = $this->Conexion->prepare($query);

    		$stmtPersona->bindValue(':primerNombre', $persona->PrimerNombre);
    		$stmtPersona->bindValue(':segundoNombre', $persona->SegundoNombre);
    		$stmtPersona->bindValue(':apellidoPaterno', $persona->ApellidoPaterno);
    		$stmtPersona->bindValue(':apellidoMaterno', $persona->ApellidoMaterno);
    		$stmtPersona->bindValue(':CI', $persona->CI);
    		$stmtPersona->bindValue(':idLugarExpedicion', $persona->LugarExpedicion);
    		$stmtPersona->bindValue(':fechaNacimiento', $persona->FechaNacimiento);
    		$stmtPersona->bindValue(':sexo', $persona->Sexo);
    		$stmtPersona->bindValue(':idEstadoCivil', $persona->EstadoCivil);
    		$stmtPersona->bindValue(':idPersona', $persona->IdPersona);

    		$stmtPersona->execute();

    		$this->Conexion->commit();
        return true;
    	}
    	catch (Exception $e)
    	{
    		$this->Conexion->rollback();
        return false;
    	}
    }
    else
    {
      try
    	{
    		$this->Conexion->beginTransaction();

    		$query = 'UPDATE
        					  persona
        				  SET
          					primerNombre =  :primerNombre,
          					segundoNombre = :segundoNombre,
          					apellidoPaterno = :apellidoPaterno,
          					apellidoMaterno = :apellidoMaterno,
          					CI = :CI,
          					idLugarExpedicion = :idLugarExpedicion,
          					sexo = :sexo,
          					idEstadoCivil = :idEstadoCivil
          				WHERE
          					idPersona = :idPersona';

    		$stmtPersona = $this->Conexion->prepare($query);

    		$stmtPersona->bindValue(':primerNombre', $persona->PrimerNombre);
    		$stmtPersona->bindValue(':segundoNombre', $persona->SegundoNombre);
    		$stmtPersona->bindValue(':apellidoPaterno', $persona->ApellidoPaterno);
    		$stmtPersona->bindValue(':apellidoMaterno', $persona->ApellidoMaterno);
    		$stmtPersona->bindValue(':CI', $persona->CI);
    		$stmtPersona->bindValue(':idLugarExpedicion', $persona->LugarExpedicion);
    		$stmtPersona->bindValue(':sexo', $persona->Sexo);
    		$stmtPersona->bindValue(':idEstadoCivil', $persona->EstadoCivil);
    		$stmtPersona->bindValue(':idPersona', $persona->IdPersona);

    		$stmtPersona->execute();

    		$this->Conexion->commit();
        return true;
    	}
    	catch (Exception $e)
    	{
    		$this->Conexion->rollback();
        return false;
    	}
    }

  }

  public function existePersonaEditar($id, $ciNew)
  {
    $query = "SELECT *
              FROM persona
              WHERE idPersona != :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $existe = false;
    if ($registro)
    {
      foreach ($registro as $dato)
      {
        if ($dato['CI'] == $ciNew)
        {
          $existe  =  true;
          break;
        }
      }
      return $existe;
    }
    else
    {
      return $existe;
    }
  }

  public function idPersona_1_1($nombre, $apellido)
  {
    $consulta = $this->Conexion->prepare('SELECT idPersona FROM persona where primerNombre = :nombre and apellidoPaterno = :apellido');
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $cantidad = 0;
    foreach ($registro as $key => $reg) {
      $cantidad++;
    }
    if ($cantidad == 1)
    {
      return $registro;
    }
    else
    {
      return null;
    }
  }

  public function idPersona_1_2($nombre, $apellido)
  {
    $consulta = $this->Conexion->prepare('SELECT idPersona FROM persona where primerNombre = :nombre and apellidoMaterno = :apellido');
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $cantidad = 0;
    foreach ($registro as $key => $reg) {
      $cantidad++;
    }
    if ($cantidad == 1)
    {
      return $registro;
    }
    else
    {
      return null;
    }
  }

  public function idPersona_2_1($nombre, $apellido)
  {
    $consulta = $this->Conexion->prepare('SELECT idPersona FROM persona where segundoNombre = :nombre and apellidoPaterno = :apellido');
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $cantidad = 0;
    foreach ($registro as $key => $reg) {
      $cantidad++;
    }
    if ($cantidad == 1)
    {
      return $registro;
    }
    else
    {
      return null;
    }
  }

  public function idPersona_2_2($nombre, $apellido)
  {
    $consulta = $this->Conexion->prepare('SELECT idPersona FROM persona where segundoNombre = :nombre and apellidoMaterno = :apellido');
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $cantidad = 0;
    foreach ($registro as $key => $reg) {
      $cantidad++;
    }
    if ($cantidad == 1)
    {
      return $registro;
    }
    else
    {
      return null;
    }
  }

}

?>
