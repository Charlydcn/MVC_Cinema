<?php 

    class Role
        {
            private string $_name;
            private array $_movies;
            private array $_actors;

            public function __construct(string $_name)
            {
                $this->_name = $_name;
                $this->_movies = [];
                // $this->_role->addMovies($this);
                $this->_actors = [];
                // $this->_role->addActors($this);
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) *************************************

            public function getName()
            {
                return $this->_name;
            }

            public function getMovies()
            {
                $result = "<ul>";
                foreach ($this->_movies as $movie) {
                    $result .= "<li>" . $movie . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

            public function getActors()
            {
                $result = "<ul>";
                foreach ($this->_actors as $actor) {
                    $result .= "<li>" . $actor . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setName($name)
            {
                $this->_name = $name;
            }

            public function setMovies(array $movies)
            {
                $this->_movies = $movies;
            }

            public function setActors(array $actors)
            {
                $this->_actors = $actors;
            }

// *************************************************************************************************

            public function __toString()
            {
                return $this->_name . "<br>";

            }

        }

?>