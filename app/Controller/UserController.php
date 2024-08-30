<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\UserModel;
use App\Repository\UserRepository;
use DateTime;


class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        session_start();
        $this->userRepository = new UserRepository();
    }

    public function login($username = '')
    {
        $userExists = $this->userRepository->readUserByUsername($username);

        if (!$userExists) {
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        } else {
            $currentUser = $this->userRepository->getUserByUsername($username);
            $_SESSION['currentUser'] = $currentUser;
            $isAdmin = $currentUser['Rolle'] === 'admin' ? 'true' : 'false';
            $this->view('User', ['isAdmin' => $isAdmin]);
        }
    }

    public function register(string $name, string $surname, string $username, string $email)
    {
        $userExists = $this->userRepository->readUserByUsername($username);

        if (!$userExists) {
            $currentDateTime = new DateTime();
            list($name, $surname, $username, $email) = $this->sanitizeUserInput($name, $surname, $username, $email);
            $user = new UserModel($name, $surname, $username, $currentDateTime, "false", $email);
            $this->userRepository->createUser($user);
            header('Location: http://localhost/Mediendatenbank/public/');
        } else {
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        }
    }

    public function toggleAdminView()
    {
        $this->view('Admin');
    }
    public function toggleUserView()
    {
        if (!isset($_SESSION['currentUser'])) {
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        }
        $currentUser = $_SESSION['currentUser'];
        $isAdmin = $currentUser['Rolle'] === 'admin' ? 'true' : 'false';
        $this->view('User', ['isAdmin' => $isAdmin]);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: http://localhost/Mediendatenbank/public/');
        exit();
    }
}
