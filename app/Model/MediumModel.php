<?php

use DateTime;

class MediumModel
{
    public int $id;
    public string $title;
    public DateTime $uploadDate;
    public string $fileSize;
    public string $description;
    public string $type;

    public function __construct( int $id, string $title, DateTime $uploadDate, string $fileSize, string $description, string $type)
    {
        $this->id = $id;
        $this->title = $title;
        $this->uploadDate = $uploadDate;
        $this->fileSize = $fileSize;
        $this->description = $description;
        $this->type = $type;
    }
}

class PhotoModel extends MediumModel
{
    public int $resolution;

    public function __construct(int $id, string $title, DateTime $uploadDate, string $fileSize, string $description, int $resolution)
    {
        parent::__construct($id, $title, $uploadDate, $fileSize, $description);
        $this->resolution = $resolution;
    }
}

class VideoModel extends MediumModel
{
    public int $duration;
    public int $resolution;

    public function __construct(int $id, string $title, DateTime $uploadDate, string $fileSize, string $description, int $duration, int $resolution)
    {
        parent::__construct($id, $title, $uploadDate, $fileSize, $description);
        $this->duration = $duration;
        $this->resolution = $resolution;
    }
}

class AudioBook extends MediumModel
{
    public int $duration;
    public string $speaker;

    public function __construct(int $id, string $title, DateTime $uploadDate, string $fileSize, string $description, int $duration, string $speaker)
    {
        parent::__construct($id, $title, $uploadDate, $fileSize, $description);
        $this->duration = $duration;
        $this->speaker = $speaker;
    }
}

class Ebook extends MediumModel
{
    public string $author;
    public string $pageCount;

    public function __construct(int $id, string $title, DateTime $uploadDate, string $fileSize, string $description, string $author, string $pageCount)
    {
        parent::__construct($id, $title, $uploadDate, $fileSize, $description);
        $this->author = $author;
        $this->pageCount = $pageCount;
    }
}