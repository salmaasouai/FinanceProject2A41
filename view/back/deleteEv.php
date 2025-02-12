<?php
include '../../controller/eventC.php';

$pc=new eventC();

if(isset($_GET["id"])) { // Assurez-vous de vérifier si "id" est défini dans l'URL
    $pc->deleteEvent($_GET["id"]); // Utilisez "id" pour récupérer l'ID de l'événement
}
header('Location:afficher.php');
?>