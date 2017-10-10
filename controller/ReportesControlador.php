<?php

class ReportesControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listadoPersonal()
  {
    $personalConsulta = new PersonalConsulta($this->Conexion);
    $listaDePersonal = "";
    if ($_POST['tipoPersonal'] == 0)
    {
      if ($_POST['fechaInicio'] == "" || $_POST['fechaFin'] == "")
      {
        $listaDePersonal = $personalConsulta->todoElPersonal();
      }
      else
      {
        $listaDePersonal = $personalConsulta->todoElPersonalEntre($_POST);
      }
    }
    else
    {
      if ($_POST['fechaInicio'] == "" || $_POST['fechaFin'] == "")
      {
        $listaDePersonal = $personalConsulta->algunPersonal($_POST);
      }
      else
      {
        $listaDePersonal = $personalConsulta->algunPersonalEntre($_POST);
      }
    }

    return $listaDePersonal;
  }

  public function cantidadPersonal()
  {
    $personalConsulta = new PersonalConsulta($this->Conexion);
    $cantidadDePersonal = "";
    if ($_POST['tipoTituloProfesional'] == '0')
    {
      if ($_POST['sexo'] == '0')
      {
        $cantidadDePersonal = $personalConsulta->cantidadTotalPersonalDocente();
      }
      else
      {
        $cantidadDePersonal = $personalConsulta->cantidadTotalSexoPersonalDocente($_POST);
      }
    }
    else
    {
      if ($_POST['sexo'] == 0)
      {
        $cantidadDePersonal = $personalConsulta->cantidadTituloPersonalDocente($_POST);
      }
      else
      {
        $cantidadDePersonal = $personalConsulta->cantidadTituloSexoPersonalDocente($_POST);
      }
    }
    return $cantidadDePersonal;
  }

  public function cantidadTipoPersonal()
  {
    $personalConsulta = new PersonalConsulta($this->Conexion);
    $cantidadDePersonal = "";
    if ($_POST['tipoTituloProfesional'] == '0')
    {
      $cantidadTipoPersonal = $personalConsulta->cantidadTipoPersonal();
    }
    else
    {
      $cantidadTipoPersonal = $personalConsulta->cantidadTipoPersonalTitulo($_POST);
    }
    return $cantidadTipoPersonal;
  }

  public function listadoUsuario()
  {
    $usuarioConsulta = new UsuarioConsulta($this->Conexion);
    $usuarioLista = "";
    if ($_POST['tipoPersonal'] == '0')
    {
      $usuarioLista = $usuarioConsulta->listaUsuarioRep();
    }
    else
    {
      $usuarioLista = $usuarioConsulta->listaUsuarioTipo($_POST);
    }
    return $usuarioLista;

  }

}

?>
