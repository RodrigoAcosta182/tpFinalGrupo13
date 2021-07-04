<?php

class QRModel {

    public function generateQRbyId($idViaje) {
        return "http://localhost/tpFinalgrupo13/third-party/phpqrcode/QRGenerator.php?id=$idViaje";
    }

}