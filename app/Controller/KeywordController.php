<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\KeywordModel;
use App\Repository\KeywordRepository;

class KeywordController extends Controller
{
    private $keywordRepository;
    private $currentUserId;

    public function __construct()
    {
        $this->keywordRepository = new KeywordRepository();
        $this->currentUserId = $_SESSION['currentUser']['Benutzer_ID'];
    }

    public function createKeyword(string $keywordName)
    {
        $keyword = new KeywordModel($keywordName);
        $this->keywordRepository->createKeyword($keyword, $this->currentUserId);
    }

    public function getAllKeywordsAndAssociations()
    {
        $keywordsAndAssociations = $this->keywordRepository->readAllKeywordsWithAssociations($this->currentUserId);
        echo json_encode(['status' => 'success', 'data' => $keywordsAndAssociations]);
    }
}
