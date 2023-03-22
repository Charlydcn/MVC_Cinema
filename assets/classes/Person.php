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

    public function getFirstName() // CHECK
    {
        return $this->_firstName;
    }

    public function getLastName() // CHECK
    {
        return $this->_lastName;
    }

    public function getGenre() // CHECK
    {
        return $this->_genre;
    }

    public function getBirthDate() // CHECK
    {
        return $this->_birthDate->format("Y-m-d");
    }

    public function getAge() // CHECK
    {
        $now = new DateTime();
        $age = $this->_birthDate->diff($now);
        return $age->y . " years old";
    }

    // *************************************************************************************************
    // ************************************** MUTATEURS (setters) ************************************** 

    public function setFirstName($firstName) // CHECK
    {
        $this->_firstName = $firstName;
    }

    public function setLastName($lastName) // CHECK
    {
        $this->_lastName = $lastName;
    }

    public function setGenre($genre) // CHECK
    {
        $this->_genre = $genre;
    }

    public function setBirthDate($birthDate) // CHECK
    {
        $this->_birthDate = new Datetime($birthDate);
    }

    // *************************************************************************************************

}



?>