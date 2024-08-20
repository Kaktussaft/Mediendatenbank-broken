<?php

namespace Webapp\src\Model;

class MediumModell
{
    public int $id;
    public int $author; 
    public string $titel;
    public string $medienTyp;
    public int $dauer;
    public int $seitenAnzahl;

    public function __construct(int $id, int $author, string $titel, string $medienTyp, int $dauer, int $seitenAnzahl)
    {
        $this->id = $id;
        $this->author = $author;
        $this->titel = $titel;
        $this->medienTyp = $medienTyp;
        $this->dauer = $dauer;
        $this->seitenAnzahl = $seitenAnzahl;
    }
}