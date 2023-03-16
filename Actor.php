<?php 

    class Actor extends Person
        {
            private Role $_role;
            private array $_actorMovies;

            public function __construct(Role $_role)
            {
                $this->_role = $_role;
                // $this->_role->addRole($this);
                $this->_actorMovies = [];
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
                    
            public function getRole() // A TESTER
            {
                return $this->_role;
            }

            public function getActorMovies() // A TESTER
            {
                $result = "<ul>";
                foreach ($this->_actorMovies as $movie) {
                    $result .= "<li>" . $movie . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setRole($role) // A TESTER
            {
                $this->_role = $role;
            }

            public function setActorMovies(array $directorMovies) // A TESTER
            {
                $this->_directorMovies = $directorMovies;
            }

// *************************************************************************************************

            public function __toString() // A TESTER
            {
                return $this->_firstName . " " . $this->_lastName . "<br>";
            }
            //     . "<strong>Genre : </strong>". $this->_genre . "<br>"
            //     . "<strong>Age : </strong>". $this->getAge() . "<br>"
            //     . "<strong>Role : </strong>". $this->_role . "<br>"
            //     . "<strong>Movies : </strong>" . $this->getActorMovies();
            // }
            }



?>