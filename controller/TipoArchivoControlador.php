<?php

class TipoArchivoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function crear()
  {
    $tipoArchivoManejador = new TipoArchivoConsulta($this->Conexion);
    $existe = $tipoArchivoManejador->existeTipoArchivo($_POST['nombre']);
    if ($existe == false)
    {
      $tipoArchivo = new TipoArchivo();
      $tipoArchivo->NombreTipoArchivo = strtoupper($_POST['nombre']);

      $tipoArchivoManejador->save($tipoArchivo);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

  public function listar()
  {
    $consulta = new TipoArchivoConsulta($this->Conexion);
    $listaTipoArchivo = $consulta->listaTipoArchivos();
    $listaArray = array();
    $i = 0;
    foreach ($listaTipoArchivo as $key => $item)
    {
      $tipoArchivo = new TipoArchivo();
      $tipoArchivo->IdTipoArchivo = $item['idTipoArchivo'];
      $tipoArchivo->NombreTipoArchivo = $item['nombreTipoArchivo'];

      $listaArray[$i] = $tipoArchivo;
      $i++;
    }
    return $listaArray;
  }

}

?>
