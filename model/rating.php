<?php

class rating
{
    private ?int $IdEv = null;
    private ?int $rating = null;
   


   
    public function __construct($id,$r)
    {
        $this->IdEv = $id;
        $this->rating = $r;    
    }
    
    
    public function getIdEv()
    {
        return $this->IdEv;
    }
    public function getrating()
    {
        return $this->rating;
    }
   

   
    public function setIdEv($id)
    {
        $this->id = $id;

        return $this;
    }
    public function setrating($r)
    {
        $this->rating = $r;

        return $this;
    }
    
}
?>