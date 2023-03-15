<?php 

    class Movie
    {
        private string $_title;
        private string $_genre;
        private DateTime $_releaseDate;
        private int $_duration;
        private Director $_director;
        private string $_synopsis;

        public function __construct($_title, $_genre, $_releaseDate, $_duration, $_director, $_synopsis)
        {
            $this->_title = $_title;
            $this->_genre = $_genre;
            $this->_releaseDate = new DateTime($_releaseDate);
            $this->_duration = $_duration;
            $this->_director = $_director;
            // $this->_director->addDirector($this);
            $this->_synopsis = $_synopsis;
        }

    }

?>