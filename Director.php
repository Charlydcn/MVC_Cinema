<?php

class Director extends Person
{
    private array $_movies;

    public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate, )
    {
        parent::__construct($_firstName, $_lastName, $_genre, $_birthDate);
        $this->_movies = [];
    }


    // ************************************************ MÉTHODES ************************************************ 
    // ************************************** ACCESSEURS (getters) **************************************

    public function getMovies() // CHECK
    {
        $result = "<ul>";
        foreach ($this->_movies as $movie) {
            $result .= "<li>" . $movie . "</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setMovies(Movie $movie) // CHECK
    {
        $this->_movies[] = $movie;
    }

    // *************************************************************************************************

    public function addMovie(Movie $movie)
    {
        $this->_movies[] = $movie;
    }

    public function __toString() // CHECK
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }
}

?>