<?php 

    class Director extends Person
        {
            private array $_directorMovies;

            public function __construct()
            {
                $this->_directorMovies = [];
            }


// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************

            public function getDirectorMovies() // A TESTER
            {
                $result = "<ul>";
                foreach ($this->_directorMovies as $movie) {
                    $result .= "<li>" . $movie . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 
            
            public function setDirectorMovies(array $directorMovies) // A TESTER
            {
                $this->_directorMovies = $directorMovies;
            }

    // *************************************************************************************************

            public function __toString() // A TESTER
            {
                return "<strong>Director's name : </strong>" . $this->_firstName . " " . $this->_lastName . "<br>"
                . "<strong>Genre : </strong>". $this->_genre . "<br>"
                . "<strong>Age : </strong>". $this->getAge() . "<br>"
                . "<strong>Movies : </strong>" . $this->getDirectorMovies();
            }
        }

?>