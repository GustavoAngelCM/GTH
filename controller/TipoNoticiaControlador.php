<?php

class TipoNoticiaControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listar()
  {
    $consulta = new TipoNoticiaConsulta($this->Conexion);
    $lista = $consulta->listaTipoNoticia();
    $listaArray = array();
    $i = 0;
    foreach ($lista as $item)
    {
      $tipoNoticia = new TipoNoticia();
      $tipoNoticia->IdTipoNoticia = $item['idTipoNoticia'];
      $tipoNoticia->NombreTipoNoticia = $item['nombreTipoNoticia'];
      $listaArray[$i] = $tipoNoticia;
      $i++;
    }
    return $listaArray;
  }

  public function crear()
  {
    $tipoNoticiaManejador = new TipoNoticiaConsulta($this->Conexion);
    $existe = $tipoNoticiaManejador->existeTipoNoticia($_POST['nombre']);
    if ($existe == false)
    {
      $tipoNoticia = new TipoNoticia();
      $tipoNoticia->NombreTipoNoticia = strtoupper($_POST['nombre']);

      $tipoNoticiaManejador->save($tipoNoticia);
      echo "<p style='color:green'><strong>{$_POST['nombre']} ah sido registrado</strong></p>";
    }
    else
    {
      echo "<p style='color:red'><strong>{$_POST['nombre']} ya existe</strong></p>";
    }
  }

}

?>
