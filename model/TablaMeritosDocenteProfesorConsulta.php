<?php

class TablaMeritosDocenteProfesorConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function existeVersionMerito($versionMerito)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM tablaMeritosDocenteProfesor where version=:versionMerito');
    $consulta->bindParam(':versionMerito', $versionMerito);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

  public function existeMeritoActivoPorTipoMerito($activo,$tipoMerito)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM tablaMeritosDocenteProfesor where tipoMerito=:tipoMerito AND activo = :activo');

    $consulta->bindParam(':tipoMerito', $tipoMerito);
    $consulta->bindParam(':activo', $activo);
    $consulta->execute();
    $registro = $consulta->fetch();

    if ($registro)
    {
      return true;
    }
    else
    {
      return false;
    }

  }


  public function crear($tablaMeritosDocenteProfesor)
  {
    try {
            $this->Conexion->beginTransaction();

            $query = "INSERT INTO tablaMeritosDocenteProfesor (idTablaMeritoDocenteProfesor, version, tipoMerito, fechaCreacion, activo)
                      VALUES (:idTablaMeritoDocenteProfesor, :version, :tipoMerito, :fechaCreacion, :activo)";

            $stmtPersona = $this->Conexion->prepare($query);

            $stmtPersona->bindValue(':idTablaMeritoDocenteProfesor', $tablaMeritosDocenteProfesor->IdTablaMeritosDocenteProfesor);
            $stmtPersona->bindValue(':version', $tablaMeritosDocenteProfesor->Version);
            $stmtPersona->bindValue(':tipoMerito', $tablaMeritosDocenteProfesor->TipoMerito);
            $stmtPersona->bindValue(':fechaCreacion', $tablaMeritosDocenteProfesor->FechaCreacion);
            $stmtPersona->bindValue(':activo', $tablaMeritosDocenteProfesor->Activo);

            $stmtPersona->execute();
            $this->Conexion->commit();

            $ultimoId = $this->ObtenerUltimoId();

            return $ultimoId;

        } catch (PDOException $e) {

            $this->Conexion->rollBack();
            echo "Error al Registrar"  . $e->getMessage();
      }

      return null;
  }// end metodo

    public function ObtenerUltimoId()
    {
        $consulta = $this->Conexion->prepare('SELECT MAX(idTablaMeritoDocenteProfesor) AS idTablaMerito FROM tablaMeritosDocenteProfesor');
        $consulta->execute();
        $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
        //print_r($resultado);
        return $resultado['idTablaMerito'];
    }

  public function listaTablaMeritosDocenteProfesor()
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM tablaMeritosDocenteProfesor');
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function updateDown($tabla)
  {
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  tablameritosdocenteprofesor
                SET
                  activo = 0
                WHERE idTablaMeritoDocenteProfesor = :id";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':id', $tabla->IdTablaMeritosDocenteProfesor);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

  public function updateUp($tabla)
  {
    $consulta = $this->Conexion->prepare('SELECT * FROM tablaMeritosDocenteProfesor WHERE idTablaMeritoDocenteProfesor = :id');
    $consulta->bindValue(':id', $tabla->IdTablaMeritosDocenteProfesor);
    $consulta->execute();
    $registro = $consulta->fetch();
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  tablameritosdocenteprofesor
                SET
                  activo = 0
                WHERE tipoMerito = :tipo";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':tipo', $registro['tipoMerito']);

      $stmtUsuario->execute();

      $this->Conexion->commit();
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
    }
    try
    {
      $this->Conexion->beginTransaction();
      $query = "UPDATE
                  tablameritosdocenteprofesor
                SET
                  activo = 1
                WHERE idTablaMeritoDocenteProfesor = :id";

      $stmtUsuario = $this->Conexion->prepare($query);

      $stmtUsuario->bindValue(':id', $tabla->IdTablaMeritosDocenteProfesor);

      $stmtUsuario->execute();

      $this->Conexion->commit();
      return true;
    }
    catch (Exception $e)
    {
      $this->Conexion->rollBack();
      return false;
    }
  }

}

?>
