<?php
class ProformaController
{

    private $viajeModel;
    private $qrModel;
    private $posicionModel;
    private $render;

    public function __construct(\Render $render, \ViajeModel $viajeModel,\QRModel $qrModel,\PosicionModel $posicionModel)
    {
        $this->render = $render;
        $this->viajeModel = $viajeModel;
        $this->qrModel = $qrModel;
        $this->posicionModel = $posicionModel;
    }

    public function execute()
    {
        $data = array();

        if (isset($_SESSION["logueado"])) {

            echo $this->render->renderizar("view/proforma.mustache");
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function consultarProforma()
    {
        $data = array();
        if (isset($_SESSION["logueado"])) {
            $idProforma = $_POST['idProforma'];
            $data["proforma"]= $this->viajeModel->getViajeById($idProforma);
            echo $this->render->renderizar("view/proforma.mustache", $data);
        }
        else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function generarProforma(){

        if (isset($_SESSION["logueado"]))
        {
            if (isset($_POST['usuario']) && isset($_POST['sucuOrig']) && isset($_POST['sucuDest']) &&
                isset($_POST['cliente']) && isset($_POST['vehiculo']) && isset($_POST['arrastre']) &&
                isset($_POST['fechaOrig']) && isset($_POST['fechaEst']) && isset($_POST['kmEst']) &&
                isset($_POST['combEst']) && isset($_POST['precio']) && isset($_POST['otrosG']))
            {
                $idViaje =  $_POST['viajeId'];
                $usuario = $_POST['usuario'];
                $usuarioId = $_POST['usuarioId'];
                $fechaHoy = date('d/m/Y');
                $sucuOrig = $_POST['sucuOrig'];
                $sucuDest = $_POST['sucuDest'];
                $cliente = $_POST['cliente'];
                $vehiculo = $_POST['vehiculo'];
                $arrastre = $_POST['arrastre'];
                $fechaOrig = $_POST['fechaOrig'];
                $fechaEst = $_POST['fechaEst'];
                $kmEst = $_POST['kmEst'];
                $combEst = $_POST['combEst'];
                $precioCombustibleEstimado = $_POST['precioCombustibleEstimado'];
                $precio = $_POST['precio'];
                $otrosG = $_POST['otrosG'];

                $precioFinal = $precioCombustibleEstimado + $otrosG;

                require('third-party/fpdf/fpdf.php');
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->AliasNbPages();
                $logo = 'public/images/logo.jpeg';


                $kmReales = $this->posicionModel->sumarDatosReales($idViaje)[0]['kmReales'];
                $combustibleReal = $this->posicionModel->sumarDatosReales($idViaje)[0]['combustibleReal'];
                $gastosGenerales = $this->posicionModel->sumarDatosReales($idViaje)[0]['gastosGenerales'];
                $precioCombustible = 90;
                $precioReal = $combustibleReal * $precioCombustible;

                $precioFinalReal = $precioReal + $gastosGenerales;
                $qr = $this->qrModel->generateQRbyId($idViaje);

                isset($this->posicionModel->getFechaInicial($idViaje,$usuarioId)[0]['FechaInicial']) == true  ?
                    $fechaInicioReal = $this->posicionModel->getFechaInicial($idViaje,$usuarioId)[0]['FechaInicial'] : $fechaInicioReal = "Sin registro";

                isset($this->posicionModel->getFechaFinal($idViaje,$usuarioId)[0]['FechaLlegada']) == true  ?
                    $fechaFinalReal = $this->posicionModel->getFechaFinal($idViaje,$usuarioId)[0]['FechaLlegada'] : $fechaFinalReal = "Sin registro";


                $pdf->Image($logo,75, 0, 50, 0, "jpg");
                $pdf->Image($qr,160, 0, 50, 0, "png");

                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "Proforma Garlopa Company", 0, 1 );
                $pdf->Cell(150, 8, utf8_decode("N° de Viaje: $idViaje"), 1, 1, 'C', 0);
                $pdf->Cell(50, 8, "Cliente", 1);
                $pdf->Cell(100, 8, $cliente ,1,1,'C');
                $pdf->Cell(50, 8, "Fecha Salida", 1);
                $pdf->Cell(100, 8, $fechaHoy ,1,1,'C');
                $pdf->Cell(50, 8, "Datos Generales", 0, 1);
                $pdf->Cell(50, 8, "Chofer", 1);
                $pdf->Cell(100, 8, $usuario ,1,1,'C');
                $pdf->Cell(50, 8, "Sucursal Origen", 1);
                $pdf->Cell(100, 8, $sucuOrig ,1,1,'C');
                $pdf->Cell(50, 8, "Sucursal Destino", 1);
                $pdf->Cell(100, 8, $sucuDest ,1,1,'C');
                $pdf->Cell(50, 8, "Patente Camion", 1);
                $pdf->Cell(100, 8, $vehiculo ,1,1,'C');
                $pdf->Cell(50, 8, "Patente Arrastre", 1);
                $pdf->Cell(100, 8, $arrastre ,1,1,'C');

                $pdf->Cell(50, 8, "", 0, 1);

                $pdf->Cell(50, 8, "Datos de Viaje", 0, 0);
                $pdf->Cell(50, 8, "Estimado", 0, 0);
                $pdf->Cell(50, 8, "Real", 0, 0);
                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "Fecha Salida", 1);
                $pdf->Cell(50, 8, $fechaOrig ,1,0,'C');
                $pdf->Cell(50, 8, $fechaInicioReal ,1,1,'C');

                $pdf->Cell(50, 8, "Fecha Llegada", 1);
                $pdf->Cell(50, 8, $fechaEst ,1,0,'C');
                $pdf->Cell(50, 8, $fechaFinalReal ,1,1,'C');

                $pdf->Cell(50, 8, "Kilometros", 1);
                $pdf->Cell(50, 8, $kmEst ." KM" ,1,0,'C');
                $pdf->Cell(50, 8, $kmReales ." KM" ,1,1,'C');

                $pdf->Cell(50, 8, "Litros Combustible", 1);
                $pdf->Cell(50, 8, $combEst ." L",1,0,'C');
                $pdf->Cell(50, 8, $combustibleReal ." L",1,1,'C');

                $pdf->Cell(50, 8, "Precio Combustible", 1);
                $pdf->Cell(50, 8, '$'.$precioCombustible,1,0,'C');
                $pdf->Cell(50, 8, '$'.$precioCombustible,1,1,'C');

                $pdf->Cell(50, 8, "", 0, 1);
                $pdf->Cell(50, 8, "Sub total (KM x L)", 1);
                $pdf->Cell(50, 8, "$".$precioCombustibleEstimado ,1,0,'C');
                $pdf->Cell(50, 8, "$".$precioReal ,1,1,'C');
                $pdf->Cell(50, 8, "", 0, 1);

                $pdf->Cell(50, 8, "Otros Gastos", 1, 0);
                $pdf->Cell(50, 8, "$"."$otrosG", 1, 0, 'C');
                $pdf->Cell(50, 8, "$"."$gastosGenerales", 1, 1, 'C');


                $pdf->Cell(50, 8, "Precio Final", 1, 0);
                $pdf->Cell(50, 8, "$"."$precioFinal", 1, 0, 'C');
                $pdf->Cell(50, 8, "$"."$precioFinalReal", 1, 1, 'C');

                $pdf->Output("D", "Proforma  - ID Viaje $idViaje.pdf");
            } else {
                $_SESSION['mensajeError'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");
            }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }
}