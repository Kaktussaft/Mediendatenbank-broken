<?php

namespace Webapp\src\Model;

class UserModel
{
    public int $id;
    public string $vorname;
    public string $nachname;
    public bool $istAdmin;
    public string $username;
    public string $passwort;

    public function __construct(int $id, string $vorname, string $nachname, bool $istAdmin, string $nutzername, string $passwort)
    {
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->istAdmin = $istAdmin;
        $this->nutzername = $nutzername;
        $this->passwort = $passwort;
    }

    public const PFAD_LANDING_PAGE = "Mediendatenbank/WEB42/Webapp/view/LandingPage.html";
    public const PFAD_LOGIN = "Mediendatenbank/WEB42/Webapp/view/Login.html";
    public const PFAD_USER_VIEW = "Mediendatenbank/WEB42/Webapp/view/User.html";
    public const PFAD_ADMIN_VIEW = "Mediendatenbank/WEB42/Webapp/view/Admin.html"; 
    
}