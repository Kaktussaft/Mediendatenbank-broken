<?php
namespace App\Controller;

use App\Core\Controller;
use App\Core\App;


class Home extends Controller
{
   public function index($name = '')   //calling in models
   {
     $this->view('LandingPage', ['name' => $name]);
   }
 
}