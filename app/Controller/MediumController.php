<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\MediumRepository;
use Exception;
use DateTime;

class MediumController extends Controller
{

    private $mediumRepository;

    public function __construct()
    {
        $this->mediumRepository = new MediumRepository();
    }

    public function uploadFile()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
                $file = $_FILES['file'];
                $fileType = $this->determineMediaType($file['name']);
                $fileName = $file['name'];
                $fileSize = $file['size'];
                $uploadDir = $this->getUploadDirectory($fileType);
                $uploadFile = $uploadDir . basename($file['name']);
                $uploadDate =  (new DateTime())->format('Y-m-d');
                $currentUser = $_SESSION['user'];
                $uploadUser = $currentUser['Benutzer_ID'];

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                    $filePath = '/uploads/' . basename($file['name']);

                    switch ($fileType) {
                        case 'photo':
                            $this->mediumRepository->createPhotoMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate, '', $uploadUser);
                            break;
                        case 'video':
                            $this->mediumRepository->createVideoMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate, '', '', $uploadUser);
                            break;
                        case 'audiobook':
                            $this->mediumRepository->createAudioBookMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate, '', '', $uploadUser);
                            break;
                        case 'ebook':
                            $this->mediumRepository->createEbookMedium($fileName, $filePath, $fileType, $fileSize, $uploadDate, '', '', $uploadUser);
                            break;
                    }


                    echo json_encode(['status' => 'success', 'message' => 'File erfolgreich hochgeladen.']);
                } else {
                    throw new Exception('Failed to move uploaded file.');
                }
            } else {
                throw new Exception('Invalid request.');
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getAllMediums()
    {
        try {
            $currrentUser = $_SESSION['user'];
            $currentUserId = $currrentUser['BenutzerId'];
            $media = $this->mediumRepository->readAllMedia($currentUserId);
            echo json_encode(['status' => 'success', 'data' => $media]); //returns: Photos, Videos, Audiobooks, Ebooks in that order for current user
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateMedium($newMedium, $oldMedium)
    {

        //implement parsing the data
        $fileType = $oldMedium['Typ']; //assuming that is the sent over format from the frontend
        switch ($fileType) {
            case 'photo':
                
                break;
            case 'video':
               
                break;   
            case 'audiobook':
               
                break;
            case 'ebook':
               
                break;
        }
    }

    private function determineMediaType($fileName)
    {
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return 'photo';
            case 'mp4':
            case 'avi':
            case 'mov':
                return 'video';
            case 'mp3':
            case 'wav':
            case 'aac':
                return 'audiobook';
            case 'pdf':
            case 'epub':
            case 'mobi':
                return 'ebook';
            default:
                throw new Exception('Unsupported file type.');
        }
    }

    private function getUploadDirectory($fileType)
    {
        switch ($fileType) {
            case 'photo':
                return __DIR__ . '/../../public/uploads/photos/';
            case 'video':
                return __DIR__ . '/../../public/uploads/videos/';
            case 'audiobook':
                return __DIR__ . '/../../public/uploads/audioBook/';
            case 'ebook':
                return __DIR__ . '/../../public/uploads/ebooks/';
            default:
                throw new Exception('Invalid media type.');
        }
    }

}
