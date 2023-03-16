<?php 

    class Movie
    {
        private string $_title;
        private string $_movieGenre;
        private DateTime $_releaseDate;
        private int $_duration;
        private Director $_director;
        private array $_casting;
        private string $_synopsis;

        public function __construct(string $_title, string $_movieGenre, string $_releaseDate, int $_duration, Director $_director, array $_casting, string $_synopsis)
        {
            $this->_title = $_title;
            $this->_movieGenre = $_movieGenre;
            $this->_releaseDate = new DateTime($_releaseDate);
            $this->_duration = $_duration;
            $this->_director = $_director;
            // $this->_director->addDirector($this);
            $this->_casting = [];
            $this->_synopsis = $_synopsis;
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

        public function getCasting() // A TESTER
        {
            $result = "<ul>";
            foreach ($this->_casting as $actor) {
                $result .= "<li>" . $actor . "</li>";
            }
            $result .= "</ul>";
            return $result;
        }

        public function getSynopsis() // A TESTER
        {
            return $this->_synopsis;
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

        public function __toString() // A TESTER
        {
            return "<strong>Movie title : </strong>" . $this->_title . "<br>"
            . "<strong>Genre : </strong>" . $this->_genre . "<br>"
            . "<strong>Release date : </strong>". $this->getReleaseDate() . "<br>"
            . "<strong>Duration : </strong>". $this->_duration . "<br>"
            . "<strong>Director : </strong>" . $this->_director . "<br>"
            . "<strong>Casting : </strong>" . $this->getCasting()
            . "<strong>Synopsis : </strong>" . $this->_synopsis;
        }
        
    }


    

?>