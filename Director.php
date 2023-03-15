<?php 

    class Director
        {
            private string $_firstName;
            private string $_lastName;
            private $_genre;
            private int $_birthDate;

            public function __construct(string $_firstName, string $_lastName, $_genre, $_birthDate)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_genre = $_genre;
                $this->_birthDate = $_birthDate;
            }

        }

?>