<?php 
require_once "../fpdf/fpdf.php";
require_once '../DAO/historiaDAO.php';
require_once '../DAO/pacienteDAO.php';
//require '../config.php';
class historiaClinicaPDF extends FPDF{
    function Header(){
        $this -> SetFont('Arial', 'B', 15);
        $this -> Cell(60);
        $this -> Cell(70, 10, 'Reporte de historia clinica', 0, 0, 'C');
        $this -> Ln(20);
    }
    
    function Footer(){
        $this -> SetY(-15);
        $this -> SetFont('Arial','I', 8);
        $this -> Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

$pdf = new historiaClinicaPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('Arial', '',14);

$id_historia = $_GET['idhistoria'];
$historia = new historiaDAO();
$paciente = new pacienteDAO();
$historias = $historia -> readOneById2($id_historia);
$pacientes = $paciente -> getName($id_historia);

foreach ($pacientes as $p){
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(54,6,'Nombre: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$p[0],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(54,6,'Apellido: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$p[1],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(54,6,'Correo: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(15,6,$p[2],0,0,'C');
    $pdf->Ln(6);
}

foreach ($historias as $h){
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'ID: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[0],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Peso: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[1],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Altura: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[2],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Motivo de consulta: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[3],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Enfermedades: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[4],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Alergias: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[5],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Medicamentos: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[6],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Antecedentes personales: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[7],0,0,'C');
    $pdf->Ln(6);
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,6,'Antecedentes familiares: ',0,0,'C');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(27,6,$h[8],0,0,'C');
    $pdf->Ln(6);
}

$pdf -> Output();
?>