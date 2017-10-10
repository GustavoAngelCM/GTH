<?php

class FacultadConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaFacultad()
  {
    $query = "SELECT * FROM facultad ORDER BY nombreFacultad";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function save($facultad)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO facultad (idFacultad, nombreFacultad)
                VALUES (:idFacultad, :nombreFacultad)";

      $stmtFacultad = $this->Conexion->prepare($query);

      $stmtFacultad->bindValue(':idFacultad', $facultad->IdFacultad);
      $stmtFacultad->bindValue(':nombreFacultad', $facultad->NombreFacultad);
      $stmtFacultad->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function existeFacultad($name)
  {
    $query = "SELECT
                *
              FROM facultad
              WHERE nombreFacultad = :nombre";
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

}

?>
