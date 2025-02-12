<?php 
include "../../controller/eventC.php";

$eventC = new eventC();
$list = $eventC->afficher();

require("C:/wamp64/www/projectfinanceWEB - Copy2/projectfinanceWEB - Copy2/fpdf.php");

class PDF extends FPDF {
    function Header() {
        // Logo
        $this->Image('assets/img/Taktiklogo.png',10,6,30);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // Titre
        $this->Cell(0,10,'Liste des Evenements',0,1,'C');
        // Saut de ligne
        $this->Ln(10);
    }

    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('p','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

// Couleurs personnalisées
$pdf->SetFillColor(112,142,174); // Couleur de fond des cellules
$pdf->SetTextColor(0,0,0); // Couleur du texte

$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,10,"ID",1,0,'C',true);
$pdf->Cell(15,10,"Titre",1,0,'C',true);
$pdf->Cell(40,10,"Date",1,0,'C',true);
$pdf->Cell(30,10,"Time",1,0,'C',true);
$pdf->Cell(30,10,"NbParticipants",1,0,'C',true);
$pdf->Cell(40,10,"detailsEvent",1,0,'C',true);
$pdf->Cell(30,10,"categorie",1,0,'C',true);
$pdf->Ln();

$pdf->SetFont('Arial','',10);

foreach($list as $ticket){
    $pdf->Cell(10,10,$ticket['IdEv'],1,0,'C');
    $pdf->Cell(15,10,$ticket['Titre'],1,0,'L');
    $pdf->Cell(40,10,$ticket['Date'],1,0,'C');
    $pdf->Cell(30,10,$ticket['Time'],1,0,'C');
    $pdf->Cell(30,10,$ticket['NbParticipants'],1,0,'C');
    $pdf->Cell(40,10,$ticket['detailsEvent'],1,0,'L');
    $pdf->Cell(30,10,$ticket['categorie'],1,0,'C');
    $pdf->Ln();
}

$pdf->Output();
?>
