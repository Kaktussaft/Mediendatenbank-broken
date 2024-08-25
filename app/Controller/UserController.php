<?php

class UserController extends Controller
{
    public function login($username = '')
    {
        if ($username == '1234') {
            $this->view('User', ['username' => $username]);
        }
        else{          
            header('Location: http://localhost/Mediendatenbank/public/');
            exit();
        }
    }
    public function register()
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
}
