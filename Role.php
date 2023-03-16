<?php 

    class Role
        {
            private string $_roleName;
            private array $_roleMovies;
            private array $_roleActors;

            public function __construct(string $_roleName)
            {
                $this->_roleName = $_roleName;
                $this->_roleMovies = [];
                // $this->_role->addMovies($this);
                $this->_roleActors = [];
                // $this->_role->addActors($this);
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) *************************************

            public function getRoleName()
            {
                return $this->_roleName;
            }

            public function getRoleMovies()
            {
                $result = "<ul>";
                foreach ($this->_roleMovies as $movie) {
                    $result .= "<li>" . $movie . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

            public function getRoleActors()
            {
                $result = "<ul>";
                foreach ($this->_roleActors as $actor) {
                    $result .= "<li>" . $actor . "</li>";
                }
                $result .= "</ul>";
                return $result;
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setRoleName($roleName)
            {
                $this->_roleName = $roleName;
            }

            public function setRoleMovies(array $roleMovies)
            {
                $this->_roleMovies = $roleMovies;
            }

            public function setRoleActors(array $roleActors)
            {
                $this->_roleActors = $roleActors;
            }

// *************************************************************************************************

            public function __toString()
            {
                return $this->_roleName . "<br>";

            }

        }

?>