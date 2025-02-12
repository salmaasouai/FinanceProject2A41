<?php
class alert
{
   
    private ?string $userEmail = null;
    private ?string $eventDate = null;
    private ?string $eventName = null;
    private ?int $Idevent = null;
   
    public function __construct( $userEmail,$eventDate,$eventName)
    {
        $this->userEmail = $userEmail;
        $this->eventDate = $eventDate;
        $this->eventName = $eventName;
        $this->Idevent = $Idevent;
       
    }
    
    
    public function geteventName()
    {
        return $this->eventName;
    }

    public function getIdevent()
    {
        return $this->Idevent;
    }
    
    public function getuserEmail()
    {
        return $this->userEmail;
    }
    
    public function geteventDate()
    {
        return $this->eventDate;
    }
    
    public function setuserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function seteventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function seteventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    public function setIdevent($Idevent)
    {
        $this->Idevent = $Idevent;

        return $this;
    }
    
}
?>