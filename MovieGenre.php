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

    public function getGenre() // CHECK
    {
        return $this->_genre;
    }

    public function getMovies() // CHECK
    {
        $result = "";
        foreach ($this->_movies as $movie) {
            $result .= $movie . "<br>";
        }
        return $result;
    }

    public function getNbMovies() // CHECK
    {
        return count($this->_movies);
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setGenre($genre) // CHECK
    {
        $this->_genre = $genre;
    }

    public function setMovies(Movie $movie) // CHECK
    {
        $this->_movies[] = $movie;
    }

    // *************************************************************************************************

    public function __toString() // CHECK
    {
        return $this->_genre;
    }

    public function addMovie(Movie $movie)
    {
        $this->_movies[] = $movie;
    }

}



?>