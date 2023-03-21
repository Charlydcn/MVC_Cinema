<?php

class MovieGenre
{
    private string $_genre;
    private array $_movies;

    public function __construct(string $_genre)
    {
        $this->_genre = $_genre;
        $this->_movies = [];
    }

    // ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************

    public function getGenre() // A TESTER
    {
        return $this->_genre;
    }

    public function getMovies()
    {
        $result = "";
        foreach ($this->_movies as $movie) {
            $result .= $movie . "<br>";
        }
        return $result;
    }

    public function getNbMovie()
    {
        return count($this->_movies);
    }

    // *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

    public function setGenre($genre) // A TESTER
    {
        $this->_genre = $genre;
    }

    // *************************************************************************************************

    public function __toString()
    {
        return $this->_genre;
    }

    public function addMovie(Movie $movie)
    {
        $this->_movies[] = $movie;
    }

}



?>