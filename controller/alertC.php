<?php
 require '../../controller/sponsorC.php';
 require '../../model/alert.php';

class alertC
{
    public function afficher()
    {
        $sql = "SELECT * FROM alerts";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    public function rechercher($query)
    {
        $db = config::getConnexion();
        try {
            $sql = "SELECT * FROM alerts WHERE userEmail	 LIKE :query ";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

   /* public function getEventTitre($userEmail) {
        $db = config::getConnexion();
        try {
            $req = $db->prepare('SELECT Titre FROM alerts WHERE userEmail = :userEmail');
            $req->execute(['userEmail' => $userEmail]);
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['Titre'];
            } else {
                return null; // Aucun événement trouvé avec cet identifiant
            }
        } 
        catch (PDOException $e) {
            die('error: ' . $e->getMessage());
        }
    }*/

    public function getAlertByUserAndEvent($userEmail, $Idevent) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM alerts WHERE userEmail = ? AND Idevent = ?");
        $stmt->execute([$userEmail, $Idevent]);
        $alert = $stmt->fetch(PDO::FETCH_ASSOC);
        return $alert; // Renvoie l'alerte si elle existe, sinon null
    }

    public function deleteAlerte($Idevent){
        $db = config::getConnexion();
        try{
            $req = $db->prepare('
                DELETE FROM alerts where Idevent=:Idevent
            ');
            $req->bindValue(':Idevent', $Idevent, PDO::PARAM_INT); // Assurez-vous que $id est un entier
            $req->execute();
        } catch (Exeption $e){
            die('error: ' . $e->getMesssage());
        }
    }

    public function addalerte($userEmail, $eventDate, $eventName, $Idevent)
    {
        $sql = "INSERT INTO alerts (UserEmail, EventDate, EventName, Idevent)
                VALUES (:userEmail, :eventDate, :eventName, :Idevent)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'userEmail' => $userEmail,
                'eventDate' => $eventDate,
                'eventName' => $eventName,
                'Idevent' => $Idevent,
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    



  /*  public function updateEvent($event, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE events SET 
                Titre = :Titre, 
                Date = :Date, 
                Time = :Time, 
                NbParticipants = :NbParticipants,
                detailsEvent= :detailsEvent,
                categorie = :categorie,
                ImgEv     = :ImgEv
            WHERE IdEv = :id'
        );
        $query->execute([
            'id' => $id,
            'Titre' => $event->getTitre(),
            'Date' => $event->getDate(), // Utilisez la date formatée pour MySQL
            'Time' => $event->getTime(),
            'NbParticipants' => $event->getNbParticipants(),
            'detailsEvent' => $event->getdetailsEvent(),
            'categorie' => $event->getcategorie(),
            'ImgEv' => $event->getImgEv()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Affichez l'erreur PDO pour le débogage
    }
}*/


/*function getAlerte($id){
    $db = config::getConnexion();
    try{
        $req = $db->prepare('SELECT * FROM alerts WHERE userEmail = :userEmail');
        $req->execute(['userEmail' => $userEmail]);
        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e){
        die('error: ' . $e->getMessage());
    }
}*/

}

