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
                $this->_roleActors = [];
            }

        }

?>