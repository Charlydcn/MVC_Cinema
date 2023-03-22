<?php 

    abstract class Person
        {
            protected string $_firstName;
            protected string $_lastName;
            protected string $_genre;
            protected DateTime $_birthDate;

            public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_genre = $_genre;
                $this->_birthDate = new DateTime($_birthDate);
            }

// ************************************************ MÉTHODES ************************************************ 
// ************************************** ACCESSEURS (getters) **************************************
                    
            public function getFirstName() // A TESTER
            {
                return $this->_firstName;
            }

            public function getLastName() // A TESTER
            {
                return $this->_lastName;
            }

            public function getGenre() // A TESTER
            {
                return $this->_genre;
            }

            public function getBirthDate() // A TESTER
            {
                return $this->_birthDate->format("Y-m-d");
            }

            public function getAge() // A TESTER
            {
                $now = new DateTime();
                $age = $this->_birthDate->diff($now);
                return $age->y." years old";
            }

// *************************************************************************************************
// ************************************** MUTATEURS (setters) ************************************** 

            public function setFirstName($firstName) // A TESTER
            {
                $this->_firstName = $firstName;
            }

            public function setLastName($lastName) // A TESTER
            {
                $this->_lastName = $lastName;
            }
                        
            public function setGenre($genre) // A TESTER
            {
                $this->_genre = $genre;
            }

            public function setBirthDate($birthDate) // A TESTER
            {
                $this->_birthDate = new Datetime($_birthDate);
            }

// *************************************************************************************************

        }



?>