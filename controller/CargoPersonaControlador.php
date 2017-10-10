<?php

class CargoPersonaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CargoPersonaConsulta($this->Conexion);
    $listaCargos = $consulta->listaCargos();
    $listaArrayCargos = array();
    $i = 0;
    foreach ($listaCargos as $listaC)
    {
      $cargo = new CargoPersona();
      $cargo->IdCargoPersona = $listaC['idCargoPersona'];
      $cargo->NombreCargoPersona = $listaC['nombreCargoPersona'];
      $listaArrayCargos[$i] = $cargo;
      $i++;
    }
    return $listaArrayCargos;
  }

  public function crear()
  {
    $cargoPersonaManejador = new CargoPersonaConsulta($this->Conexion);
    $existe = $cargoPersonaManejador->existeCargoPersona($_POST['nombre']);
    if ($existe == false)
    {
      $cargoPersona = new CargoPersona();
      $cargoPersona->NombreCargoPersona = strtoupper($_POST['nombre']);

      $cargoPersonaManejador->save($cargoPersona);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

}

?>
