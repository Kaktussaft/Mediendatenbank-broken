<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script type="text/javascript" src="/Mediendatenbank/app/View/script/SharedScripts.js"></script>
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/PopUps.css">
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/AdminPage.css">
</head>

<body>
    <div class="view">
        <img src="/Mediendatenbank/Design/rakete.png" alt="" width="100px" height="100px">
        <span>ADMIN - <br>Space</span>
    </div>   
    
    <hr>

    <div class="toggleViewAndLogout">
        <a href="#" id="toggle-user-view">Userview</a>
        <a href="#" id="logout">Logout</a>
    </div>
    
    <div class="navigationPanel">
        <button onclick="test2('hier wird navigiert')">Dashboard</button>
        <button id="open-accountModification-modal">Nutzerverwaltung</button>
        <!--- <button onclick="test2('hier wird navigiert')">Schlagwortverwaltung</button> --->
    </div>
    <div class="contentArea">
        Hier kommt der Content hin
    </div>

    <div id="accountCreationModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-accountCreation-modal">&times;</span>
            <h2>Konto hinzufügen</h2>
            <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
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
                <button type="submit">Erstellen</button>
            </form>
        </div>
    </div>

    <div id="accountModificationModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-accountModification-modal">&times;</span>
            <h2>Konto bearbeiten</h2>
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
                <button type="submit">Abschicken</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initModal('accountModificationModal', 'open-accountModification-modal', 'close-accountModification-modal')

            document.getElementById('toggle-user-view').addEventListener('click', function(event) {
                event.preventDefault();
                history.replaceState(null, '', '/Mediendatenbank/public/UserController/toggleUserView/');
                window.location.reload();
            });

            document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                history.replaceState(null, '', '/Mediendatenbank/public/UserController/logout/');
                window.location.reload();
            });
        });
    </script>
</body>

</html>