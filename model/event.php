<?php
class event
{
    private ?int $IdEv = null;
    private ?string $Titre = null;
    private ?string $Date = null;
    private ?string $Time = null;
    private ?int $NbParticipants = null;
    private ?string $detailsEvent = null;
    private ?string $categorie = null;
    private ?string $ImgEv = null;


   
    public function __construct($id=null,$t, $d, $time, $np, $details, $c, $ImgEv)
    {
        $this->IdEv = $id;
        $this->Titre = $t;
        
        // Assurez-vous que $d est une chaîne de caractères au format 'YYYY-MM-DD'
        if ($d instanceof DateTime) {
            $this->Date = $d->format('Y-m-d'); // Formatage de l'objet DateTime en chaîne de caractères
        } else {
            $this->Date = $d; // Utilisez directement la chaîne de caractères fournie
        }
        
        $this->Time = $time;
        $this->NbParticipants= $np;
        $this->detailsEvent = $details;
        $this->categorie= $c;
        $this->ImgEv= $ImgEv;
    }
    
    
    public function getIdEv()
    {
        return $this->IdEv;
    }
    public function getTitre()
    {
        return $this->Titre;
    }
    public function getDate()
    {
        return $this->Date;
    }
    public function getTime()
    {
        return $this->Time;
    }
    public function getNbParticipants()
    {
        return $this->NbParticipants;
    }
    public function getdetailsEvent()
    {
        return $this->detailsEvent;
    }
    public function getcategorie()
    {
        return $this->categorie;
    }
    public function getImgEv()
    {
        return $this->ImgEv;
    }

   
    public function setIdEv($id)
    {
        $this->id = $id;

        return $this;
    }
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }
    public function setTime($Time)
    {
        $this->Time = $Time;

        return $this;
    }
    public function setNbParticipants($NbParticipants)
    {
        $this->NbParticipants = $NbParticipants;

        return $this;
    }
    public function setdetailsEvent($detailsEvent)
    {
        $this->detailsEvent = $detailsEvent;

        return $this;
    }
    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
    public function setImgEv($ImgEv)
    {
        $this->ImgEv = $ImgEv;

        return $this;
    }
    
}
?>