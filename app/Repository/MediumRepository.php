<?php

namespace App\Repository;

use App\Database\DbConnection;

class MediumRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = DbConnection::getInstance()->getConnection();
    }

    public function createPhotoMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate,  $resolution, $uploadUser)
    {
        $stmt = $this->conn->prepare("INSERT INTO Fotos (Titel, Dateipfad, Typ, Dateigröße, Hochlade_datum, Auflösung, Benutzer_ID) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $fileName, $filePath, $fileType, $fileSize, $uploadDate, $resolution, $uploadUser);
        $stmt->execute();
        $stmt->close();
    }

    public function createVideoMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate,  $resolution, $duration, $uploadUser)
    {
        $stmt = $this->conn->prepare("INSERT INTO Videos (Titel, Dateipfad, Typ, Dateigröße, Hochlade_datum, Auflösung, Dauer, Benutzer_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $fileName, $filePath, $fileType, $fileSize, $uploadDate, $resolution, $duration, $uploadUser);
        $stmt->execute();
        $stmt->close();
    }

    public function createAudioBookMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate,  $speaker, $duration, $uploadUser)
    {
        $stmt = $this->conn->prepare("INSERT INTO Hörbücher (Titel, Dateipfad, Typ, Dateigröße, Hochlade_datum, Sprecher, Dauer, Benutzer_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $fileName, $filePath, $fileType, $fileSize, $uploadDate, $speaker, $duration, $uploadUser);
        $stmt->execute();
        $stmt->close();
    }

    public function createEbookMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate,  $author, $pages, $uploadUser)
    {
        $stmt = $this->conn->prepare("INSERT INTO Ebooks (Titel, Dateipfad, Typ, Dateigröße, Hochlade_datum, Autor, Seitenzahl, Benutzer_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssii", $fileName, $filePath, $fileType, $fileSize, $uploadDate, $author, $pages, $uploadUser);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteMedium(int $id, string $type) {}
    public function readMedium(int $id, string $type) {}
    
    public function updateMedium($medium){
        
    }

    public function readAllMedia($currentUserId)
{
    $mediaTypes = ['Fotos', 'Videos', 'Hörbücher', 'Ebooks'];
    $results = [];

    foreach ($mediaTypes as $type) {
        $stmt = $this->conn->prepare("SELECT * FROM $type WHERE Benutzer_ID = ?");
        $stmt->bind_param("s", $currentUserId);
        $stmt->execute();
        $results[$type] = $stmt->get_result();
        $stmt->close();
    }

    return $results;
}
}
