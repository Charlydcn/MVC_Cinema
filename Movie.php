<?php 

    class Movie
    {
        private string $_title;
        private string $_genre;
        private DateTime $_releaseDate;
        private int $_duration;
        private Director $_director;
        private array $_casting;
        private string $_synopsis;

        public function __construct(string $_title, string $_genre, string $_releaseDate, int $_duration, Director $_director,array $_casting, string $_synopsis)
        {
            $this->_title = $_title;
            $this->_genre = $_genre;
            $this->_releaseDate = new DateTime($_releaseDate);
            $this->_duration = $_duration;
            $this->_director = $_director;
            $this->_casting = [];
            // $this->_director->addDirector($this);
            $this->_synopsis = $_synopsis;
        }

    }

?>