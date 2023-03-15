<?php 

    class Actor
        {
            private string $_firstName;
            private string $_lastName;
            private $_movie;

            public function __construct(string $_firstName, string $_lastName, string $_movie)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_movie = $_movie;
            }

        }

?>