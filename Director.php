<?php 

    class Director
        {
            private string $_firstname;
            private string $_lastname;
            private $_releaseDate;
            private int $_duration;

            public function __construct($_firstname, $_lastname, $_releaseDate, $_duration)
            {
                $this->_firstname = $_firstname;
                $this->_lastname = $_lastname;
                $this->_releaseDate = new DateTime($_releaseDate);
                $this->_duration = $_duration;
            }

        }

?>