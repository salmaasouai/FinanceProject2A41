<?php
// addRating.php

// Inclure le fichier de configuration et la classe RatingController
require '../../controller/ratingC.php';

// Vérifier si les données POST existent
$data = json_decode(file_get_contents("php://input"), true);

error_log('Données reçues : ' . print_r($data, true));

// Vérifier si les données POST existent
if(isset($data)) {
    // Créer une instance de la classe RatingController
    $ratingController = new ratingC();

    // Ajouter la notation
    $ratingController->addrating($data);

    // Répondre avec un message de succès
    exit("La notation a été ajoutée avec succès. Data: " . print_r($data, true));
} else {
    // Ajouter un message de débogage en cas d'erreur de récupération des données POST
    error_log("Erreur lors de la récupération des données POST.");
    
    // Répondre avec un message d'erreur
    exit("Erreur lors de la récupération des données.");
}
?>
