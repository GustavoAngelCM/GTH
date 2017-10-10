<?php

class CargoPersonaConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCargos()
  {
    $query = "SELECT * FROM cargoPersona ORDER BY nombreCargoPersona";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeCargoPersona($name)
  {
    $query = "SELECT
                *
              FROM cargoPersona
              WHERE nombreCargoPersona = :nombre";
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

  public function save($cargoPersona)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO cargoPersona (idCargoPersona, nombreCargoPersona)
                VALUES (:idCargoPersona, :nombreCargoPersona)";

      $stmtCargoPersona = $this->Conexion->prepare($query);

      $stmtCargoPersona->bindValue(':idCargoPersona', $cargoPersona->IdCargoPersona);
      $stmtCargoPersona->bindValue(':nombreCargoPersona', $cargoPersona->NombreCargoPersona);
      $stmtCargoPersona->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
