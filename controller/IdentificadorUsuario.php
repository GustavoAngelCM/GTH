<?php

class IdentificadorUsuario
{

  private $Email;
  private $Conexion;

  function __construct()
  {
    $this->Conexion = new Conexion();
  }

  public function setEmail($email)
  {
    $this->Email = $email;
  }

  public function verificarCorreoIntitucional()
  {

    $correo = explode("@", $this->Email);

    if ($correo[1] === "ing.uab.edu.bo")
    {
      $nombreApellido = explode(".", $correo[0]);
      if ($correo[0] != $nombreApellido[0])
      {
        $idPersona = $this->detectarPersona($nombreApellido);
        if ($idPersona != null)
        {
          $this->buscarUsuario($idPersona);
        }
        else
        {
          header("Location: ../../index.php?modo=AccesDenied");
        }
      }
      else
      {
        header("Location: ../../index.php?modo=AccesDenied");
      }
    }
    else
    {
      header("Location: ../../index.php?modo=AccesDenied");
    }

  }

  public function buscarUsuario($idPersona)
  {
    $usuarioManejador = new UsuarioConsulta($this->Conexion);
    $usuario = $usuarioManejador->obtenerUsuario($idPersona[0]['idPersona']);
    if ($usuario)
    {
      $usuarioObj = new Usuario($usuario['usuario'], $usuario['contrasena']);
      if ($usuario['estado'] == 1)
      {
        $usuarioObj->IdUsuario = $usuario['idUsuario'];
        $usuarioObj->Estado = $usuario['estado'];
        $usuarioObj->Borrado = $usuario['borrado'];
        $usuarioObj->TipoUsuario = $usuario['idTipoUsuario'];
        $usuarioObj->C_Persona = $usuario['idPersona'];
        session_start();
        $sesion = new SesionUsuario($usuarioObj);
        $sesion->crearSession();
        $this->autentificacion($usuarioObj->TipoUsuario);
      }
      else
      {
        header("Location: ../../index.php?modo=AccesDenied");
      }
    }
    else
    {
      header("Location: ../../index.php?modo=AccesDenied");
    }

  }

  public function autentificacion($tipoUsuario)
  {
    switch ($tipoUsuario) {

      case '1':
        header('Location: ../Administrador/');
        break;

      case '3':
        header('Location: ../PersonalAcademico/');
        break;

      case '4':
        header('Location: ../PersonalDePlanta/');
        break;

      case '5':
        header('Location: ../PersonalDeServicio/');
        break;

      case '6':
        header('Location: ../Profesor/');
        break;

      default:
        header("Location: ../../index.php?modo=AccesDenied");
        break;
    }
  }

  public function detectarPersona($nombreApellido)
  {
    $personaManejador = new PersonaConsulta($this->Conexion);
    $nombreApellido_1_1 = $personaManejador->idPersona_1_1($nombreApellido[0], $nombreApellido[1]);
    if ($nombreApellido_1_1 == null)
    {
      $nombreApellido_1_2 = $personaManejador->idPersona_1_2($nombreApellido[0], $nombreApellido[1]);
      if ($nombreApellido_1_2 == null)
      {
        $nombreApellido_2_1 = $personaManejador->idPersona_2_1($nombreApellido[0], $nombreApellido[1]);
        if ($nombreApellido_2_1 == null)
        {
          $nombreApellido_2_2 = $personaManejador->idPersona_2_2($nombreApellido[0], $nombreApellido[1]);
          if ($nombreApellido_2_2 == null)
          {
            return null;
          }
          else
          {
            return $nombreApellido_2_2;
          }
        }
        else
        {
          return $nombreApellido_2_1;
        }
      }
      else
      {
        return $nombreApellido_1_2;
      }
    }
    else
    {
      return $nombreApellido_1_1;
    }
  }

}

?>
