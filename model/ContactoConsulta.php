<?php

class ContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeContactosPorDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT te.nombre as tipoempleado,
                     r.nombre AS responsabilidad,
                     c.idContacto,
                     c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre,
                     c.apellidoCasada,
                     c.sexo,c.interno,c.voip,c.fechaNacimiento,
                     c.emailPersonal,c.emailInstitucional
              FROM  departamentocontacto dc, contacto c, responsabilidad r, tipoempleado te
              WHERE  dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = c.idDepartamentoContacto
              AND c.idTipoEmpleado  = te.idTipoEmpleado
              AND c.idResponsabilidad = r.idResponsabilidad
              ORDER BY c.apellidoPaterno";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaContactosPorDpto = $consulta->fetchAll();
    return $listaContactosPorDpto;
  }//end function

  public function save($contacto)
  {
    try
   {
     // var_dump($contacto);
     $this->Conexion->beginTransaction();

     $query = "INSERT INTO contacto (idContacto, idDepartamentoContacto, idTipoEmpleado, idResponsabilidad,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,apellidoCasada,sexo,fechaNacimiento,interno,voip,emailInstitucional,emailPersonal)
               VALUES (:idContacto,:idDepartamentoContacto,:idTipoEmpleado,:idResponsabilidad,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:apellidoCasada,:sexo,:fechaNacimiento,:interno,:voip,:emailInstitucional,:emailPersonal)";

     $stmtContacto = $this->Conexion->prepare($query);

     $stmtContacto->bindValue(':idContacto', $contacto->idContacto);
     $stmtContacto->bindValue(':idDepartamentoContacto', $contacto->idDepartamentoContacto);
     $stmtContacto->bindValue(':idTipoEmpleado', $contacto->idTipoEmpleado);
     $stmtContacto->bindValue(':idResponsabilidad', $contacto->idResponsabilidad);
     $stmtContacto->bindValue(':primerNombre', $contacto->primerNombre);
     if ($contacto->segundoNombre=="") {
       $stmtContacto->bindValue(':segundoNombre', null);
     }
     else {
       $stmtContacto->bindValue(':segundoNombre', $contacto->segundoNombre);
     }

     $stmtContacto->bindValue(':apellidoPaterno', $contacto->apellidoPaterno);

     if ($contacto->apellidoMaterno=="")
       $stmtContacto->bindValue(':apellidoMaterno', null);
     else
       $stmtContacto->bindValue(':apellidoMaterno', $contacto->apellidoMaterno);

     if ($contacto->apellidoCasada=="")
       $stmtContacto->bindValue(':apellidoCasada', null);
     else
       $stmtContacto->bindValue(':apellidoCasada', $contacto->apellidoCasada);

     $stmtContacto->bindValue(':sexo', $contacto->sexo);

     if ($contacto->fechaNacimiento=="")
       $stmtContacto->bindValue(':fechaNacimiento', null);
     else
       $stmtContacto->bindValue(':fechaNacimiento', $contacto->fechaNacimiento);

     if ($contacto->interno=="")
       $stmtContacto->bindValue(':interno', null);
     else
       $stmtContacto->bindValue(':interno', $contacto->interno);

     if ($contacto->voip=="")
       $stmtContacto->bindValue(':voip', null);
     else
       $stmtContacto->bindValue(':voip', $contacto->voip);

     if ($contacto->emailInstitucional=="")
       $stmtContacto->bindValue(':emailInstitucional', null);
     else
       $stmtContacto->bindValue(':emailInstitucional', $contacto->emailInstitucional);

     if ($contacto->emailPersonal=="")
       $stmtContacto->bindValue(':emailPersonal', null);
     else
       $stmtContacto->bindValue(':emailPersonal', $contacto->emailPersonal);

     $stmtContacto->execute();

     $this->Conexion->commit();

     return true;
   }
   catch (PDOException $e)
   {
     $this->Conexion->rollBack();
   }
  }

}//end class

?>
