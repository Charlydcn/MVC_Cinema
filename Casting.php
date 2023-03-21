<?php

class Casting
{
    private Role $_role;
    private Actor $_actor;
    private Movie $_movie;

    public function __construct(Role $_role, Actor $_actor, Movie $_movie)
    {
        $this->_role = $_role;
        $this->_actor = $_actor;
        $this->_movie = $_movie;
        $_role->addCasting($this);
        $_actor->addCasting($this);
        $_movie->addCasting($this);
    }

    // ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************

    public function getRole() // A TESTER
    {
        return $this->_role;
    }

    public function getActor() // A TESTER
    {
        return $this->_actor;
    }

    public function getMovie() // A TESTER
    {
        return $this->_movie;
    }

    public function getInfos()
    {
        return "Dans le film <strong>" . $this->_movie . "</strong>,<strong> " . $this->_role . "</strong> a été joué par <strong>" . $this->_actor . "</strong>. ";
    }

    // *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

    public function setRoles($role) // A TESTER
    {
        $this->_role = $role;
    }

    public function setActors($actor) // A TESTER
    {
        $this->_actor = $actor;
    }

    public function setMovie($movie) // A TESTER
    {
        $this->_movie = $movie;
    }

    // *************************************************************************************************

    public function __toString()
    {
        return $this->getActor() . " (" . $this->getRole() . ") ";
    }

}



?>