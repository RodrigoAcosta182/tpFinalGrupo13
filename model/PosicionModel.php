<?php /** @noinspection ALL */

class PosicionModel{

    private $database;

    public function __construct(\Database $database)
    {
        $this->database = $database;
    }

    public function guardarPosicion($idViaje, $chofer, $fechaHoy, $hora, $latitud, $longitud, $kmReales, $combustibleReal, $gastosGenerales,$patenteVehiculo)
    {
        echo ' '.$idViaje .' ';
        echo ' '.$chofer .' ';

        echo ' '.$fechaHoy .' ';
        echo ' '.$hora .' ';
        echo ' '.$latitud .' ';
        echo ' '.$longitud .' ';
        echo ' '.$kmReales .' ';
        echo ' '.$combustibleReal .' ';
        echo ' '.$gastosGenerales .' ';
        echo ' '.$patenteVehiculo .' ';


        return $this->database->ejecutar("INSERT INTO ubicaciondiaria (pViaje) values ('$idViaje')");


//        return $this->database->ejecutar("INSERT INTO ubicaciondiaria (
//                             pViaje,
//                             pUsuario ,
//                             Fecha,
//                             Hora ,
//                             Latitud ,
//                             Longitud ,
//                             kmReales ,
//                             combustibleReal ,
//                             gastosGenerales ,
//                             pVehiculo)
//                    VALUES ('$idViaje',
//                            '$chofer',
//                            '$fechaHoy',
//                            '$hora' ,
//                            '$latitud',
//                            '$longitud',
//                            '$kmReales',
//                            '$combustibleReal',
//                            '$gastosGenerales',
//                            '$patenteVehiculo')");
    }


}