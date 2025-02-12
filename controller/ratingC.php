
<?php
 require '../../model/rating.php';
 require '../../controller/alertC.php';

class ratingC
{
    public function afficher()
    {
        $sql = "SELECT * FROM rating";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
   
    public function deleterating($id){
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

    public function addrating($rating)
    {
        $sql = "INSERT INTO rating (rating, IdEv) VALUES (:rating, :IdEv)";
        $db = config::getConnexion();
        try 
        {
            $query = $db->prepare($sql);
            $query->execute
            ([
                'rating' => $rating['rating'],
                'IdEv' => $rating['IdEv']
            ]);
            // Ajouter un message de débogage pour vérifier si l'insertion a réussi
            error_log("La notation a été ajoutée avec succès. Rating: {$rating['rating']}, IdEv: {$rating['IdEv']}");
        } 
        catch (PDOException $e) 
        {
            // Ajouter un message de débogage en cas d'erreur lors de l'insertion
            error_log('Erreur lors de l\'insertion de la notation : ' . $e->getMessage());
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    public function updaterating($rating, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE rating SET 
                    rating = :rating
                WHERE IdEv = :id'
            );
            $query->execute([
                'id' => $id,
                'rating' => $rating['rating']
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Affichez l'erreur PDO pour le débogage
        }
    }

function getrating($id){
    $db = config::getConnexion();
    try{
        $req = $db->prepare('SELECT * FROM rating WHERE IdEv = :id');
        $req->execute(['id' => $id]);
        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e){
        die('error: ' . $e->getMessage());
    }
}

public function calculerMoyenneParIdEv()
{
    $db = config::getConnexion();
    try {
        $sql = "SELECT  IdEv, AVG(rating) AS moyenne FROM rating GROUP BY IdEv";
        $query = $db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


}

