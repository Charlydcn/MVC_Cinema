<?php 

    class Role
        {
            private string $_roleName;
            private array $_roleMovies;

            public function __construct(string $_roleName)
            {
                $this->_roleName = $_roleName;
                $this->_roleMovies = [];
            }

        }

?>