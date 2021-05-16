CREATE DATABASE googleMeet;
USE googleMeet;



CREATE TABLE IF NOT EXIST ETUDIANT(
    idEtudiant int primary key,
    idParticipant, 
    nomUtilisateur varchar(50),
    motDePasse varchar(50),
    email varchar(50),
    adresse varchar(50),
    localisation varchar(50),
    typeTerminal varchar(50)
);

CREATE TABLE IF NOT EXIST ENSEIGNANT
(
    matricule int primary key,
    idAdmin int pimary key, 
    nomUtilisateur varchar(50),
    motDePasse varchar(50),
    email varchar(50),
    adresse varchar(50),
    localisation varchar(50),
    typeTerminal varchar(50)
);

CREATE TABLE IF NOT EXIST CLASSE
(
    idClasse int primary key,
    idParticipant varchar(50),
   
);

CREATE TABLE IF NOT EXIST MATIERE
(
    idMatiere int primary key,
    intitule varchar(20)
);

CREATE TABLE IF NOT EXIST SCEANCE
(
    idSeance int primary key,
    heureDebut date,
    heureFin date,
    nbrePartageEcran int,
    nbreActivationMicro int,
    nbreParticipant int,
    nbreConnexion int,
    nbreDeconnexion int
);

CREATE TABLE IF NOT EXIST LISTE_PRESENCE
(
    idListePresence int primary key,
    idParticipant int,
    nomUtilisateur varchar(50)
);