<?php

class Mensaje
{

  private $IdMensaje;
  private $IdTipoMensaje;
  private $IdUsuario_Remitente;
  private $IdUsuario_Destinatario;
  private $FechaEnvio;
  private $Contenido;
  private $ArchivoAdjunto;
  private $Leido;

  function __construct()
  {
    $this->IdMensaje = null;
    $this->IdTipoMensaje = null;
    $this->IdUsuario_Remitente = null;
    $this->IdUsuario_Destinatario = null;
    $this->FechaEnvio = null;
    $this->Contenido = null;
    $this->ArchivoAdjunto = null;
    $this->Leido = null;
  }

  public function __set($atributo, $value)
  {
    if (property_exists($this, $atributo))
    {
      $this->$atributo = $value;
    }
    else
    {
      echo "Error al encontrar Atributo SET {$atributo} .";
    }
  }

  public function __get($atributo)
  {
    if (property_exists($this, $atributo))
    {
      return $this->$atributo;
    }
    else
    {
      return "Error al encontrar Atributo GET {$atributo} .";
    }

  }

}

?>
