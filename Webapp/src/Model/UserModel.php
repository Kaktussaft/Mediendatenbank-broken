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
}