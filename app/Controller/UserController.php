<?php
namespace App\Controller;

use App\Core\Controller;
use App\Model\UserModel;
use App\Repository\UserRepository;

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
        if (!$userExists){
            header('Location: http://localhost/Mediendatenbank/public/');
            exit(); 
        }
        $this->currentUser = $userExists;
        $this->view('User', ['username' => $username]);
    }
    public function register(string $username = '', string $email = '', string $nachname = '', string $vorname = '')
    {
       
        $this->view('LandingPage', 'Registration successful');
    }
    public function toggleAdminView($username = '')
    {
        if ($username == '1234') {
            $this->view('Admin', ['username' => $username]);
        }
        else{          
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        }
    }
    public function logout()
    {
        header('Location: http://localhost/Mediendatenbank/public/');
        $currentUser = null;
        exit();
    }
}
