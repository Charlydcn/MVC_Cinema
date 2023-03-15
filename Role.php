<?php 

    class Role
        {
            private string $_firstName;
            private string $_lastName;
            private array $_movie;

            public function __construct(string $_firstName, string $_lastName)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_movie = [];
            }

        }

?>