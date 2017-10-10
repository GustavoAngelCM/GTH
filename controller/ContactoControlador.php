<?php

class ContactoControlador
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeContactosPorDepartamento($idDepartamentoContacto)
  {
      $consulta = new ContactoConsulta($this->Conexion);
      $listaContactosDpto = $consulta-> listaDeContactosPorDepartamento($idDepartamentoContacto);
      $arregloContactosDpto = array();
      $i = 0;
      foreach ($listaContactosDpto as $registroContacto) {
        $contacto = new Contacto();

        $contacto->nombreTipoEmpleado = $registroContacto['tipoempleado'];
        $contacto->nombreResponsabilidad = $registroContacto['responsabilidad'];
        $contacto->idContacto = $registroContacto['idContacto'];
        $contacto->apellidoPaterno = $registroContacto['apellidoPaterno'];
        $contacto->apellidoMaterno = $registroContacto['apellidoMaterno'];
        $contacto->apellidoCasada = $registroContacto['apellidoCasada'];
        $contacto->primerNombre = $registroContacto['primerNombre'];
        $contacto->segundoNombre = $registroContacto['segundoNombre'];
        $contacto->interno = $registroContacto['interno'];
        $contacto->voip = $registroContacto['voip'];
        $contacto->fechaNacimiento = $registroContacto['fechaNacimiento'];
        $contacto->sexo = $registroContacto['sexo'];
        $contacto->emailPersonal = $registroContacto['emailPersonal'];
        $contacto->emailInstitucional = $registroContacto['emailInstitucional'];

        $arregloContactosDpto[$i] = $contacto;
        $i++;
      }
      return $arregloContactosDpto;
  }//end function

  public function crear()
  {
    $manejadorContacto = new ContactoConsulta($this->Conexion);
    $contacto = new Contacto();
    $contacto->idContacto = null;
    $contacto->primerNombre = utf8_decode(ucwords(strtolower($_POST['primerNombre'])));
    $contacto->segundoNombre = utf8_decode(ucwords(strtolower($_POST['segundoNombre'])));
    $contacto->apellidoPaterno = utf8_decode(ucwords(strtolower($_POST['apellidoPaterno'])));
    $contacto->apellidoMaterno = utf8_decode(ucwords(strtolower($_POST['apellidoMaterno'])));
    $contacto->apellidoCasada = null;
    $contacto->sexo=strtoupper($_POST['sexo']);
    $contacto->fechaNacimiento=$_POST['fechaNac'];
    $contacto->interno=$_POST['interno'];
    $contacto->voip=$_POST['voip'];
    $contacto->emailInstitucional=$_POST['emailInstitucional'];
    $contacto->emailPersonal=$_POST['emailPersonal'];
    $contacto->idTipoEmpleado=$_POST['tipoEmpleado'];
    $contacto->idResponsabilidad=$_POST['responsabilidad'];
    $contacto->idDepartamentoContacto=$_POST['departamentoContacto'];
    $manejadorContacto->save($contacto);

    $consultaTelContacto=new TelefonoContactoConsulta($this->Conexion);
    $idContacto=$consultaTelContacto->idContactoMax();

    $telefonoContacto1=new TelefonoContacto();
    $telefonoContacto1->idContacto=$idContacto['id'];
    $telefonoContacto1->tipoTelefono="Celular";
    $telefonoContacto1->numero=$_POST['numero1'];
    $consultaTelContacto->save($telefonoContacto1);
  }

}//end class

?>
