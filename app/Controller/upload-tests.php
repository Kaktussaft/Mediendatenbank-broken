<?php
// Überprüfen, ob eine Datei hochgeladen wurde
if(isset($_FILES['datei']) && $_FILES['datei']['error'] == 0) {
    // Dateiinformationen
    $dateiname = $_FILES['datei']['name'];
    $dateityp = $_FILES['datei']['type'];
    $dateigroesse = $_FILES['datei']['size'];
    $tmp_name = $_FILES['datei']['tmp_name'];

    // Zielverzeichnis
    $zielverzeichnis = 'uploads/';  

        $neuer_dateiname = uniqid() . '.' . $dateiname;
        
        // Vollständiger Pfad der Zieldatei
        $zielpfad = $zielverzeichnis . $neuer_dateiname;

        // Datei in das Zielverzeichnis verschieben
        if(move_uploaded_file($tmp_name, $zielpfad)) {
            echo "Die Datei wurde erfolgreich hochgeladen.<br>";
            echo "<img src='$zielpfad' alt='Hochgeladenes Bild'>";
        } else {
            echo "Fehler beim Hochladen der Datei.";
        }
}
else {
    echo "Es wurde keine Datei hochgeladen oder es ist ein Fehler aufgetreten.";
}

?>