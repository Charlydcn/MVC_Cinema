<?php 

    class Casting
        {
            private Role $_roles;
            private Actor $_actors;
            private Movie $_movies;

            public function __construct(Role $_roles, Actor $_actors, Movie $_movies)
            {
                $this->_roles = $_roles;
                $this->_actors = $_actors;
                $this->_movies = $_movies;
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
                    
            public function getRoles() // A TESTER
            {
                return $this->_firstName;
            }

            public function getActors() // A TESTER
            {
                return $this->_lastName;
            }

            public function getMovies() // A TESTER
            {
                return $this->_genre;
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setFirstName($firstName) // A TESTER
            {
                $this->_firstName = $firstName;
            }

            public function setLastName($lastName) // A TESTER
            {
                $this->_lastName = $lastName;
            }
                        
            public function setGenre($genre) // A TESTER
            {
                $this->_genre = $genre;
            }

            public function setBirthDate($birthDate) // A TESTER
            {
                $this->_birthDate = new Datetime($_birthDate);
            }

// *************************************************************************************************

        }



?>