<?php

class MensajeConsulta
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function mensajeLeido($id)
  {
    echo $id;
    try
    {

      $this->Conexion->beginTransaction();

      $query = "UPDATE mensaje SET leido=1 WHERE idMensaje = :idMensaje";

      $stmtMensaje = $this->Conexion->prepare($query);

      $stmtMensaje->bindValue(':idMensaje', $id);

      $stmtMensaje->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function obtenerUsuario($id)
  {
    $query = "SELECT  u.idUsuario
              FROM personal pl, persona p, usuario u
              where pl.idPersona = p.idPersona
              AND p.idPersona = u.idPersona
              AND idPersonal=:id";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
    return $registro;
  }

  public function verificarFelicitacion()
  {
    $anho=date( "Y");
    $query = "SELECT m.idMensaje, u.idTipoUsuario, u.usuario, p.idPersona, p.primerNombre, p.segundoNombre, p.apellidoPaterno, p.apellidoMaterno, m.contenido
              FROM mensaje m, usuario u, persona p
              WHERE m.idUsuario_Remitente = u.idUsuario
              AND u.idPersona = p.idPersona
              AND m.idUsuario_Destinatario = :idUsuario_Destinatario
              AND year(m.fechaEnvio) = :anho
              AND m.idTipoMensaje = 2
              AND m.leido = 0";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idUsuario_Destinatario', $_SESSION['idUsuario']);
    $consulta->bindValue(':anho',$anho);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeFelicitacion($datos, $usuarioId)
  {
    $anho=date( "Y");
    $query = "SELECT idMensaje
              FROM mensaje
              WHERE idUsuario_Remitente = :idUsuario_Remitente
              AND idUsuario_Destinatario = :idUsuario_Destinatario
              AND idTipoMensaje = 2
              AND year(fechaEnvio) = :anho";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':idUsuario_Remitente', $_SESSION['idUsuario']);
    $consulta->bindValue(':idUsuario_Destinatario', $usuarioId['idUsuario']);
    $consulta->bindValue(':anho',$anho);
    $consulta->execute();
    $registro = $consulta->fetchAll();

    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function save($mensaje)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO mensaje (idMensaje, idTipoMensaje, idUsuario_Remitente, idUsuario_Destinatario, fechaEnvio, contenido, archivoAdjunto,	leido)
                VALUES (:idMensaje, :idTipoMensaje, :idUsuario_Remitente, :idUsuario_Destinatario, :fechaEnvio, :contenido, :archivoAdjunto,	:leido)";

      $stmtMensaje = $this->Conexion->prepare($query);

      $stmtMensaje->bindValue(':idMensaje', $mensaje->IdMensaje);
      $stmtMensaje->bindValue(':idTipoMensaje', $mensaje->IdTipoMensaje);
      $stmtMensaje->bindValue(':idUsuario_Remitente', $mensaje->IdUsuario_Remitente);
      $stmtMensaje->bindValue(':idUsuario_Destinatario', $mensaje->IdUsuario_Destinatario);
      $stmtMensaje->bindValue(':fechaEnvio', $mensaje->FechaEnvio);
      $stmtMensaje->bindValue(':contenido', $mensaje->Contenido);
      $stmtMensaje->bindValue(':archivoAdjunto', $mensaje->ArchivoAdjunto);
      $stmtMensaje->bindValue(':leido', $mensaje->Leido);

      $stmtMensaje->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
