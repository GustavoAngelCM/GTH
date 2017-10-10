<?php

class CarreraControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new CarreraConsulta($this->Conexion);
    $listaCarreras = $consulta->listaCarrera();
    $listArrayCa = array();
    $i = 0;
    foreach ($listaCarreras as $listaC) {
      $carrera =  new Carrera();
      $carrera->IdCarrera = $listaC['idCarrera'];
      $carrera->IdFacultad = $listaC['idFacultad'];
      $carrera->NombreCarrera = $listaC['nombreCarrera'];
      $listArrayCa[$i] = array();
      $i++;
    }
    return $listArrayCa;
  }

  public function crear()
  {
    $carreraManejador = new CarreraConsulta($this->Conexion);
    $existe = $carreraManejador->existeCarrera($_POST['nombre']);
    if ($existe == false)
    {
      $carrera = new Carrera();
      $carrera->NombreCarrera = strtoupper($_POST['nombre']);
      $carrera->IdFacultad = $_POST['facultad'];

      $carreraManejador->save($carrera);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

}

?>
