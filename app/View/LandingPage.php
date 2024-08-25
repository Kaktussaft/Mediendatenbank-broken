<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script type="text/javascript" src="../app/View/script/SharedScripts.js"></script>
    <link rel="stylesheet" href="../app/View/style/PopUps.css">
</head>
<body>
    <h1>Landing Page</h1>
    <div class="loginForm">
        <form id="loginForm" action="UserController/login/" method="POST" onsubmit="updateFormLoginAction()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="hidden" name="Routing" value="login">
            <button type="submit">Login</button>
        </form>
        <p>Noch keinen Login? Registriere dich 
            <a href="#" id="open-registration-modal">hier.</a>
        </p>
    </div>

    <div id="registrationModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-registration-modal">&times;</span>
            <h2>Registrierung</h2>
            <form>
            <label for="username">Username:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">E-Mail:</label>
                <input type="text" id="email" name="email" required>
                <br>
                <label for="lastname">Nachname:</label>
                <input type="text" id="lastname" name="lastname" required>
                <br>
                <label for="firstname">Vorname:</label>
                <input type="text" id="firstname" name="firstname" required>
                <br><br>
                <button type="submit">Registrieren</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>

<script>
    
    function updateFormLoginAction(){
        var username = document.getElementById('username').value;
        var form = document.getElementsByTagName('form')[0];
        form.action = 'UserController/login/' + username;
    };
    
    initModal('registrationModal', 'open-registration-modal', 'close-registration-modal');

</script>







