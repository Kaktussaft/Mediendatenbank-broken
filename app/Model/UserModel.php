<?php

namespace App\Model;

use DateTime;

class UserModel
{
    public int $id;
    public string $name;
    public string $surname;
    public string $username;
    public DateTime $registrationDate;
    public bool $isAdmin;
    public string $email; 
    


    public function __construct(int $id, string $name, string $surname, string $username, DateTime $registrationDate, bool $isAdmin,   string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->registrationDate = $registrationDate;
        $this->isAdmin = $isAdmin;
        $this->email = $email;
    }   
}