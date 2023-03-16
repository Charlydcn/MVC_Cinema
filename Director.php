<?php 

    class Director
        {
            private string $_firstName;
            private string $_lastName;
            private string $_genre;
            private DateTime $_birthDate;
            private array $_directorMovies;

            public function __construct(string $_firstName, string $_lastName, string $_genre, string $_birthDate)
            {
                $this->_firstName = $_firstName;
                $this->_lastName = $_lastName;
                $this->_genre = $_genre;
                $this->_birthDate = new DateTime($_birthDate);
                $this->_movies = $_movies;
            }

        }

?>