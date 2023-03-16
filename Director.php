<?php 

    class Director extends Person
        {
            private array $_movies;

            public function __construct()
            {
                $this->_movies = [];
            }


// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************

            public function getMovies() // A TESTER
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
            
            public function setMovies(array $movies) // A TESTER
            {
                $this->_movies = $movies;
            }

    // *************************************************************************************************

            public function __toString() // A TESTER
            {
                return "<strong>Director's name : </strong>" . $this->_firstName . " " . $this->_lastName . "<br>"
                . "<strong>Genre : </strong>". $this->_genre . "<br>"
                . "<strong>Age : </strong>". $this->getAge() . "<br>"
                . "<strong>Movies : </strong>" . $this->getMovies();
            }
        }

?>