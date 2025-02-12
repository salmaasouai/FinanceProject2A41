<?php
 require '../../config.php';
 require '../../model/sponsor.php';


class sponsorC
{  
    
    public function afficherSponsor()
{
    $sql = "SELECT sponsors.idSponsor, sponsors.NomSpon,sponsors.ImgSpon, events.Titre as nom_event FROM sponsors INNER JOIN events ON sponsors.IdEv = events.IdEv";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        // Ajout de messages de débogage
        if (!$liste) {
            die('Error: La requête SQL n\'a retourné aucun résultat.');
        }
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}


public function rechercher($query)
{
    $sql = "SELECT * FROM sponsors WHERE NomSpon LIKE :query OR ImgSpon LIKE :query";
    $db = config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':query', "%{$query}%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données
        die('Error: ' . $e->getMessage());
    }
}


    function addSponsor($event)
    {
        $sql = "INSERT INTO sponsors (idSponsor, NomSpon, IdEv, ImgSpon)
        VALUES (null, :NomSpon, :IdEv, :ImgSpon)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
               
                'NomSpon' => $event->getNomSpon(),
                'IdEv' => $event->getIdEv(),
                'ImgSpon'=>$event->getImgSpon()
               
            ]);
        } 
        catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateSponsor($event, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE sponsors SET 
                    NomSpon = :NomSpon, 
                    IdEv = :IdEv,
                    ImgSpon = :ImgSpon 
                WHERE idSponsor = :id'
            );
            $query->execute([
                'id' => $id,
                'NomSpon' => $event->getNomSpon(),
                'IdEv' => $event->getIdEv(),
                'ImgSpon' => $event->getImgSpon()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    

    function getSponsor($id){
        $db = config::getConnexion();
        try{
            $req = $db->prepare('
               SELECT * FROM sponsors  WHERE idSponsor =:id
            ');
            $req->execute([
                'id' =>$id
              
            ]);
            return $req->fetch();
        } catch (Exeption $e){
            die('error: ' . $e->getMesssage());
        }
    
      }
      
      public function getSponsorIdEv($eventId)
      {
          $db = config::getConnexion();
          try {
              $req = $db->prepare('SELECT * FROM sponsors WHERE IdEv = :eventId');
              $req->execute(['eventId' => $eventId]);
              
              $sponsors = [];
              while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                  // Instanciation de l'objet sponsor avec les données de la base de données
                  $sponsor = new sponsor($row['idSponsor'], $row['NomSpon'], $row['IdEv'], $row['ImgSpon']);
                  $sponsors[] = $sponsor;
              }
              
              return $sponsors;
          } catch (Exception $e) {
              die('Error: ' . $e->getMessage());
          }
      }
      
      

      public function deleteSponsor($id) {
        $db = config::getConnexion();
        try {
            $req = $db->prepare('DELETE FROM sponsors WHERE idSponsor = :id');
            $req->bindValue(':id', $id, PDO::PARAM_INT); // Assurez-vous que $id est un entier
            $req->execute();
        } catch (Exception $e) {
            die('error: ' . $e->getMessage());
        }
    }
    public function checkEventExists($eventId)
    {
        try {
            $db = config::getConnexion(); 
            $sql = "SELECT COUNT(*) FROM events WHERE IdEv = :eventId";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':eventId', $eventId);
            $stmt->execute();
            $count = $stmt->fetchColumn(); // Récupère le nombre de lignes retournées par la requête
    
            return $count > 0; // Si le nombre de lignes est supérieur à 0, l'événement existe
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données
            die('Error: ' . $e->getMessage());
        }
    }
    
    

}