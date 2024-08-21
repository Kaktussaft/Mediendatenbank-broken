<?php

namespace WEB42\src\Model;

class MediumModell
{
    public int $id;
    public string $title;
    public string $mediaType;
    public string $fileSize;
    public string $description;

    public function __construct( int $id, string $title, string $mediaType, string $fileSize, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->mediaType = $mediaType;
        $this->fileSize = $fileSize;
        $this->description = $description;
    }
   
}