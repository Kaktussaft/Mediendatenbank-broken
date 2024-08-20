<?php

namespace WEB42\src\Model;

class UserModel
{
    public int $id;
    public string $vorname;
    public string $nachname;
    public bool $istAdmin;
    public string $username;


    public function __construct(int $id, string $vorname, string $nachname, bool $istAdmin, string $username)
    {
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->istAdmin = $istAdmin;
        $this->username = $username;
    }

    public const PFAD_LANDING_PAGE = "Mediendatenbank/WEB42/WEB42/view/LandingPage.html";
    public const PFAD_LOGIN = "Mediendatenbank/WEB42/WEB42/view/Login.html";
    public const PFAD_USER_VIEW = "Mediendatenbank/WEB42/WEB42/view/User.html";
    public const PFAD_ADMIN_VIEW = "Mediendatenbank/WEB42/WEB42/view/Admin.html"; 
    
}