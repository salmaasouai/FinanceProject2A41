<?php 
// Inclusion du fichier contenant la classe pour la gestion des sponsors
include "../../controller/sponsorC.php";

// Création d'une instance de la classe SponsorC pour accéder aux méthodes de gestion des sponsors
$sponsorc = new sponsorC();

// Récupération de la liste des sponsors depuis la base de données
$list = $sponsorc->afficherSponsor();

// Inclusion de la classe FPDF pour la génération du PDF
require("C:/wamp64/www/projectfinanceWEB - Copy2/projectfinanceWEB - Copy2/fpdf.php");

// Création d'une instance de FPDF avec format A4
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->Image('assets/img/Taktiklogo.png',10,10,30); // Chemin du logo, position X, position Y, largeur
$pdf->Ln(5); // Saut de ligne

// Définition du style de police, de la taille et affichage du titre
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(112, 142, 174); // Couleur de fond du titre
$pdf->SetTextColor(255, 255, 255); // Couleur du texte du titre
$pdf->Ln(5); // Saut de ligne
$pdf->Ln(5); // Saut de ligne
$pdf->Ln(5); // Saut de ligne
$pdf->Ln(5); // Saut de ligne

$pdf->Cell(0,10,'Liste de sponsors',1,1,'C',true); // Cellule de titre avec fond coloré
$pdf->Ln(5); // Saut de ligne

// En-tête du tableau avec les noms des colonnes
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(200, 200, 200); // Couleur de fond de l'en-tête
$pdf->SetTextColor(0, 0, 0); // Couleur du texte de l'en-tête
$pdf->Cell(10,10,"ID",1,0,'C',true);
$pdf->Cell(40,10,"Nom du Sponsor",1,0,'C',true);
$pdf->Cell(60,10,"Nom de l'Evenement",1,0,'C',true);
$pdf->Cell(80,10,"Logo du Sponsor",1,0,'C',true);
$pdf->Ln();

// Définition du style de police pour les données du tableau
$pdf->SetFont('Arial','',10);
// En-tête du tableau avec les noms des colonnes
$pdf->Cell(10,10,"idS",1,0,'C');
$pdf->Cell(40,10,"NomSpon",1,0,'C');
$pdf->Cell(60,10,"Nom de l'evenement",1,0,'C');
$pdf->Cell(80,10,"ImgSpon",1,0,'C');
$pdf->Ln();

// Définition du style de police pour les données du tableau
$pdf->SetFont('Arial','',6);

// Boucle sur la liste des sponsors pour afficher les données dans le tableau
foreach($list as $sponsor){
    // Ajout d'une ligne pour chaque sponsor
    $pdf->Cell(10,10,$sponsor['idSponsor'],1,0,'C');
    $pdf->Cell(40,10,$sponsor['NomSpon'],1,0,'C');
    $pdf->Cell(60,10,$sponsor['nom_event'],1,0,'C');
    $pdf->Cell(80,10,$sponsor['ImgSpon'],1,0,'C');
   
    // Passage à la ligne suivante pour le prochain sponsor
    $pdf->Ln();
}

// Génération du PDF
$pdf->Output();
?>
