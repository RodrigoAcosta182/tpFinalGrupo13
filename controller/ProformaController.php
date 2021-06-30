<?php
class ProformaController
{

    private $proformaModel;
    private $render;

    public function __construct(\Render $render, \ProformaModel $proformaModel)
    {
        $this->render = $render;
        $this->proformaModel = $proformaModel;
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
            $data["proforma"]= $this->proformaModel->getProformaById($idProforma);
            echo $this->render->renderizar("view/proforma.mustache", $data);
        }
        else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function generarProforma(){
        $data = array();
        if (isset($_SESSION["logueado"]))
        {
            if (isset($_POST['usuario']) && isset($_POST['sucuOrig']) && isset($_POST['sucuDest']) &&
                isset($_POST['cliente']) && isset($_POST['vehiculo']) && isset($_POST['arrastre']) &&
                isset($_POST['fechaOrig']) && isset($_POST['fechaEst']) && isset($_POST['kmEst']) &&
                isset($_POST['combEst']) && isset($_POST['precio']) && isset($_POST['otrosG']))
            {
                $idProforma =  $_POST['viajeId'];
                $usuario = $_POST['usuario'];
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
                $precio = $_POST['precio'];
                $otrosG = $_POST['otrosG'];

                $precioFinal = $precio + $otrosG;
            } else {
                $_SESSION['mensajeError'] = 1;
                header("Location: /tpFinalGrupo13/Viaje");
            }
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }

        require('third-party/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AliasNbPages();



        //$pdf->Image($logo,161, 0, 50, 0, "png");

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 8, "Proforma Garlopa Company", 0, 1 );

        $pdf->Cell(150, 8, utf8_decode("N° de Viaje: $idProforma"), 1, 1, 'C', 0);
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

        $pdf->Cell(50, 8, "Fecha Estimada Salida", 1);
        $pdf->Cell(100, 8, $fechaOrig ,1,1,'C');

        $pdf->Cell(50, 8, "Fecha Estimada Llegada", 1);
        $pdf->Cell(100, 8, $fechaEst ,1,1,'C');

        $pdf->Cell(50, 8, "Kilometros Estimados", 1);
        $pdf->Cell(100, 8, $kmEst ,1,1,'C');

        $pdf->Cell(50, 8, "Combustibles Estimados", 1);
        $pdf->Cell(100, 8, $combEst ,1,1,'C');


        $pdf->Cell(50, 8, "Gastos", 0, 1);
        $pdf->Cell(50, 8, "Precio de viaje", 1);
        $pdf->Cell(100, 8, $precio ,1,1,'C');
        $pdf->Cell(50, 8, "Otros Gastos", 1, 0);
        $pdf->Cell(100, 8, "$otrosG", 1, 1, 'C', 0);
        $pdf->Cell(50, 8, "Precio Final", 1, 0);
        $pdf->Cell(100, 8, "$precioFinal", 1, 1, 'C', 0);


        $pdf->Output("D", "Proforma  - ID Viaje $idProforma.pdf");
    }
}