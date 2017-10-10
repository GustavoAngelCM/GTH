<?php

class CargoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaCargos()
  {
    $query = "SELECT * FROM cargo ORDER BY nombreCargo";
    $consulta = $this->Conexion->prepare($query);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function existeCargo($name)
  {
    $query = "SELECT
                *
              FROM cargo
              WHERE nombreCargo = :nombre";
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

  public function save($cargo)
  {
    try
    {

      $this->Conexion->beginTransaction();

      $query = "INSERT INTO cargo (idCargo, nombreCargo)
                VALUES (:idCargo, :nombreCargo)";

      $stmtCargo = $this->Conexion->prepare($query);

      $stmtCargo->bindValue(':idCargo', $cargo->IdCargo);
      $stmtCargo->bindValue(':nombreCargo', $cargo->NombreCargo);
      $stmtCargo->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}

?>
