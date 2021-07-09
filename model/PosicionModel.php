<?php /** @noinspection ALL */

class PosicionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function listarPosiciones(){
        return $this->database->consulta("SELECT * FROM ubicaciondiaria ub 
                                            INNER JOIN usuario us ON ub.pUsuario = us.Id
                                            INNER JOIN vehiculo ve ON ub.Pvehiculo = ve.Id");
    }

    public function listarPosicionesByIdChofer($idChofer){
        return $this->database->consulta("SELECT * FROM ubicaciondiaria WHERE pUsuario = '$idChofer'");
    }

    public function guardarPosicion($idViaje, $chofer, $fechaHoy, $hora, $latitud, $longitud, $kmReales, $combustibleReal, $gastosGenerales,$vehiculoId)
    {
        return $this->database->ejecutar("INSERT INTO ubicaciondiaria (
                             pViaje,
                             pUsuario ,
                             Fecha,
                             Hora ,
                             Latitud ,
                             Longitud ,
                             kmReales ,
                             combustibleReal ,
                             gastosGenerales ,
                             pVehiculo)
                    VALUES ('$idViaje',
                            '$chofer',
                            '$fechaHoy',
                            '$hora' ,
                            '$latitud',
                            '$longitud',
                            '$kmReales',
                            '$combustibleReal',
                            '$gastosGenerales',
                            '$vehiculoId')");
    }

    public function sumarDatosReales($idViaje)
    {
        return $this->database->consulta("SELECT SUM(kmReales) AS kmReales, 
                                                     SUM(gastosGenerales) AS gastosGenerales,
                                                     SUM(combustibleReal) AS combustibleReal
                                                    FROM ubicaciondiaria 
                                                    WHERE pViaje = '$idViaje'");
    }

    public function getFechaInicial($idViaje,$usuarioId)
    {
        return $this->database->consulta("SELECT MIN(Fecha) AS FechaInicial FROM ubicaciondiaria WHERE pUsuario = '$usuarioId' AND pViaje = '$idViaje' GROUP BY '$idViaje' ");

    }

    public function getFechaFinal($idViaje,$usuarioId)
    {
        return $this->database->consulta("SELECT MAX(Fecha) AS FechaLlegada FROM ubicaciondiaria WHERE pUsuario = '$usuarioId' AND pViaje = '$idViaje' GROUP BY '$idViaje' ");
    }
}