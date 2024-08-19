<?php

namespace Webapp\src\Controller;
use Webapp\src\Model\UserModel;

class UserController{

    public function landingPageView() {
        try {
            // Logic to handle the landing page view
            return "Landing Page";
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function loginView() {
        try {
            // Logic to handle the login view
            return "Login Page";
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function userView() {
        try {
            // Logic to handle the user view
            return "User Page";
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function adminView() {
        try {
            // Logic to handle the admin view
            return "Admin Page";
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}