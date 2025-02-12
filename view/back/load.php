<?php
// load.php

$connect = new PDO('mysql:host=localhost;dbname=events', 'root', '');

$data = array();

// Modifiez la requête pour sélectionner les données nécessaires à partir de la table events
$query = "SELECT IdEv, Titre, Date, Time, NbParticipants, detailsEvent, categorie, ImgEv FROM events ORDER BY Date";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $start_date = $row["Date"]; // Aucun besoin de convertir la date ici, elle est déjà au bon format
    $title = $row["Titre"];
    $data[] = array(
        'id'           => $row["IdEv"],
        'title'        => $title,
        'start'        => $start_date,
        'end'          => $start_date, // Utilisation de la même valeur pour la date de début et de fin
        'time'         => $row["Time"],
        'nbParticipants' => $row["NbParticipants"],
        'detailsEvent' => $row["detailsEvent"],
        'categorie'    => $row["categorie"],
        'imgEv'        => $row["ImgEv"]
    );
}

echo json_encode($data);
?>
