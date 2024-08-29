<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\UserModel;
use App\Repository\UserRepository;
use DateTime;


class UserController extends Controller
{
    private $currentUser;
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
            $getUser = $this->userRepository->getUserByUsername($username);
            $this->currentUser = $getUser;
            $this->view('User', ['username' => $username]);
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
        // if($this->currentUser->isAmdmin())
        // {
        // $this->view('Admin', ['username' => $username]);
        // }
        // else
        // {

        //     //tell user he is not allowed to view this page
        // }
    }
    public function toggleUserView()
    {
        $this->view('User');
    }

    public function logout()
    {
        header('Location: http://localhost/Mediendatenbank/public/');
        $currentUser = null;
        exit();
    }
}
