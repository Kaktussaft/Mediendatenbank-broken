<?php

namespace Webapp\src\Controller;
use Webapp\src\Model\UserModel;

class UserController{

    public function landingPageView() {
        try {
        header('Location: /Login');
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function loginView() {
        try {

             $username = $_POST['username'] ?? '';
             $passwort = $_POST['passwort'] ?? '';
            
           
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function logInView() {
        try {

            $username = $_POST['username'] ?? '';
            $vorname = $_POST['vorname'] ?? '';
            $nachname = $_POST['nachname'] ?? '';
            $istAdmin = isset($_POST['istAdmin']) ? filter_var($_POST['istAdmin'], FILTER_VALIDATE_BOOLEAN) : false;
            $passwort = $_POST['passwort'] ?? '';
            
            $user = new UserModel(1, $vorname, $nachname, $istAdmin, $username, $passwort);

            return $user;

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function logout() {
        try {

            $isLogoutOrSwitchAdminView = $_POST['isLogoutOrSwitchAdminView'] ?? '';

            if(isLogoutOrSwitchAdminView == "logout"){
                header('Location: /LandingPage');
            else if(isLogoutOrSwitchAdminView == "switchAdminView"){
                header('Location: /Admin');
            }
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
        }
    }

    public function adminView() {
        try {
            header('Location: /User');
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}