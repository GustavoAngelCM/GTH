<?php

class DepartamentoContactoConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDepartamentoContacto()
  {
      $query = "SELECT * FROM departamentocontacto ORDER BY nombre";
      $consulta=$this->Conexion->prepare($query);
      $consulta->execute();
      $registro=$consulta->fetchAll();
      return $registro;
  }

  public function datosDepartamentoContacto($idTipoDepartamentoContacto)
  {
      $query =  "SELECT dc.idDepartamentoContacto, dc.nombre, dc.direccion,dc.email,
                        dc.direccionWeb, dc.casillaPostal, dc.rutaLogo
                 FROM tipodepartamentocontacto tdc, departamentocontacto dc
                 WHERE dc.idTipoDepartamentoContacto = :idTipoDepartamentoContacto
                 AND dc.idTipoDepartamentoContacto = tdc.idTipoDepartamentoContacto
                ";

      $consulta=$this->Conexion->prepare($query);
      $consulta->bindParam(':idTipoDepartamentoContacto',$idTipoDepartamentoContacto);
      $consulta->execute();
      //$registro = $consulta->fetchAll();
      $datosDepartamento = $consulta->fetch(PDO::FETCH_ASSOC);
      //$registro = $consulta->fetch();
      return $datosDepartamento;
  }

  public function existeDepartamento($post)
  {
    $query = "SELECT * FROM departamentocontacto where nombre = :nombre";
    $consulta=$this->Conexion->prepare($query);
    $consulta->bindValue(':nombre', $post['nombre']);
    $consulta->execute();
    $registro = $consulta->fetch();
    if ($registro) {
      return true;
    } else {
      return false;
    }
  }

  public function save($departamento)
  {
    try
    {
      $this->Conexion->beginTransaction();

      $query = "INSERT INTO departamentocontacto (idDepartamentoContacto, idTipoDepartamentoContacto, nombre, direccion, email, direccionWeb, casillaPostal, rutaLogo)
                VALUES (:idDepartamentoContacto, :idTipoDepartamentoContacto, :nombre, :direccion, :email, :direccionWeb, :casillaPostal, :rutaLogo)";

      $stmtDepartamento = $this->Conexion->prepare($query);

      $stmtDepartamento->bindValue(':idDepartamentoContacto', $departamento->idDepartamentoContacto);
      $stmtDepartamento->bindValue(':idTipoDepartamentoContacto', $departamento->idTipoDepartamentoContacto);
      $stmtDepartamento->bindValue(':nombre', $departamento->nombre);
      $stmtDepartamento->bindValue(':direccion', $departamento->direccion);
      $stmtDepartamento->bindValue(':email', $departamento->email);
      $stmtDepartamento->bindValue(':direccionWeb', $departamento->direccionWeb);
      $stmtDepartamento->bindValue(':casillaPostal', $departamento->casillaPostal);
      $stmtDepartamento->bindValue(':rutaLogo', $departamento->rutaLogo);

      $stmtDepartamento->execute();

      $this->Conexion->commit();

    }
    catch (PDOException $e)
    {
      $this->Conexion->rollBack();
    }
  }

  public function obtenerId($post)
  {
    $query = "SELECT * FROM departamentocontacto where nombre = :nombre";
    $consulta=$this->Conexion->prepare($query);
    $consulta->bindValue(':nombre', $post['nombre']);
    $consulta->execute();
    $registro = $consulta->fetch();
    $id = $registro['idDepartamentoContacto'];
    return $id;
  }

}//end class
?>
