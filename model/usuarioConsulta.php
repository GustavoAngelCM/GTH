<?php

class UsuarioConsulta
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function dataUser($nameUser)
  {
    $query = "SELECT * FROM usuario WHERE usuario = :nameUser";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':nameUser', $nameUser);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function listaUsuarioTipo($post)
  {
    $tipo = $post['tipoPersonal']+2;
    $query = "SELECT p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.CI,tu.NombreTipoUsuario,u.usuario,u.contrasena, u.idUsuario, u.estado
              FROM persona p, tipoUsuario tu,usuario u
              WHERE u.idPersona=p.idPersona
              AND u.idTipoUsuario=tu.idTipoUsuario
              AND u.idTipoUsuario = :tipo
              AND u.estado = 1
              ORDER BY p.primerNombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':tipo', $tipo);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaUsuarioRep()
  {
    $query = "SELECT p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.CI,tu.NombreTipoUsuario,u.usuario,u.contrasena, u.idUsuario, u.estado
              FROM persona p, tipoUsuario tu,usuario u
              WHERE u.idPersona=p.idPersona
              AND u.idTipoUsuario=tu.idTipoUsuario
              AND u.idTipoUsuario > 2
              AND u.estado = 1
              ORDER BY p.primerNombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaUsuario()
  {
    $query = "SELECT p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.CI,tu.NombreTipoUsuario,u.usuario,u.contrasena, u.idUsuario, u.estado
              FROM persona p, tipoUsuario tu,usuario u
              WHERE u.idPersona=p.idPersona
              AND u.idTipoUsuario=tu.idTipoUsuario
              AND u.idTipoUsuario != 1
              ORDER BY p.primerNombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeUsuarioVinculado($id)
  {
    $query = "SELECT * FROM usuario WHERE idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
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

  public function obtenerUsuario($id)
  {
    $query = "SELECT * FROM usuario WHERE idPersona = :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function updateDown($usuario)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  usuario
                SET
                  estado = 0
                WHERE idUsuario = :idUsuario";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':idUsuario', $usuario->IdUsuario);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function updateUp($usuario)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  usuario
                SET
                  estado = 1
                WHERE idUsuario = :idUsuario";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':idUsuario', $usuario->IdUsuario);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function existeUsuarioActualizar($post)
  {
    $query = "SELECT * FROM usuario WHERE idUsuario != :id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':id', $post['id']);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    $existe = false;
    foreach ($registro as $key => $value)
    {
      if ($value['usuario'] == $post['usuario'])
      {
        $existe = true;
        break;
      }
    }
    return $existe;
  }

  public function update($usuario)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  usuario
                SET
                  usuario = :usuario,
                  contrasena = :contrasena
                WHERE idUsuario = :idUsuario";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':usuario', $usuario->Usuario);
      $stmtUsuario->bindValue(':contrasena', $usuario->Contrasena);
      $stmtUsuario->bindValue(':idUsuario', $usuario->IdUsuario);

      $stmtUsuario->execute();

      $this->Conexion->commit();
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
    }
  }



}

?>
