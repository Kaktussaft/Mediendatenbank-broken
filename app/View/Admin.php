<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script type="text/javascript" src="script/SharedScripts.js"></script>
    <link rel="stylesheet" href="style/popups.css">
</head>
<body>
    <h1>Adminview</h1>
    <div class="modifyAccountAndLogout">
        <a href="User.html">-> Userview</a>
        <a href="#" id="open-accountModification-modal">Konto</a>
        <a href="">Logout</a>
    </div>
    <div class="navigationpanel">
        <button onclick="test2('hier wird navigiert')">Dashboard</button>
        <button onclick="test2('hier wird navigiert')">Nutzerverwaltung</button>
        <button onclick="test2('hier wird navigiert')">Schlagwortverwaltung</button>
    </div>
    <div class="contentArea">
        Hier kommt der Content hin
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
</body>
</html>

<script>
    initModal('accountModificationModal', 'open-accountModification-modal', 'close-accountModification-modal')
</script>