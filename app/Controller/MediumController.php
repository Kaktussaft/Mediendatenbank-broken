<?php

namespace src\Controller;

use Controller;
use WEB42\src\Model\MediumModel;
use Exception;

class MediumController extends Controller
{

    public function deleteMedium() {
        try {
            $id = $_POST['id'] ?? '';
            //Delete medium 

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
    

}