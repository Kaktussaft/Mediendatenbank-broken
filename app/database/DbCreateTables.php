<?php

Create database Web42;  

public function createKeyWordTable()
{
    $sql = "CREATE TABLE Schlagworte (Schlagwort_ID int auto_increment primary key, Schlagwort_Name varchar(20) not null);";
    $this->db->query($sql);
}
//create table Schlagworte (Schlagwort_ID int auto_increment primary key, Schlagwort_Name varchar(20) not null);	


#Hinweis: wegen auto_increment reicht es wenn man in Schlagwort_Name aktiv einfügt
#z.B.
#Insert into Schlagworte(Schlagwort_Name) Values('Tiere');    
#Schlagwort_ID startet automatisch bei 1

create table Benutzer (Benutzer_ID int auto_increment primary key, Benutzername varchar(20) not null, EMail varchar(30) not null, Nachname varchar(30) not null, Vorname varchar(30) not null, Rolle varchar(10) not null, Registrierungsdatum date not null);

create table Ebooks (ebook_ID int auto_increment primary key, Titel varchar(30) not null, Beschreibung varchar(50), Typ varchar(10) not null, Dateigröße varchar(20) not null, Hochlade_datum date not null, Autor varchar(30), Seitenzahl int, Benutzer_ID int not null, foreign key(Benutzer_ID) References Benutzer(Benutzer_ID));

create table Hörbücher (Hörbuch_ID int auto_increment primary key, Titel varchar(30) not null, Beschreibung varchar(50), Typ varchar(10) not null, Dateigröße varchar(20) not null, Hochlade_datum date not null, Sprecher varchar(30), Dauer time, Benutzer_ID int not null, foreign key(Benutzer_ID) References Benutzer(Benutzer_ID));

create table Videos (Video_ID int auto_increment primary key, Titel varchar(30) not null, Beschreibung varchar(50), Typ varchar(10) not null, Dateigröße varchar(20) not null, Hochlade_datum date not null, Auslösung varchar(10), Dauer time, Benutzer_ID int not null, foreign key(Benutzer_ID) References Benutzer(Benutzer_ID));

create table Fotos (Foto_ID int auto_increment primary key, Titel varchar(30) not null, Beschreibung varchar(50), Typ varchar(10) not null, Dateigröße varchar(20) not null, Hochlade_datum date not null, Auslösung varchar(10), Benutzer_ID int not null, foreign key(Benutzer_ID) References Benutzer(Benutzer_ID));

create table SchlagwortMedien (Schlagwort_ID int not null, foreign key(Schlagwort_ID) References schlagworte(Schl
agwort_ID));
# Weiter mit Alter table weil das sonst mit den ganzen Fremdschlüsseln so ein Salat wurde. Keine Ahnung, ob das überhaupt als ein Befehl geht
Alter table SchlagwortMedien Add column (ebook_ID int not null, foreign key(ebook_ID) References ebooks(ebook_ID));
Alter table SchlagwortMedien Add column (Hörbuch_ID int not null, foreign key(Hörbuch_ID) References Hörbücher(Hörbuch_ID));
Alter table SchlagwortMedien Add column (Video_ID int not null, foreign key(Video_ID) References Videos(Video_ID));
Alter table SchlagwortMedien Add column (Foto_ID int not null, foreign key(Foto_ID) References Fotos(Foto_ID));










