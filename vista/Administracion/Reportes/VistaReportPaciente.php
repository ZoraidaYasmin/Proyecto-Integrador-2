<?php
require('C:/xampp/htdocs/cscomas/fpdf/fpdf.php');
include("C:/xampp/htdocs/cscomas/Logica/action_page.php");

$id=(isset($_GET['id']))?$_GET['id']:"";

//$txthc=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
$consulta=$pdo->prepare("SELECT e.des_especialidad,pa.hc_paciente,pa.nom_paciente,pa.ape_personal,pa.dir_paciente,pa.fn_paciente,pa.est_paciente, c.id_cita,h.fec_horario,h.hor_horario,p.nom_personal,c.consultorio,t.peso,t.temperatura,t.presion FROM triaje t,citas c,horario h,doctor d, personal p,paciente pa,especialidad e WHERE c.id_cita=t.id_cita AND c.id_horario=h.id_horario AND pa.hc_paciente=c.hc_paciente AND e.id_especialidad=h.id_especialidad AND d.id_doctor=h.id_doctor AND d.id_personal=p.id_personal and c.hc_paciente like'$id%'");
$consulta->execute();
$listadoPaciente=$consulta->fetchAll(PDO::FETCH_ASSOC); 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('C:/xampp/htdocs/cscomas/images/Logo_Essalud_Pediatrico2.jpeg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(90,12,'CENTRO DE SALUD DE COMAS',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    $this->Cell(30,10,'PACIENTE',1,0,'C',0);
    $this->Cell(95,10,'NOMBRE DEL PACIENTE',1,0,'C',0);
    $this->Cell(20,10,'DNI',1,0,'C',0);
    $this->Cell(30,10,'NUMERO_DNI',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,10,'',0,1,'C',0);
$pdf->Cell(10,10,'CITA',1,0,'C',0);
$pdf->Cell(20,10,'FECHA',1,0,'C',0);
$pdf->Cell(15,10,'HORA',1,0,'C',0);
$pdf->Cell(80,10,'DOCTOR',1,0,'C',0);
$pdf->Cell(20,10,'CONSUL.',1,0,'C',0);
$pdf->Cell(15,10,'PESO',1,0,'C',0);
$pdf->Cell(15,10,'T°',1,0,'C',0);
$pdf->Cell(15,10,'P°',1,1,'C',0);
foreach($listadoPaciente as $row){
    $pdf->Cell(10,10,$row['id_cita'],1,0,'C',0);
    $pdf->Cell(20,10,$row['fec_horario'],1,0,'C',0);
    $pdf->Cell(15,10,$row['hor_horario'],1,0,'C',0);
    $pdf->Cell(80,10,$row['nom_personal'],1,0,'C',0);
    $pdf->Cell(20,10,$row['consultorio'],1,0,'C',0);
    $pdf->Cell(15,10,$row['peso'],1,0,'C',0);
    $pdf->Cell(15,10,$row['temperatura'],1,0,'C',0);
    $pdf->Cell(15,10,$row['presion'],1,1,'C',0);
}
$pdf->Output();
?>