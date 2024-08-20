<?php

namespace Webapp\src\Controller;
use Webapp\src\Model\MediumModel;
use Exception;

class MediumController{

    public function deleteMedium() {
        try {
            $id = $_POST['id'] ?? '';
            //Delete medium 

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
    

}