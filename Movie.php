<?php

class Movie
{
    private string $_title;
    private MovieGenre $_movieGenre;
    private DateTime $_releaseDate;
    private int $_duration;
    private Director $_director;
    private array $_castings;
    private string $_synopsis;

    public function __construct(string $_title, MovieGenre $_movieGenre, string $_releaseDate, int $_duration, Director $_director, string $_synopsis)
    {
        $this->_title = $_title;
        $this->_movieGenre = $_movieGenre;
        $this->_releaseDate = new DateTime($_releaseDate);
        $this->_duration = $_duration;
        $this->_director = $_director;
        $_director->addMovie($this);
        $this->_castings = [];
        $this->_synopsis = $_synopsis;
        $_movieGenre->addMovie($this);
    }

    // ************************************************ MÉTHODES ************************************************ 
    // ************************************** ACCESSEURS (getters) **************************************

    public function getTitle() // CHECK
    {
        return $this->_title;
    }

    public function getMovieGenre() // CHECK
    {
        return $this->_movieGenre;
    }

    public function getReleaseDate() // CHECK
    {
        return $this->_releaseDate->format("Y-m-d");
    }

    public function getDuration() // CHECK
    {
        return $this->_duration;
    }

    public function getDirector() // CHECK
    {
        return $this->_director;
    }

    public function getCastings() // CHECK
    {
        $result = "<ul>";
        foreach ($this->_castings as $casting) {
            $result .= "<li>" . $casting->getCastingForMovie() . "</li>";
        }
        $result .= "</ul>";
        return $result;
    }

    public function getSynopsis() // CHECK
    {
        return $this->_synopsis;
    }

    public function getInfos() // CHECK
    {
        $result = "<h2>" . strtoupper($this->_title) . "<br></h2>"
            . "<strong>Title : </strong>" . $this->_title . "<br>";
        $result .= "<strong>Genre : </strong>" . $this->_movieGenre . "<br>";
        $result .= "<strong>Release date </strong>: " . $this->getReleaseDate() . "<br>";
        $result .= "<strong>Duration : </strong>" . $this->_duration . " minutes<br>";
        $result .= "<strong>Director : </strong>" . $this->_director . "<br>";
        $result .= "<strong>Casting : </strong>" . $this->getCastings() . "<br>";
        $result .= "<strong>Synopsis : </strong>" . $this->_synopsis . "<br>";
        return $result;
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setTitle($title) // CHECK
    {
        $this->_title = $title;
    }

    public function setMovieGenre($movieGenre) // CHECK
    {
        $this->_movieGenre = $movieGenre;
    }

    public function setReleaseDate($releaseDate) // CHECK
    {
        $this->_releaseDate = new Datetime($releaseDate);
    }

    public function setDuration($duration) // CHECK
    {
        $this->_duration = $duration;
    }

    public function setDirector($director) // CHECK
    {
        $this->_director = $director;
    }

    public function setCastings(Casting $casting) // CHECK
    {
        $this->_castings[] = $casting;
    }

    public function setSynopsis($synopsis) // CHECK
    {
        $this->_synopsis = $synopsis;
    }

    // *************************************************************************************************

    public function addCasting(Casting $casting)
    {
        $this->_castings[] = $casting;
    }

    public function __toString() // A TESTER
    {
        return $this->_title . " (" . $this->_releaseDate->format("Y") . ") ";

    }
}




?>