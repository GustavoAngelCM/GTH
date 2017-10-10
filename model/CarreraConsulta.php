<?php

class CarreraConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCarrera()
  {
    $query = "SELECT * FROM carrera ORDER BY nombreCarrera";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeCarrera($name)
  {
    $query = "SELECT
                *
              FROM carrera
              WHERE nombreCarrera = :nombre";
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

  public function save($carrera)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO carrera (idCarrera, idFacultad, nombreCarrera)
                VALUES (:idCarrera, :idFacultad, :nombreCarrera)";

      $stmtCarrera = $this->Conexion->prepare($query);

      $stmtCarrera->bindValue(':idCarrera', $carrera->IdCarrera);
      $stmtCarrera->bindValue(':idFacultad', $carrera->IdFacultad);
      $stmtCarrera->bindValue(':nombreCarrera', $carrera->NombreCarrera);
      $stmtCarrera->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
