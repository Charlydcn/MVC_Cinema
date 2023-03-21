<?php

class MovieGenre
{
    private string $_genre;
    private array $_movies;
    private static $_nbMovie = 0;

    public function __construct(string $_genre)
    {
        $this->_genre = $_genre;
        $this->_movies = [];
        self::$_nbMovie++;
    }

    // ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************

    public function getGenre() // A TESTER
    {
        return $this->_genre;
    }

    public function getNbMovie()
    {
        echo self::$_nbMovie;
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

    // public function addMovie(Movie $movie)
// {
//     $this->_movies = $movie;
// }

}



?>