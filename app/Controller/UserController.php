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

  
    public function login($username = '')
    {
        // $userExists = $this->userRepository->readUserByUsername($username);
        // if (!$userExists){
        //     header('Location: http://localhost/Mediendatenbank/public/');
        //     exit(); 
        // }
        //$this->currentUser = $userExists;
        $this->view('User', ['username' => $username]);
    }

    public function register( string $name, string $surname, string $username, string $email)
    {
        $userRepository = new UserRepository();
        $userExists = $userRepository->readUserByUsername($username);

        if(!$userExists)
        {
            $currentDateTime = new DateTime();
            $user = new UserModel($name,$surname,$ $username, $currentDateTime, false, $email);
            $userRepository->createUser($user);
             $this->view('LandingPage', 'Registration successful');
        }
        else
        {
            $this->view('LandingPage', 'Username already exists');
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
