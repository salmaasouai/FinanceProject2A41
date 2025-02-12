<?php
include '../../controller/sponsorC.php';

$pc=new sponsorC();
//exit("mezel delete");
$pc->deleteSponsor($_GET["id"]);

header('Location:afficherS.php');
?>