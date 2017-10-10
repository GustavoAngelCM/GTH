<?php

class UsuarioControlador
{
  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear($usuario)
  {
    $resp = 0;
    $consulta =  new UsuarioConsulta($this->Conexion);
    $existe  = $consulta->dataUser($usuario->Usuario);
    if (!$existe)
    {
      $vinculacion = $consulta->existeUsuarioVinculado($usuario->IdPersona);
      if ($vinculacion==false)
      {
        try {

            $this->Conexion->beginTransaction();

            $query = "INSERT INTO usuario (idUsuario, idPersona, idTipoUsuario, usuario, contrasena, estado, borrado)
                      VALUES (:idUsuario, :idPersona, :tipoUsuario, :usuario, :contrasena, :estado, :borrado)";

            $valUsuario = $this->Conexion->prepare($query);

            $valUsuario->bindValue(':idUsuario', $usuario->IdUsuario);
            $valUsuario->bindValue(':idPersona', $usuario->IdPersona);
            $valUsuario->bindValue(':tipoUsuario', $usuario->TipoUsuario);
            $valUsuario->bindValue(':usuario', $usuario->Usuario);
            $valUsuario->bindValue(':contrasena', $usuario->Contrasena);
            $valUsuario->bindValue(':estado', $usuario->Estado);
            $valUsuario->bindValue(':borrado', $usuario->Borrado);


            $valUsuario->execute();

            $this->Conexion->commit();

            $resp = 0;

          } catch (PDOException $e) {

            $this->Conexion->rollBack();

            $resp = 1;

          }
      }
      else
      {
        $resp = 2;
      }

    }
    else
    {
        $resp = 3;
    }
    return $resp;
  }

  public function actualizar()
  {
    $usuarioManejador = new UsuarioConsulta($this->Conexion);
    $existe = $usuarioManejador->existeUsuarioActualizar($_POST);
    if ($existe == false)
    {
      $usuario = new Usuario($_POST['usuario'], $_POST['contrasenaN']);
      $usuario->IdUsuario = $_POST['id'];
      $usuarioManejador->update($usuario);
      return 1;
    }
    else
    {
      return 0;
    }
  }

}

?>
