-- Insertion de personnes
INSERT INTO PERSONNE (prenom, nom, email, mdp)
VALUES ('Jean', 'Dupont', 'jean@example.com', 'motdepasse1'),
       ('Marie', 'Martin', 'marie@example.com', 'motdepasse2'),
       ('Pierre', 'Durand', 'pierre@example.com', 'motdepasse3'),
       ('Karim', 'Ahmoud', 'karim@example.com', 'motdepasse4'),
       ('David', 'Hébert', 'hebert@exemple.com', 'motdepasse5'),
       ('Franck', 'Butelle', 'butelle@exemple.com', 'motdepasse6'),
       ('Aurelie', 'Nassiet', 'nassiet@exemple.com', 'motdepasse7'),
       ('Vague', 'Kris', 'kris@exemple.com', 'motdepasse8'),
       ('Marya', 'Latif', 'latifmarya@gmail.com', 'mdp'),
       ('Aboubakar', 'Baouchi','aboubakar.baouchi@gmail.com', 'motdepasse10'),
       ('India','Cabo', 'ic@gmail.com', 'hihi');


-- Insertion de prestataires
INSERT INTO PRESTATAIRE (id_personne, interne)
VALUES (1, true),
       (2, True),
       (3, False),
       (4, True);
      
-- Insertion de commercial
INSERT INTO COMMERCIAL
VALUES (2, true), (9, true);

-- Insertion de gestionnaire
INSERT INTO GESTIONNAIRE (id_personne)
VALUES (9),
	   (10),
   (11);


-- Insertion de clients
INSERT INTO CLIENT  (nom_client)
VALUES ('Client A'),
       ('Client B');

-- insertion adresses


INSERT INTO  LOCALITE (cp, ville)
VALUES ( 95120, 'Ermont'),
	   ( 93800, 'Épinay-sur-Seine');

INSERT INTO TYPEVOIE (libelle)
VALUES ('Avenue'),
	   ('Rue'),
       ('Chemin');
       
INSERT INTO ADRESSE (numero, nom_voie,  id_type_voie, id_localite)
VALUES (1, 'nomVoie1', 1, 1),
	   (2, 'nomVoie2', 2, 2),
	   (1, 'nomVoie3', 2, 2);

-- Insertion de composantes
INSERT INTO COMPOSANTE ( nom_composante, id_client, id_adresse)
VALUES ('Composante X', 1, 1),
       ('Composante Y', 1, 2),
       ('Finance', 2, 3);

-- Insertion de missions
INSERT INTO MISSION (nom_mission, type_bdl, id_composante)
VALUES ('mission1', 'Heure', 1),
       ('mission2' ,'Journée', 2),
       ('mission3', 'Demi-journée', 3);

-- Insertion d'interlocuteurs
INSERT INTO INTERLOCUTEUR (id_personne)
VALUES (5),
       (6),
       (7),
       (8);

-- lien interlocuteurs composantes
INSERT INTO DIRIGE (id_composante, id_personne)
VALUES (1, 5),
	   (2, 6),
       (2, 8),
       (3, 7);

       
-- lien commercial composantes
INSERT INTO estDans (id_composante, id_personne)
VALUES (1, 2),
	   (2, 2),
       (3, 2);
      
-- lien prestataire missions
INSERT INTO travailleAvec (id_personne, id_mission)
VALUES (1, 2),
	   (1, 3),
	   (3, 1);

INSERT INTO BON_DE_LIVRAISON ( id_interlocuteur, id_mission, id_prestataire, mois)
VALUES (5, 1, 3, '2024-01'),
	   ( 6, 2, 2, '2024-02'),
     	   ( 7, 3, 1, '2024-01');
           
INSERT INTO ACTIVITE ( commentaire, date_bdl, id_personne, id_bdl)
VALUES ( 'com1', '2023-12-01', 1, 2),
	   ( 'com2', '2023-12-01', 1, 3),
       ( 'com3', '2023-12-01', 3, 1);

INSERT INTO NB_HEURE (id_activite, nb_heure)
VALUES (1, 70),
	   (2, 67);

INSERT INTO DEMI_JOUR (id_activite, nb_demi_journee)
VALUES (3, 2);















