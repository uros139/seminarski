
<?php
require('fpdf.php');

class PDF extends FPDF
{

   
// Page header
function Header()
{
    // Logo
    $this->Image('book.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Pravilnik koriscenja sajta',2,2,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,8,'Page '.$this->PageNo().'/{nb}',0,1,'C');
    $this->Cell(0,0,'Autori AD i SD',0,1,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',16);
$pdf->Cell(0,10,'Pravilo 1: Zabranjeno je javno oglasavanje sajta npr.putem drustvenih mreza ;',0,1);
$pdf->Cell(0,10,'Pravilo 2: Zabranjeno je vredjanje i omalozavanje putem sajta;',0,1);
$pdf->Cell(0,10,'Pravilo 3: Sajt je iskljucivo namanjen sadrzaju kao sto su knjige i njihovi autori;',0,1);
 $pdf->Cell(0,10,'Pravilo 4: Svako nepostovanje pravila 1,2,3 bice disciplinski i pravno sankcionisani!!!',0,1);   


$pdf->Output();

?>