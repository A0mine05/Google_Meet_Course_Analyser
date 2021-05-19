
DROP TABLE IF EXISTS ETUDIANT;
DROP TABLE IF EXISTS ENSEIGNANT;
DROP TABLE IF EXISTS CLASSE;
DROP TABLE IF EXISTS MATIERE;
DROP TABLE IF EXISTS SCEANCE;
DROP TABLE IF EXISTS LISTE_PRESENCE;
DROP TABLE IF EXISTS REPONSE;
DROP TABLE IF EXISTS FORMULAIRE;

CREATE TABLE ETUDIANT(
    idEtudiant int primary key NOT NULL AUTO_INCREMENT,
    idParticipant int, 
    nomUtilisateur varchar(50),
    motDePasse varchar(50),
    email varchar(50),
    adresse varchar(50),
    localisation varchar(50),
    typeTerminal varchar(50)
);

CREATE TABLE ENSEIGNANT
(
    idAdmin int pRimary key NOT NULL AUTO_INCREMENT, 
    matricule int ,
    nomUtilisateur varchar(50),
    motDePasse varchar(50),
    email varchar(50),
    adresse varchar(50),
    localisation varchar(50),
    typeTerminal varchar(50)
);

CREATE TABLE CLASSE
(
    idClasse int primary key NOT NULL AUTO_INCREMENT,
    idParticipant varchar(50),
    effectif int,
    nomClasse varchar(50)
   
);

CREATE TABLE MATIERE
(
    idMatiere int primary key NOT NULL AUTO_INCREMENT,
    intitule varchar(20)
);

CREATE TABLE SCEANCE
(
    idSeance int primary key NOT NULL AUTO_INCREMENT,
    heureDebut date,
    heureFin date,
    nbrePartageEcran int,
    nbreActivationMicro int,
    nbreParticipant int,
    nbreConnexion int,
    nbreDeconnexion int
);

CREATE TABLE LISTE_PRESENCE
(
    idListePresence int primary key NOT NULL AUTO_INCREMENT,
    idParticipant int,
    nomUtilisateur varchar(50)
);

CREATE TABLE REPONSE
(
    reponse0 varchar(50),
    reponse1 varchar(50),
    reponse2 varchar(50),
    reponse3 varchar(50),
    reponse4 varchar(50),
    reponse5 varchar(50), 
    reponse6 varchar(50), 
    reponse7 varchar(50), 
    reponse8 varchar(50), 
    reponse9 varchar(50), 
    reponse10 varchar(50), 
    reponse11 varchar(50), 
    reponse12 varchar(50), 
    reponse13 varchar(50), 
    reponse14 varchar(50), 
    reponse15 varchar(50), 
    reponse16 varchar(50), 
    reponse17 varchar(50), 
    reponse18 varchar(50), 
    reponse19 varchar(50),
    reponse20 varchar(50)
);

CREATE TABLE FORMULAIRE
(
    idFormulaire int primary key NOT NULL AUTO_INCREMENT,
    heureF time,
    dateF datetime not null,
    score int
);