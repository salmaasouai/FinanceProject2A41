<?php

class sponsor
{
    private ?int $idSponsor = null;
    private ?string $NomSpon = null;
    private ?int $IdEv = null;
    private ?string $ImgSpon = null;
    

   
    public function __construct($id=null,$n,$t,$d)
    {
        $this->idSponsor = $id;
        $this->NomSpon = $n;
        $this->IdEv = $t;
        $this->ImgSpon= $d;
      
    }

    public function getnom_event()
    {
        return $this->nom_event;
    }
    public function getImgSpon()
    {
        return $this->ImgSpon;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getNomSpon()
    {
        return $this->NomSpon;
    }
    public function getIdEv()
    {
        return $this->IdEv;
    }
    /*public function getimage()
    {
        return $this->imagee;
    }*/
   

   
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function setIdev($IdEv)
    {
        $this->IdEv = $IdEv;

        return $this;
    }
    public function setImgSpon($ImgSpon)
    {
        $this->ImgSpon = $ImgSpon;

        return $this;
    }

}
?>