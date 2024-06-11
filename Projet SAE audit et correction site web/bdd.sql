DROP TABLE if exists PERSONNE CASCADE;
DROP TABLE if exists PRESTATAIRE CASCADE;
DROP TABLE if exists CLIENT CASCADE;
DROP TABLE if exists INTERLOCUTEUR CASCADE;
DROP TABLE if exists COMMERCIAL CASCADE;
DROP TABLE if exists ADMINISTRATEUR CASCADE;
DROP TABLE if exists GESTIONNAIRE CASCADE;
DROP TABLE if exists TEXTE CASCADE;
DROP TABLE if exists Localite CASCADE;
DROP TABLE if exists TypeVoie CASCADE;
DROP TABLE if exists Adresse CASCADE;
DROP TABLE if exists COMPOSANTE CASCADE;
DROP TABLE if exists MISSION CASCADE;
DROP TABLE if exists BON_DE_LIVRAISON CASCADE;
DROP TABLE if exists ACTIVITE CASCADE;
DROP TABLE if exists nb_heure CASCADE;
DROP TABLE if exists JOUR CASCADE;
DROP TABLE if exists DEMI_JOUR CASCADE;
DROP TABLE if exists dirige CASCADE;
DROP TABLE if exists estDans CASCADE;
DROP TABLE if exists travailleAvec CASCADE;

CREATE TABLE PERSONNE (
   id_personne SERIAL PRIMARY KEY,
   prenom VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   email VARCHAR(50) UNIQUE,
   mdp VARCHAR(50)
);

CREATE TABLE PRESTATAIRE (
   id_personne SERIAL PRIMARY KEY,
   interne BOOLEAN,
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE CLIENT (
   id_client SERIAL PRIMARY KEY,
   nom_client VARCHAR(50) NOT NULL,
   telephone_client VARCHAR(50)
);

CREATE TABLE INTERLOCUTEUR (
   id_personne SERIAL PRIMARY KEY,
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE COMMERCIAL (
   id_personne SERIAL PRIMARY KEY,
   interne BOOLEAN,
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE ADMINISTRATEUR (
   id_personne SERIAL PRIMARY KEY,
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE GESTIONNAIRE (
   id_personne SERIAL PRIMARY KEY,
   FOREIGN KEY(id_personne) REFERENCES PERSONNE(id_personne)
);

CREATE TABLE TEXTE (
   id_texte INT PRIMARY KEY
);

CREATE TABLE Localite (
   id_localite SERIAL PRIMARY KEY,
   cp INT,
   ville VARCHAR(50)
);

CREATE TABLE TypeVoie (
   id_type_voie SERIAL PRIMARY KEY,
   libelle VARCHAR(50)
);

CREATE TABLE Adresse (
   id_adresse SERIAL PRIMARY KEY,
   numero INT,
   nom_voie VARCHAR(50),
   id_type_voie SERIAL NOT NULL,
   id_localite SERIAL NOT NULL,
   FOREIGN KEY(id_type_voie) REFERENCES TypeVoie(id_type_voie),
   FOREIGN KEY(id_localite) REFERENCES Localite(id_localite)
);

CREATE TABLE COMPOSANTE (
   id_composante SERIAL PRIMARY KEY,
   nom_composante VARCHAR(50),
   id_adresse SERIAL NOT NULL,
   id_client SERIAL NOT NULL,
   FOREIGN KEY(id_adresse) REFERENCES Adresse(id_adresse),
   FOREIGN KEY(id_client) REFERENCES CLIENT(id_client)
);

CREATE TABLE MISSION (
   id_mission SERIAL PRIMARY KEY,
   type_bdl VARCHAR(50) NOT NULL,
   nom_mission VARCHAR(50),
   date_debut VARCHAR(50) ,
   id_composante SERIAL NOT NULL,
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante)
);

CREATE TABLE BON_DE_LIVRAISON (
   id_bdl SERIAL PRIMARY KEY,
   est_valide BOOLEAN,
   mois VARCHAR(50),
   commentaire VARCHAR(50),
   signatureInterlocuteur VARCHAR(50),
   signaturePrestataire VARCHAR(50),
   id_interlocuteur INT,
   id_prestataire SERIAL NOT NULL,
   id_mission SERIAL NOT NULL,
   FOREIGN KEY(id_interlocuteur) REFERENCES INTERLOCUTEUR(id_personne),
   FOREIGN KEY(id_prestataire) REFERENCES PRESTATAIRE(id_personne),
   FOREIGN KEY(id_mission) REFERENCES MISSION(id_mission)
);

CREATE TABLE ACTIVITE (
   id_activite SERIAL PRIMARY KEY,
   commentaire VARCHAR(50),
   date_bdl VARCHAR(50),
   id_personne SERIAL NOT NULL,
   id_bdl SERIAL NOT NULL,
   FOREIGN KEY(id_personne) REFERENCES PRESTATAIRE(id_personne),
   FOREIGN KEY(id_bdl) REFERENCES BON_DE_LIVRAISON(id_bdl)
);

CREATE TABLE NB_HEURE (
   id_activite SERIAL PRIMARY KEY,
   nb_heure INT,
   FOREIGN KEY(id_activite) REFERENCES ACTIVITE(id_activite)
);

CREATE TABLE JOUR (
   id_activite SERIAL PRIMARY KEY,
   journee BOOLEAN,
   debut_heure_supp INT,
   fin_heure_supp INT,
   FOREIGN KEY(id_activite) REFERENCES ACTIVITE(id_activite)
);

CREATE TABLE DEMI_JOUR (
   id_activite SERIAL PRIMARY KEY,
   nb_demi_journee INT, 
   FOREIGN KEY(id_activite) REFERENCES ACTIVITE(id_activite)
);

CREATE TABLE dirige (
   id_composante SERIAL,
   id_personne SERIAL,
   PRIMARY KEY(id_composante, id_personne),
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante),
   FOREIGN KEY(id_personne) REFERENCES INTERLOCUTEUR(id_personne)
);

CREATE TABLE estDans (
   id_composante SERIAL,
   id_personne SERIAL,
   PRIMARY KEY(id_composante, id_personne),
   FOREIGN KEY(id_composante) REFERENCES COMPOSANTE(id_composante),
   FOREIGN KEY(id_personne) REFERENCES COMMERCIAL(id_personne)
);

CREATE TABLE travailleAvec (
   id_personne SERIAL,
   id_mission SERIAL,
   PRIMARY KEY(id_personne, id_mission),
   FOREIGN KEY(id_personne) REFERENCES PRESTATAIRE(id_personne),
   FOREIGN KEY(id_mission) REFERENCES MISSION(id_mission)
);

