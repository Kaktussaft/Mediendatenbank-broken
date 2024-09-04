<?php

namespace App\Repository;

use App\database\DbConnection;
use App\Model\KeywordModel;

class KeywordRepository{

    private $conn;
    public function __construct()
    {
        $this->conn = DbConnection::getInstance()->getConnection();
    }

    public function createKeyword($keyword, $currentUserId){
        $keywordName = $keyword->getName();
        $stmt = $this->conn->prepare("INSERT INTO Schlagworte (Name, Benutzer_ID) VALUES (?, ?)");
        $stmt->bind_param("ss", $keywordName, $currentUserId);
        $stmt->execute();
        $stmt->close();
    }
    public function deleteKeyword(int $id){

    }
    public function readKeyword(int $id){

    }
    public function readAllKeywordsWithAssociations($currentUserId){
        $keywords = [];
        
        $stmt = $this->conn->prepare("SELECT * FROM Schlagworte WHERE Benutzer_ID = ?");
        $stmt->bind_param("s", $currentUserId);
        $stmt->execute();
        $resultKeywords = $stmt->get_result();
        $keywords = $resultKeywords->fetch_assoc();

        $stmt->close();

        $associations = [];
        $stm = $this->conn->prepare("SELECT * FROM Schlagwort_Medium WHERE Schlagwort_ID = ?");

        while ($keyword = $resultKeywords->fetch_assoc()) {
            $keywordId = $keyword['Schlagwort_ID'];
            $stm->bind_param("i", $keywordId);
            $stm->execute();
            $resultAssociations = $stm->get_result();
    
            while ($association = $resultAssociations->fetch_assoc()) {
                $associations[] = $association;
            }
        }
        $stmt->close();
        return [$keywords, $associations];
    }

    public function updateKeyword($keyword){

    }
    public function connectKeywordToMedia($keyword, $media){

    }

}