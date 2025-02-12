<?php
include '../../controller/alertC.php';

$alertController = new alertC();
if(isset($_GET["Idevent"])) {
    $alertController->deleteAlerte($_GET["Idevent"]);
}
header('Location: afficherParticipations.php');
?>
