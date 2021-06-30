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



        //$pdf->Image($qr,161, 0, 50, 0, "png");

        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(50, 10, "Proforma Garlopa Company", 0, 1 );

        $pdf->Cell(150, 10, utf8_decode("N° de Viaje: $idProforma"), 1, 1, 'C', 0);
        $pdf->Cell(50, 10, "Fecha Salida", 1);

        $pdf->Cell(100, 10, date('d/m/Y'),1,1,'C');
        $pdf->Cell(50, 10, "", 0, 1);
        $pdf->Cell(50, 10, "Datos", 0, 1);
        $pdf->Cell(50, 10, "Chofer", 1, 1);
        $pdf->Cell(100, 10, "$usuario", 1, 1, 'C', 0);

        $pdf->Cell(50, 10, "Gastos", 0, 1);
        $pdf->Cell(50, 10, "Otros Gastos", 1, 0);
        $pdf->Cell(100, 10, "$otrosG", 1, 1, 'C', 0);
//        $pdf->Cell(50, 10, utf8_decode("Gastos de Peaje"), 1, 0);
//        $pdf->Cell(100, 10, "$cliente", 1, 1, 'C', 0);
//        $pdf->Cell(50, 10, utf8_decode("Gastos extra"), 1, 0);
//        $pdf->Cell(100, 10, "$sucuOrig", 1, 1, 'C', 0);
//        $pdf->Cell(50, 10, "Email", 1, 0);
//        $pdf->Cell(100, 10, "$precio", 1, 1, 'C', 0);


        $pdf->Output("", "Proforma  - ID Viaje $idProforma");
   }
}