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

    public function getRole() // CHECK
    {
        return $this->_role;
    }

    public function getActor() // CHECK
    {
        return $this->_actor;
    }

    public function getMovie() // CHECK
    {
        return $this->_movie;
    }

    public function getCastingForMovie() // CHECK
    {
        return $this->_role . " (" . $this->_actor . ") ";
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setRole($role) // CHECK
    {
        $this->_role = $role;
    }

    public function setActor($actor) // CHECK
    {
        $this->_actor = $actor;
    }

    public function setMovie($movie) // CHECK
    {
        $this->_movie = $movie;
    }

    // *************************************************************************************************

    public function __toString()
    {
        return $this->getActor() . " (" . $this->getRole() . ") " . $this->getMovie();
    }

}



?>