<!DOCTYPE html>
<html>
<head>
    <title>User</title>
</head>
<body>
    <h1>Userview</h1>
    <div>
        <form action="WEB42\WEB42\src\Controller\UserController.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input  type="hidden" name="Routing" value="logout">
            <button type="submit">Logout</button>
        </form>
    </div>
    <div>
        <form action="WEB42\WEB42\src\Controller\UserController.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input  type="hidden" name="Routing" value="toggle adminView">
            <button type="submit">toggle adminView</button>
        </form>
    </div>
</body>
</html>