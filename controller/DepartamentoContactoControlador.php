<?php


class DepartamentoContactoControlador
{

    private $Conexion;

    function __construct($con)
    {
      $this->Conexion = $con;
    }

    public function datosDepartamentoContacto($idTipoDepartamentoContacto)
    {
      $consulta = new DepartamentoContactoConsulta($this->Conexion);
      $datosDepartamento = $consulta->datosDepartamentoContacto($idTipoDepartamentoContacto);
      return $datosDepartamento;
    }//end function

    public function listar()
    {
      $consulta = new DepartamentoContactoConsulta($this->Conexion);
      $listaDepartamentos = $consulta->listaDepartamentoContacto();
      $listaArray = array();
      $i = 0;
      foreach ($listaDepartamentos as $key => $value)
      {
        $departamento = new DepartamentoContacto();
        $departamento->idDepartamentoContacto = $value['idDepartamentoContacto'];
        $departamento->idTipoDepartamentoContacto = $value['idTipoDepartamentoContacto'];
        $departamento->nombre = $value['nombre'];
        $departamento->direccion = $value['direccion'];
        $departamento->email = $value['email'];
        $departamento->direccionWeb = $value['direccionWeb'];
        $departamento->casillaPostal = $value['casillaPostal'];
        $departamento->rutaLogo = $value['rutaLogo'];
        $listaArray[$i] = $departamento;
        $i++;
      }
      return $listaArray;
    }

    public function crear()
    {
      $manejadorDepartamento = new DepartamentoContactoConsulta($this->Conexion);
      $existe = $manejadorDepartamento->existeDepartamento($_POST);
      if ($existe == false)
      {
        $departamento = new DepartamentoContacto();
        $departamento->idDepartamentoContacto = null;
        $departamento->idTipoDepartamentoContacto = 1;
        $departamento->nombre = utf8_decode(strtoupper($_POST['nombre']));
        $departamento->direccion = utf8_decode(ucwords(strtolower($_POST['direccion'])));
        $departamento->email = $_POST['email'];
        $departamento->direccionWeb = ($_POST['web'] == "") ? null : $_POST['web'] ;
        $departamento->casillaPostal = ($_POST['postal'] == "") ? null : $_POST['postal'] ;
        $departamento->rutaLogo = null;

        $manejadorDepartamento->save($departamento);

        $id = $manejadorDepartamento->obtenerId($_POST);
        if ($_POST['fax'] != "")
        {
          $fax = new Fax();
          $fax->idFax = null;
          $fax->idDepartamentoContacto = $id;
          $fax->numero = $_POST['fax'];
          $fax->prefijo = null;

          $faxManejador = new FaxConsulta($this->Conexion);
          $faxManejador->save($fax);
        }
        if ($_POST['telefono'] != "")
        {
          $telefono = new TelefonoDepartamento();
          $telefono->idTelefono = null;
          $telefono->idDepartamentoContacto = $id;
          $telefono->tipoTelefono = "Fijo";
          $telefono->numero = $_POST['telefono'];
          $telefono->prefijo = null;

          $TelefonoManejador = new TelefonoDepartamentoConsulta($this->Conexion);
          $TelefonoManejador->save($telefono);
        }

        return 1;
      }
      else
      {
        return 2;
      }
    }

}//end class

?>
