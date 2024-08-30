<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\UserModel;
use App\Repository\UserRepository;
use DateTime;


class UserController extends Controller
{
    private $currentUser;
    private $isAdmin;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login($username = '')
    {
        $userExists = $this->userRepository->readUserByUsername($username);

        if (!$userExists) {
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        } else {
            $this ->currentUser = $this->userRepository->getUserByUsername($username);
            $this ->isAdmin = $this-> currentUser['Rolle'] === 'admin' ? 'true' : 'false';
            $this->view('User', ['isAdmin' => $this->isAdmin]);
        }
    }

    public function register(string $name, string $surname, string $username, string $email) {
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
        if($this->currentUser == null) {
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        }
        $this->view('User', ['isAdmin' => $this->isAdmin]);
    }

    public function logout()
    {
        header('Location: http://localhost/Mediendatenbank/public/');
        $currentUser = null;
        exit();
    }
}
