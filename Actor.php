<?php 

    class Actor extends Person
        {
            private array $_role;
            private array $_movies;
            private array $_castings;
            private Role $_roles;

            public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate, Role $_role)
            {
                parent::__construct($_firstName, $_lastName, $_genre, $_birthDate);
                $this->_role = [];
                $this->_movies = [];
                $this->_castings = [];
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
                    
            public function getRole() // A TESTER
            {
                return $this->_role;
            }

            public function getMovies() // A TESTER
            {
                $result = "<ul>";
                foreach ($this->_movies as $movie) {
                    $result .= "<li>" . $movie . "</li>";
                }
                $result .= "</ul>";
                return $result;
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

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setRole($role) // A TESTER
            {
                $this->_role = $role;
            }

            public function setMovies(array $directorMovies) // A TESTER
            {
                $this->_directorMovies = $directorMovies;
            }

// *************************************************************************************************

            public function addCasting(Casting $casting)
            {
                $this->_castings[] = $casting;
            }

            // public function addRole(Role $role)
            // {
            //     $this->_roles[] = $role;
            // }

            public function __toString() // A TESTER
            {
                return $this->getFirstName() . " " . $this->getLastName();
            }

        }



?>