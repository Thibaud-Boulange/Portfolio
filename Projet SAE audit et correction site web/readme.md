# TEAM E-PHENIX

Repository pour le projet de S4 du groupe E-phenix\
Lien de demo : https://jupyter.univ-paris13.fr/~12200893/

## Membres du groupe
- BOUAZZAOUI Soheib
- SALMI Sofiane
- BOULANGE Thibaud
- GONCALVES Nelson
- ATICI Michael

## Description

Ce dépôt contient le projet de la SAE (Situation d'Apprentissage et d'Évaluation) intitulée "Nom de la SAE". Ce projet vise à développer un site web interactif et fonctionnel dans le cadre de notre cursus universitaire. Le projet met en œuvre diverses technologies web et suit les meilleures pratiques de développement collaboratif.

L'objectif principal de cette SAE est de permettre aux étudiants de renforcer leurs compétences en programmation web, en travail d'équipe, et en gestion de projet, tout en appliquant les connaissances théoriques acquises durant le semestre.
## Copier le projet

Cloner le repo dans un dossier git\
Exemple de pull sur la branche Main du GitLab

```bash
└─$ cd NomDuDossier/
└─$ git init
└─$ git remote add origin https://gitlab.sorbonne-paris-nord.fr/12200893/sae-s4-groupe-e-phenix.git
└─$ git checkout main                                              
└─$ git pull origin main                                              
```
## (Pour les contributeurs) Push le projet

❗IMPORTANT❗:Toujours pull avant de push, reiquede casser la branche main si trop de retard sur les commits\
Exemple de push sur la branche Main du GitLab

```git
└─$ git checkout main   
└─$ git pull origin main                                           
└─$ git add modification.fichier 
└─$ git commit -m "message de modification"
└─$ git push -u origin main 
```
## Installer le projet

Deplacez le dossier dans le repertoire /var/www/html et assurez vous de bien mettre en place les droits

- Copiez le dossier du projet et donnez les droits à votre utilisateur 
```bash
└─$ cp -r NomDuDossier/ /var/www/html && cd /var/www/html/
└─$ sudo chown utilisateur NomDuDossier/*
```
- Changez les credentials dans le fichier credentials.php situé dans le dossier Models/ du projet
```bash
└─$ vim Models/credentials.php
```
```php
$dsn='pgsql:host=localhost;dbname=extranet';
$login='marya';
$mdp='';
```
- Assurez vous que PHP est bien configuré sur votre serveur apache et rendez vous sur l'adresse suivante
[http://127.0.0.1/WebMicaa/](http://127.0.0.1/WebMicaa/)

Créez une nouvelle BDD pour le projet:
- lancez postgresql
```bash
└─$ su postgres
└─$ psql
```
- Créez une nouvelle Database et se connecter 
```psql
postgres=# create database s4
postgres=# \c s4
```
- Importez le fichier de construction de la bdd et le fichier d'alimentation(si ca ne marche pas, donnez les droits a l'utilisateur postgres)
```psql
s4=# \i bdd.sql
s4=# \i contenuBdd.sql 
```
