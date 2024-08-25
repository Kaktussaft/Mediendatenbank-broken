<?php

class Home extends Controller
{
   public function index($name = '')   //calling in models
   {
     $this->view('LandingPage', ['name' => $name]);
   }
 
}