<?php
namespace App\Controller;

use App\Core\Controller;

class Home extends Controller
{
   public function index($name = '')   //calling in models
   {
     $this->view('LandingPage', ['name' => $name]);
   }
 
}