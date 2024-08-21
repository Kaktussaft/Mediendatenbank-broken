<?php

namespace src\Controller;

use src\Model\UserModel;
use Exception;

class UserController
{

    private $sortRequest;
    public function __construct()
    {
        $this->sortRequest = $_POST['Routing'] ?? '';
        $this->handleRequest();
    }

    private function handleRequest()
    {
        switch ($this->sortRequest) {
            case 'register':
                $username = $_POST['username'] ?? '';
                $vorname = $_POST['vorname'] ?? '';
                $nachname = $_POST['nachname'] ?? '';
                $this->register($username,  $vorname,  $nachname);
                break;
            case 'login':
                $username = $_POST['username'] ?? '';
                $this->login($username);
                break;
            case 'logout':
                $this->logout();
                break;
            case 'switchAdminView':
                $this->toggleAdminView();
                break;
            case 'switchUserView':
                $this->toggleUserView();
                break;
            case 'updateUser':
                $username = $_PUT['username'] ?? '';
                $vorname = $_PUT['vorname'] ?? '';
                $nachname = $_PUT['nachname'] ?? '';
                $istAdmin = $_PUT['istAdmin'] ?? '';
                $this->updateUser($username,  $vorname,  $nachname,  $istAdmin);
                break;
            default:
                echo "An error occurred: No valid identifier found";
                break;
        }
    }

    public function login(string $username)
    {
        try {
            echo $username;

            header('Location: ' . UserModel::PFAD_USER_VIEW);

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
    public function register(string $username, string $vorname, string $nachname)
    {
        $user = new UserModel(1, $vorname, $nachname, false, $username);
    }

    public function logout()
    {
        try {

            $isLogoutOrSwitchAdminView = $_POST['isLogoutOrSwitchAdminView'] ?? '';

            if ($isLogoutOrSwitchAdminView == "logout") {
                header('Location: /LandingPage');
            } elseif ($isLogoutOrSwitchAdminView == "switchAdminView") {
                header('Location: /Admin');
            }
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }


    public function toggleAdminView()
    {
        try {
            header('Location: ' . UserModel::PFAD_ADMIN_VIEW);
            exit();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function toggleUserView()
    {
        try {
            header('Location: ' . UserModel::PFAD_USER_VIEW);
            exit();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function updateUser($username,  $vorname,  $nachname,  $istAdmin)
    {
        try {

        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}
