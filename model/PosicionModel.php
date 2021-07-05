<?php /** @noinspection ALL */

class PosicionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
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