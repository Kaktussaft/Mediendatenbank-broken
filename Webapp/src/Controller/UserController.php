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

    public function logInView() {
        try {

            $isLoginOrRegister = $_POST['isLoginOrRegister'] ?? '';
            $passwort = $_POST['passwort'] ?? '';
            $username = $_POST['username'] ?? '';

            if($isLoginOrRegister == "login"){

                //Check credentials through Repository

                header('Location: /User');
            } else if($isLoginOrRegister == "register"){

                $vorname = $_POST['vorname'] ?? '';
                $nachname = $_POST['nachname'] ?? '';
                $istAdmin = isset($_POST['istAdmin']) ? filter_var($_POST['istAdmin'], FILTER_VALIDATE_BOOLEAN) : false;
                header('Location: /Login');

                //Check if user already exists through Repository

                $user = new UserModel(1, $vorname, $nachname, $istAdmin, $username, $passwort);
            }
            

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