<?php

class UserController extends Controller
{
    public function login($username = '')
    {
        if ($username == '1234') {
            $this->view('User', ['username' => $username]);
        }
        else{
            $this->view('LandingPage', 'Username not found');
        }
    }
}
