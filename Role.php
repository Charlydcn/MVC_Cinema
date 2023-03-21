<?php

class Role
{
    private string $_name;
    private array $_castings;

    public function __construct(string $_name)
    {
        $this->_name = $_name;
    }

    // ************************************************ MÉTHODES ************************************************ 
    // ************************************** ACCESSEURS (getters) *************************************

    public function getName() // CHECK
    {
        return $this->_name;
    }

    public function getActors() // A TESTER
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "</li>" . $casting->getActor() . "</li><br>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function getMovies() // A TESTER
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "</li>" . $casting->getMovie() . "</li><br>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function getCastings()
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "<li>" . $casting . "</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    // ************************************** MUTATEURS (setters) ************************************** 

    public function setName($name) // CHECK
    {
        $this->_name = $name;
    }

    public function setCastings($casting)
    {
        $this->_castings[] = $casting;
    }

    // *************************************************************************************************

    public function addCasting(Casting $casting)
    {
        $this->_castings[] = $casting;
    }

    public function __toString()
    {
        return $this->_name;

    }

}

?>