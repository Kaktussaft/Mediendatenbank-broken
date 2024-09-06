function initModal(modalId, openButtonId, closeButtonId) {
    const modal = document.getElementById(modalId);
    const openModalLink = document.getElementById(openButtonId);
    const closeModalButton = document.getElementById(closeButtonId);

    // Event-Listener für das Öffnen des Modals
    openModalLink.addEventListener('click', (event) => {
        event.preventDefault(); // Verhindert das Standardverhalten des Links
        modal.style.display = 'block'; // Zeigt das Modal an
    });

    // Event-Listener für das Schließen des Modals
    closeModalButton.addEventListener('click', () => {
        modal.style.display = 'none'; // Versteckt das Modal
    });

    // Schließen des Modals bei Klick außerhalb des Inhaltsbereichs
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none'; // Versteckt das Modal
        }
    });
}
function routeLogout(event) {
    event.preventDefault();
    console.log('Logout clicked');
    window.location.href = '/Mediendatenbank/public/UserController/logout/';

}

function updateUserNonAdmin() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const lastname = document.getElementById('lastname').value;
    const firstname = document.getElementById('firstname').value;

    fetch('http://localhost/Mediendatenbank/public/UserController/updateUser', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            username: name,
            email: email,
            lastname: lastname,
            firstname: firstname,
        })
    })
    .then(response => response.json())
        .then(data => {
            const statusMessage = document.getElementById('statusMessage');
            if (data.status === 'success') {
                statusMessage.textContent = data.message;
                statusMessage.style.color = 'green';
            } else {
                statusMessage.textContent = data.message;
                statusMessage.style.color = 'red';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.textContent = 'Ein Fehler ist aufgetreten.';
            statusMessage.style.color = 'red';
        });
}

function ladeAlle(){
    fetch('http://localhost/Mediendatenbank/public/MediumController/getAllMediums', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            const contentArea = document.getElementById('contentArea');
            const contentPath = '/Mediendatenbank/public';
            contentArea.innerHTML = '';
            Object.keys(data.data).forEach(type => {
                const mediaTypeList = data.data[type];
                mediaTypeList.forEach(medium => {
                    const element = document.createElement('img');
                    element.src = contentPath + medium.Dateipfad;  // Assuming 'Dateipfad' is the column for the file path
                    element.alt = medium.Titel || 'Kein Titel';  // Optional alt text
                    contentArea.appendChild(element);
                })
            });
            
        })
        .catch(error => console.error('Fehler beim Laden der Bilder:', error));
}

function ladeBilder() {
    fetch('http://localhost/Mediendatenbank/public/MediumController/getAllMediums', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            username: name,
            email: email,
            lastname: lastname,
            firstname: firstname
        })
    })
        .then(response => response.json())
        .then(data => {
            const bildContainer = document.getElementById('contentArea');
            bildContainer.innerHTML = '';
            data.forEach(bild => {
                // Erstellen eines img-Elements für jedes Bild
                const img = document.createElement('img');
                img.src = bild.Dateipfad; // Pfad zum Bild aus der Datenbank
                img.alt = bild.Titel; // Optionaler Alternativtext
                bildContainer.appendChild(img); // Hinzufügen des Bildes zum Container
            });
        })
        .catch(error => console.error('Fehler beim Laden der Bilder:', error));
}

function ladeAndere() {
    fetch('http://localhost/Mediendatenbank/public/MediumController/getAllMediums', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            username: name,
            email: email,
            lastname: lastname,
            firstname: firstname
        })
    })
        .then(response => response.json())
        .then(data => {
            const bildContainer = document.getElementById('contentArea');
            bildContainer.innerHTML = '';
            
        })
        .catch(error => console.error('Fehler beim Laden der Bilder:', error));
}

