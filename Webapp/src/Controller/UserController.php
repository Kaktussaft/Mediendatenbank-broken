<?php

namespace Webapp\src\Controller;
use Webapp\src\Model\UserModel;

class UserController{

    public function moveToLoginPage() {
        try {
            header('Location: ' . UserModel::PFAD_LOGIN);
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function login() {
        try {

            $isLoginOrRegister = $_POST['isLoginOrRegister'] ?? '';
            $passwort = $_POST['passwort'] ?? '';
            $username = $_POST['username'] ?? '';

            if($isLoginOrRegister == "login"){

                //Check credentials through Repository

                header('Location: ' . UserModel::PFAD_USER_VIEW);
            } elseif($isLoginOrRegister == "register"){

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

            if($isLogoutOrSwitchAdminView == "logout"){
                header('Location: /LandingPage');
            }
            elseif ($isLogoutOrSwitchAdminView == "switchAdminView") {
                header('Location: /Admin');
            }
        } 
        catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
            
    }
    

    public function toggleAdminView() {
        try {
            header('Location: /User');
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function deleteUser() {
        try {
             $username = $_DELETE['username'] ?? '';
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function updateUser() {
        try {
            
            $username = $_PUT['username'] ?? '';
            $vorname = $_PUT['vorname'] ?? '';
            $nachname = $_PUT['nachname'] ?? '';
            $istAdmin = isset($_PUT['istAdmin']) ? filter_var($_PUT['istAdmin'], FILTER_VALIDATE_BOOLEAN) : false;
            $passwort = $_PUT['passwort'] ?? '';

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}