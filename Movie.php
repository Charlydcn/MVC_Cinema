<?php 

    class Movie
    {
        private string $_title;
        private string $_movieGenre;
        private DateTime $_releaseDate;
        private int $_duration;
        private Director $_director;
        private array $_castings;
        private string $_synopsis;

        public function __construct(string $_title, string $_movieGenre, string $_releaseDate, int $_duration, Director $_director, string $_synopsis)
        {
            $this->_title = $_title;
            $this->_movieGenre = $_movieGenre;
            $this->_releaseDate = new DateTime($_releaseDate);
            $this->_duration = $_duration;
            $this->_director = $_director;
            // $this->_director->addDirector($this);
            $this->_castings = [];
            $this->_synopsis = $_synopsis;
            $this->_director->addMovie($this);            

        }


// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
    
        public function getTitle() // A TESTER
        {
            return $this->_title;
        }

        public function getMovieGenre() // A TESTER
        {
            return $this->_movieGenre;
        }

        public function getReleaseDate() // A TESTER
        {
            return $this->_releaseDate->format("Y-m-d");
        }

        public function getDuration() // A TESTER
        {
            return $this->_duration;
        }

        public function getDirector() // A TESTER
        {
            return $this->_director;
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

        public function getSynopsis() // A TESTER
        {
            return $this->_synopsis;
        }

        public function getInfos()
        {
            $result = "<h2>". strtoupper($this->_title) . "<br></h2>"
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
        
        public function setTitle($title) // A TESTER
        {
            $this->_title = $title;
        }
        
        public function setMovieGenre($movieGenre) // A TESTER
        {
            $this->_movieGenre = $movieGenre; // A TESTER
        }
        
        public function setReleaseDate($releaseDate) // A TESTER
        {
            $this->_releaseDate = new Datetime($_releaseDate);
        }
        
        public function setDuration($duration) // A TESTER
        {
            $this->_duration = $duration;
        }
        
        public function setDirector($director) // A TESTER
        {
            $this->_director = $director;
        }
        
        public function setCasting(array $casting) // A TESTER
        {
            $this->_casting = $casting;
        }
        
        public function setSynopsis($synopsis) // A TESTER
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
            return "<strong>Movie title : </strong>" . $this->_title . "<br>"
            . "<strong>Genre : </strong>" . $this->_movieGenre . "<br>"
            . "<strong>Release date : </strong>". $this->getReleaseDate() . "<br>"
            . "<strong>Duration : </strong>". $this->_duration . "<br>"
            . "<strong>Director : </strong>" . $this->_director . "<br>";
        
        }
    }


    

?>