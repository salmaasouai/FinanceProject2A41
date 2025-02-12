<?php
 require '../../controller/ratingC.php';

class eventC
{
    public function afficher()
    {
        $sql = "SELECT * FROM events";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    public function geteventByTitre($titre) {
        $db = config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM events WHERE Titre = ? "); // Utilisez Titre à la place de query
        $stmt->execute([$titre]);
        $alert = $stmt->fetch(PDO::FETCH_ASSOC);
        return $alert; // Renvoie l'alerte si elle existe, sinon null
    }
    


    public function rechercher($query)
    {
        $db = config::getConnexion();
        try {
            $sql = "SELECT * FROM events WHERE Titre LIKE :query OR detailsEvent LIKE :query";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getEventTitre($eventId) {
        $db = config::getConnexion();
        try {
            $req = $db->prepare('SELECT Titre FROM events WHERE IdEv = :id');
            $req->execute(['id' => $eventId]);
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
    }
    public function deleteEvent($id){
        $db = config::getConnexion();
        try{
            $req = $db->prepare('
                DELETE FROM events where IdEv=:id
            ');
            $req->bindValue(':id', $id, PDO::PARAM_INT); // Assurez-vous que $id est un entier
            $req->execute();
        } catch (Exeption $e){
            die('error: ' . $e->getMesssage());
        }
    }

    public function addEvent($event)
{
    $sql = "INSERT INTO events
            VALUES (null, :Titre, :Date, :Time, :NbParticipants, :detailsEvent, :categorie, :ImgEv)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'Titre' => $event->getTitre(),
            'Date' => $event->getDate(), // Utilisez directement la date formatée
            'Time' => $event->getTime(),
            'NbParticipants' => $event->getNbParticipants(),
            'detailsEvent' => $event->getdetailsEvent(),
            'categorie' => $event->getcategorie(),
            'ImgEv' => $event->getImgEv(),
        ]);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    public function updateEvent($event, $id)
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
}


function getEvent($id){
    $db = config::getConnexion();
    try{
        $req = $db->prepare('SELECT * FROM events WHERE IdEv = :id');
        $req->execute(['id' => $id]);
        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e){
        die('error: ' . $e->getMessage());
    }
}

}

