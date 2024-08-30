function initModal(modalId, openButtonId, closeButtonId){
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
