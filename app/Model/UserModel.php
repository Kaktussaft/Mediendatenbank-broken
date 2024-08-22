<?php

namespace src\Model;

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

    public const PFAD_LANDING_PAGE = "Mediendatenbank/WEB42/src/View/LandingPage.php";
    public const PFAD_LOGIN = "Mediendatenbank/WEB42/WEB42/view/Login.html";
    public const PFAD_USER_VIEW = "Mediendatenbank/WEB42/WEB42/view/User.html";
    public const PFAD_ADMIN_VIEW = "Mediendatenbank/WEB42/WEB42/view/Admin.html"; 
    
}