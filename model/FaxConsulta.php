<?php

class FaxConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaFaxDepartamento($idDepartamentoContacto)
  {
    $query = "SELECT f.prefijo, f.numero
              FROM departamentocontacto dc, fax f
              WHERE dc.idDepartamentoContacto = :idDepartamentoContacto
              AND dc.idDepartamentoContacto = f.idDepartamentoContacto
              ";

    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':idDepartamentoContacto', $idDepartamentoContacto);
    $consulta->execute();
    $listaFax = $consulta->fetchAll();
    return $listaFax;
  }

  public function save($fax)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO fax (idFax, idDepartamentoContacto, numero, prefijo)
                VALUES (:idFax, :idDepartamentoContacto, :numero, :prefijo)";

      $stmtFax = $this->Conexion->prepare($query);

      $stmtFax->bindValue(':idFax', $fax->idFax);
      $stmtFax->bindValue(':idDepartamentoContacto', $fax->idDepartamentoContacto);
      $stmtFax->bindValue(':numero', $fax->numero);
      $stmtFax->bindValue(':prefijo', $fax->prefijo);

      $stmtFax->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

}//end class

?>
