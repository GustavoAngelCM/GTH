<?php

class MensajeControlador
{

  private $Conexion;

  function __construct($conexion)
  {
    $this->Conexion = $conexion;
  }

  public function felicitarFin()
  {
    $manejador = new MensajeConsulta($this->Conexion);
    //var_dump($_POST);
    foreach ($_POST['cumpleId'] as $value) {
      $manejador->mensajeLeido($value);
    }
  }

  public function verificar()
  {
    $manejador = new MensajeConsulta($this->Conexion);
    $resp = $manejador->verificarFelicitacion();
    return $resp;
  }

  public function felicitar()
  {
    $manejador = new MensajeConsulta($this->Conexion);
    $fechaHoy = date( "Y/m/d H:i:s");
    $usuarioId = $manejador->obtenerUsuario($_POST['idCumpleanero']);

    if ($manejador->existeFelicitacion($_POST, $usuarioId) == false)
    {
      if ($usuarioId)
      {
        $mensaje = new Mensaje();
        $mensaje->IdTipoMensaje = 2;
        $mensaje->IdUsuario_Remitente = $_SESSION['idUsuario'];
        $mensaje->IdUsuario_Destinatario = $usuarioId['idUsuario'];
        $mensaje->FechaEnvio = $fechaHoy;
        $mensaje->Contenido = $_POST['mensajeFelicitacion'];
        $mensaje->Leido = 0;

        $manejador->save($mensaje);
        return 1;
      }
      else
      {
        return 2;
      }

    }
    else
    {
      return 0;
    }

  }

}

?>
