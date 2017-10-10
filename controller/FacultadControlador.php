<?php

class FacultadControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consultaF = new FacultadConsulta($this->Conexion);
    $consultaC = new CarreraConsulta($this->Conexion);
    $listaFacultades = $consultaF->listaFacultad();
    $listaCarreras = $consultaC->listaCarrera();
    $listArrayFacuCarr = array();
    $i = 0;
    foreach ($listaFacultades as $listaF)
    {
      $facultad = new Facultad();
      $facultad->IdFacultad = $listaF['idFacultad'];
      $facultad->NombreFacultad = $listaF['nombreFacultad'];
      foreach ($listaCarreras as $listaC)
      {
        if ($facultad->IdFacultad == $listaC['idFacultad'])
        {
          $carrera = new Carrera();
          $carrera->IdCarrera = $listaC['idCarrera'];
          $carrera->IdFacultad = $listaC['idFacultad'];
          $carrera->NombreCarrera = $listaC['nombreCarrera'];
          $facultad->setListaCarreras($carrera);
        }
      }
      $listArrayFacuCarr[$i] = $facultad;
      $i++;
    }
    return $listArrayFacuCarr;
  }

  public function crear()
  {
    $faultadManejador = new FacultadConsulta($this->Conexion);
    $existe = $faultadManejador->existeFacultad($_POST['nombre']);
    if ($existe == false)
    {
      $facultad = new Facultad();
      $facultad->NombreFacultad = strtoupper($_POST['nombre']);

      $faultadManejador->save($facultad);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

}

?>
