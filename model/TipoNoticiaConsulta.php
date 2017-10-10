<?php

class TipoNoticiaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaTipoNoticia()
  {
    $query = "SELECT *
              FROM tipoNoticia";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    return $resultado;
  }

  public function existeTipoNoticia($name)
  {
    $query = "SELECT
                *
              FROM tipoNoticia
              WHERE nombreTipoNoticia = :nombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':nombre', $name);
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

  public function save($tipoNoticia)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO tipoNoticia (idTipoNoticia, nombreTipoNoticia)
                VALUES (:idTipoNoticia, :nombreTipoNoticia)";

      $stmtTipoNoticia = $this->Conexion->prepare($query);

      $stmtTipoNoticia->bindValue(':idTipoNoticia', $tipoNoticia->IdTipoNoticia);
      $stmtTipoNoticia->bindValue(':nombreTipoNoticia', $tipoNoticia->NombreTipoNoticia);
      $stmtTipoNoticia->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
