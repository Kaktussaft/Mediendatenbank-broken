<?php

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