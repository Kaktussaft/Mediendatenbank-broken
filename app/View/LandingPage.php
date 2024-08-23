<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script type="text/javascript" src="script/SharedScripts.js"></script>
</head>
<body>
    <h1>Landing Page</h1>
    <div>
        <form id="loginForm" action="UserController/login/" method="POST" onsubmit="updateFormLoginAction()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="hidden" name="Routing" value="login">
            <button type="submit">Login</button>
            <p>Noch keinen Login? Registriere dich 
                <a href="javascript:void(0);" onclick="test('test')">hier.</a>
            </p>
        </form>
    </div>
</body>
</html>

<script>
    function updateFormLoginAction(){
        var username = document.getElementById('username').value;
        var form = document.getElementsByTagName('form')[0];
        form.action = 'UserController/login/' + username;
    }
</script>







