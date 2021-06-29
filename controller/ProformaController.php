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
        echo $this->render->renderizar("view/proforma.mustache", $data);
        } else {
            header("location: /tpFinalGrupo13");
            exit();
        }
    }

    public function generarProforma(){
        require('third-party/fpdf/fpdf.php');
        $idViaje = $_POST['viaje'];
        $carga = $_POST['carga'];
        $viaticos = $_POST['viaticos'];
        $peaje = $_POST['peaje'];
        $extra = $_POST['extra'];
        $fecha = getdate();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AliasNbPages();



        //$pdf->Image($qr,161, 0, 50, 0, "png");

        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(50, 10, "Proforma Garlopa Company", 0, 1 );

        $pdf->Cell(150, 10, utf8_decode("N° de Viaje: $idViaje"), 1, 1, 'C', 0);
        $pdf->Cell(50, 10, "Fecha", 1);
        $pdf->Cell(100, 10, date('d/m/Y'),1,1,'C');
        $pdf->Cell(50, 10, "", 0, 1);
        $pdf->Cell(50, 10, "Gastos", 0, 1);
        $pdf->Cell(50, 10, "Viaticos", 1, 0);
        $pdf->Cell(100, 10, "$viaticos", 1, 1, 'C', 0);
        $pdf->Cell(50, 10, utf8_decode("Gastos de Peaje"), 1, 0);
        $pdf->Cell(100, 10, "$peaje", 1, 1, 'C', 0);
        $pdf->Cell(50, 10, utf8_decode("Gastos extra"), 1, 0);
        $pdf->Cell(100, 10, "$extra", 1, 1, 'C', 0);
        $pdf->Cell(50, 10, "Email", 1, 0);
        $pdf->Cell(100, 10, "$extra", 1, 1, 'C', 0);


        $pdf->Output("", "Proforma  - ID Viaje $idViaje");
    }


}