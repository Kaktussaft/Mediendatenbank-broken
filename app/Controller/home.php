<?php
namespace App\Controller;

use App\Core\Controller;

class Home 
{
   public function index($name = '')   //calling in models
   {
     $this->view('LandingPage', ['name' => $name]);
   }
 
}