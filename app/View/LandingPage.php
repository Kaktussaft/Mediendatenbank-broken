<?php

namespace scr\View;
use src\Controller\UserController;

$username = $_POST['username'] ?? '';
echo $username;
$usercontroller = new UserController();
$usercontroller->login($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <h1>Landing Page</h1>
    <div>
        <form action="LandingPage.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="hidden" name="Routing" value="login">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>







