<?php

class CargoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CargoConsulta($this->Conexion);
    $listaCargos = $consulta->listaCargos();
    $listaArrayCargos = array();
    $i = 0;
    foreach ($listaCargos as $listaC)
    {
      $cargo = new Cargo();
      $cargo->IdCargo = $listaC['idCargo'];
      $cargo->NombreCargo = $listaC['nombreCargo'];
      $listaArrayCargos[$i] = $cargo;
      $i++;
    }
    return $listaArrayCargos;
  }

  public function crear()
  {
    $cargoManejador = new CargoConsulta($this->Conexion);
    $existe = $cargoManejador->existeCargo($_POST['nombre']);
    if ($existe == false)
    {
      $cargo = new Cargo();
      $cargo->NombreCargo = strtoupper($_POST['nombre']);

      $cargoManejador->save($cargo);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

}

?>
