<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <script type="text/javascript" src="/Mediendatenbank/app/View/script/SharedScripts.js"></script>
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/PopUps.css">
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/UserPage.css">

</head>

<body>
    <div class="view">
        <img src="/Mediendatenbank/Design/rakete.png" alt="" width="150px" height="150px">
        <span>Userview</span>
    </div>   
    
    <hr>

    <div class="modifyAccountAndLogout">
        <a href="#" id="toggle-admin-view">Adminview</a>
        <a href="#" id="open-accountModification-modal">Konto</a>
        <a href="#" id="logout">Logout</a>
    </div>
    <div class="upAndNav">
        <div class="uploadButton">
            <input type="image" id="open-upload-modal" src="/Mediendatenbank/Design/Upload-Button-Engine-style.png" alt="Neu..." width="150px" height="150px">
        </div>
        <div class="navigationPanel">
            <button onclick="test2('hier wird navigiert')" class="navButton">Alle Medien</button>
            <button onclick="test2('hier wird navigiert')" class="navButton">Fotos</button>
            <button onclick="test2('hier wird navigiert')" class="navButton">Videos</button>
            <button onclick="test2('hier wird navigiert')" class="navButton">E-Books</button>
            <button onclick="test2('hier wird navigiert')" class="navButton">Hörbücher</button>
        </div>
    </div>
    <div class="content">
        <div class="sortAndFilter">
            <div class="sorting">
                <form onchange="script/SortResults.js" class="sortingForm">
                    <div class="sortSelection">
                        <select name="sortingcriteria" id="sortingcriteria" class="sortCriteria">
                            <option selected>Name</option>
                            <option>Erstellungsdatum</option>
                            <option>Größe</option>
                        </select>
                    </div>    
                    <div class="sortRadios">
                        <input type="radio" name="sortingorder" value="up" checked>aufsteigend<br>
                        <input type="radio" name="sortingorder" value="down">absteigend
                    </div>
                </form>
            </div>
            <div class="labelling">
                <div class="labelList"></div>
                    <form action="">
                        <!-- ToDo: Dynamisches Auflisten der Labels -->
                    </form>
                <div class="modifyLabels">
                    <button id="open-modifylabel-modal" class="modifyLabelButton">Schlagwörter bearbeiten...</button>
                </div>
            </div>
        </div>
        <div class="contentArea">
            Hier kommt der Content hin
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

    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-upload-modal">&times;</span>
            <h2>Medien hochladen</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <p><input type="file" name="filefield[]" multiple="multiple"></p>
                <p><input type="submit" value="Hochladen"></p>
            </form>
        </div>
    </div>

    <div id="modifyLabelModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-modifylabel-modal">&times;</span>
            <h2>Meine Schlagwörter bearbeiten</h2>
            <p>Hier entsteht noch eine Logik fürs Bearbeiten der Schlagwörter.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initModal('accountModificationModal', 'open-accountModification-modal', 'close-accountModification-modal');
            initModal('uploadModal', 'open-upload-modal', 'close-upload-modal');
            initModal('modifyLabelModal', 'open-modifylabel-modal', 'close-modifylabel-modal');

            document.getElementById('toggle-admin-view').addEventListener('click', function(event) {
                event.preventDefault();
                history.replaceState(null, '', '/Mediendatenbank/public/UserController/toggleAdminView/');
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