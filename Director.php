<?php 

    class Director
        {
            private string $_firstName;
            private string $_lastName;
            private $_genre;
            private DateTime $_birthDate;

            public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_genre = $_genre;
                $this->_birthDate = new DateTime($_birthDate);
            }

        }

?>