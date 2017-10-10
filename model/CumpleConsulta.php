

<?php

class CumpleConsulta
{

  private $Conexion;

  function __construct($con)
  {
    $this->Conexion = $con;
  }

  public function listaDeCumples($mes)
  {

    $query = "SELECT pl.rutaFoto,pl.email,p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,tp.nombreTipoPersonal
              FROM personal pl, persona p, tipoPersonal tp
              WHERE pl.idPersona=p.idPersona
              AND pl.idTipoPersonal=tp.idTipoPersonal
              AND  MONTH(p.fechaNacimiento)=:mes
              ORDER BY DAY(p.fechaNacimiento)";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindParam(':mes',$mes);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    return $registro;
  }

  public function listaDeCumpleaneroshoy()
  {
    $mes=date( "m");
    $dia=date( "d");
    $fecha = new DateTime();
    $query = "SELECT pl.idPersonal, p.idPersona ,pl.rutaFoto,pl.email,p.primerNombre,p.apellidoPaterno,p.apellidoMaterno,p.fechaNacimiento,tp.nombreTipoPersonal
              FROM personal pl, persona p, tipoPersonal tp
              WHERE pl.idPersona=p.idPersona
              AND pl.idTipoPersonal=tp.idTipoPersonal
              AND  month(p.fechaNacimiento) = :mes
              AND  day(p.fechaNacimiento) = :dia
              ORDER BY p.primerNombre";
    $consulta = $this->Conexion->prepare($query);
    $consulta->bindValue(':mes',$mes);
    $consulta->bindValue(':dia',$dia);
    $consulta->execute();
    $registro = $consulta->fetchAll();
    // echo "{$mes} y {$dia}";
    // var_dump($fecha);
    // var_dump($registro);
    return $registro;
  }

}

?>
