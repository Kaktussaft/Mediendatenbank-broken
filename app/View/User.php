<?php
$isAdmin = $data['isAdmin'];
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <script type="text/javascript" src="/Mediendatenbank/app/view/script/SharedScripts.js"></script>
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/PopUps.css">
    <link rel="stylesheet" href="/Mediendatenbank/app/View/style/UserPage.css">

</head>

<body>
    <div class="view">
        <img src="/Mediendatenbank/Design/rakete.png" alt="" width="100px" height="100px">
        <span>UP - <br>Space</span>
    </div>

    <hr>

    <div class="modifyAccountAndLogout">
        <div class="linkSet">
            <?php if ($isAdmin == "true"): ?>
                <a href="#" id="toggle-admin-view">Adminview</a>
            <?php endif; ?>
            <a href="#" id="open-accountModification-modal">Konto</a>
            <a href="" id="logout" onclick="routeLogout(event)">Logout</a>
        </div>
        <div class="searchBar">
            <input type="text" id="searchBar" placeholder="Suche...">
        </div>
    </div>
    <div class="upAndNav">
        <div class="uploadButton">
            <input type="image" id="open-upload-modal" src="/Mediendatenbank/Design/Upload-Button-Engine-style.png" alt="Neu..." width="150px" height="150px">
        </div>
        <div class="navigationPanel">
            <button id="navAllMedia" class="navButton">Alle Medien</button>
            <button id="navPhotos" class="navButton">Fotos</button>
            <button id="navVideos" class="navButton">Videos</button>
            <button id="navEBooks" class="navButton">E-Books</button>
            <button id="navAudioBooks" class="navButton">Hörbücher</button>
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
        <div class="contentArea" id="contentArea"></div>
    </div>

    <div id="accountModificationModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-accountModification-modal">&times;</span>
            <h2>Konto bearbeiten</h2>
            <form id="uploadForm" action="http://localhost/Mediendatenbank/public/UserController/updateUser" method="post" enctype="multipart/form-data" target="responseWindow">
                <label for="name">Username:</label>
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
                <input type="submit" value="Abschicken">
                <iframe name="responseWindow" id="responseWindow" style="display:none;"></iframe>
            </form>
        </div>
    </div>

    <div id="uploadModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-upload-modal">&times;</span>
            <h2>Medien hochladen</h2>
            <form id="uploadForm" action="http://localhost/Mediendatenbank/public/MediumController/uploadFile" method="post" enctype="multipart/form-data" target="responseWindow">
                <p><input type="file" id="fileInput" name="file[]" multiple="multiple"></p>
                <p><input type="submit" value="Hochladen"></p>
            </form>
            <iframe name="responseWindow" id="responseWindow" style="display:none;"></iframe>
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

            const responseWindow = document.getElementById('responseWindow');
            responseWindow.addEventListener('load', function(){
                uploadModal.style.display = 'none';
            });
            
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
            document.getElementById('searchBar').addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    // logik für Suche
                }
            });
            document.getElementById('navAllMedia').addEventListener('click', function(event) {
                ladeAlle();
            });
            document.getElementById('navPhotos').addEventListener('click', function(event) {
                ladeBilder();
            });
            document.getElementById('navVideos').addEventListener('click', function(event) {
                ladeAndere();
            });
            document.getElementById('navEBooks').addEventListener('click', function(event) {
                ladeAndere();
            });
            document.getElementById('navAudioBooks').addEventListener('click', function(event) {
                ladeAndere();
            });
        });
    </script>
</body>

</html>