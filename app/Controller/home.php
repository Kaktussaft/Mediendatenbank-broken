<?php

class Home extends Controller
{
   public function index($name = '')   //calling in models
   {
    //  $user = $this->model('UserModel');
    //  $user->name = 'Alex';

     $this->view('home/LandingPage', ['name' => $name]);
   }
 
}