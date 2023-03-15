<?php 

    class Actor
        {
            private string $_firstName;
            private string $_lastName;
            private $_genre;
            private DateTime $_birthDate;
            private Role $_role;

            public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate, Role $_role)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_genre = $_genre;
                $this->_birthDate = new DateTime($_birthDate);
                $this->_role = $_role;
                // $this->_role->addRole($this);
            }

        }

?>