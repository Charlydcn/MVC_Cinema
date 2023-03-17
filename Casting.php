<?php 

    class Casting
        {
            private array $_roles = [];
            private array $_actors = [];
            private Movie $_movie;

            public function __construct(array $_roles, array $_actors, Movie $_movie)
            {
                $this->_roles = $_roles;
                $this->_actors = $_actors;
                $this->_movie = $_movie;
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
                    
            public function getRoles() // A TESTER
            {
                $result = "<ul>";
                foreach ($this->_roles as $role) {
                    $result .= "<li>" . $role . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

            public function getActors() // A TESTER
            {
                $result = "<ul>";
                foreach ($this->_actors as $actor) {
                    $result .= "<li>" . $actor . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

            public function getMovie() // A TESTER
            {
                return $this->_movie;
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setRoles($roles) // A TESTER
            {
                $this->_roles = $roles;
            }

            public function setActors($actors) // A TESTER
            {
                $this->_actors = $actors;
            }
                        
            public function setMovie($movie) // A TESTER
            {
                $this->_movie = $movie;
            }

// *************************************************************************************************

            // public function __toString()
            // {
            //     return 
            // }

        }



?>