<?php

class Actor extends Person
{

    private array $_castings;

    public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate, Role $_role)
    {
        parent::__construct($_firstName, $_lastName, $_genre, $_birthDate);
        // $_role->addActor($this);
    }

    // ************************************************ MÉTHODES ************************************************ 
    // ************************************** ACCESSEURS (getters) **************************************

    public function getRoles() // CHECK
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "</li>" . $casting->getRole() . "</li><br>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function getMovies() // CHECK
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "</li>" . $casting->getMovie() . "</li><br>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function getCastings() // CHECK
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "<li>" . $casting . "</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setCastings($casting) // CHECK
    {
        $this->_castings[] = $casting;
    }

    // *************************************************************************************************

    public function addCasting(Casting $casting)
    {
        $this->_castings[] = $casting;
    }


    public function __toString() // CHECK
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

}



?>