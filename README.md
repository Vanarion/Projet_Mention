Projet Design Patterns / Java Pour Android
Projet de 40 heures + Soutenance.
Date butoir de remise : 29 Mai 2015
Mode de remise : Dépôt de l’ensemble des livrables demandés sur un espace « Cloud » (Google Drive, Dropbox, autre) dont vous nous communiquerez le lien et/ou les identifiants si nécessaire pour que l’on puisse étudier votre travail.
Soutenance : 3 Juin 2015 – Groupes de 5 personnes
Prérequis
 Design Patterns
 Java pour Android
Objectifs
Construire une solution d’accès mobile aux informations du tournoi de Roland Garros et de saisie des scores.
Cette solution sera composée de deux applications Android : une destinée à l'utilisateur pour consulter les scores en temps réel ; l'autre destinée à l'arbitre pour saisir les scores en cours du match.
Détails du projet
L'organisation du tournoi de Roland Garros désire vous confier la réalisation d'une application pour Android permettant à ses utilisateurs de consulter en temps réel les scores sur les différents terrains du tournoi.
L'application "utilisateur" :
L'application permettra de lister les différents matchs qui se déroulent sur les différents courts du tournoi.
Pour chaque court, l'application doit pouvoir afficher le nom des deux tennismen qui s'opposent (on ne gèrera pas le cas de matchs en double) et le score du match en cours, sous la forme :
Jeu en cours 1er set 2ème set 3ème set 4ème set 5ème set
Joueur 1* 30
6
4
7
1
Joueur 2 15
1
6
5
1
Dans l'exemple ci-dessus :
 L'astérisque indique que le joueur 1 est au service
 Le joueur 1 mène 2 sets à 1
 Le joueur 1 mène 30/15 dans le jeu en cours
 Les deux joueurs sont à 1 jeu partout dans le 4ème set
L'application "arbitre du match"
On imaginera la saisie des scores comme une autre application Android mise à la disposition de l'arbitre sur sa chaise. Elle permettra :
1. De choisir le court sur lequel se déroule match,
2. De saisir le nom des deux joueurs qui s'affrontent
Une fois ces informations saisies, l'application affiche deux boutons : l'un avec le nom du joueur 1, l'autre avec le nom du joueur 2. Quand le joueur 1 marque le point, l'arbitre appuie sur le bouton qui correspond au joueur 1. Quand c'est le joueur 2 qui marque le point, l'arbitre appuie sur le bouton qui correspond au joueur 2. Les points sont ensuite calculés automatiquement.
Vous développerez enfin le moyen de faire communiquer l'application mobile "utilisateur" avec ce qui a été saisi par l'application "arbitre", par exemple par une couche intermédiaire (appelée "serveur" dans la suite du document) dans le langage de votre choix.
INFORMATIONS UTILES
Les matchs à Roland Garros se déroulent en 3 sets gagnants (c'est-à-dire que le premier joueur à gagner 3 sets est déclaré vainqueur).
On considérera les 3 courts majeurs de Roland Garros (Court Philippe Chatrier, Court Suzanne Lenglen, Court n°1) ainsi que 2 cours annexes (Court Annexe 1 et Court Annexe 2).
Si vous n'êtes pas familier avec la règle de comptage des points au tennis, prenez le temps de bien les comprendre, c'est important pour le comptage automatique des points (ex ici : http://www.linternaute.com/sport/tennis/les-regles-du-tennis/le-decompte-des-points.shtml )
Contraintes
La partie mobile se fera impérativement en Java pour Android (Application "Utilisateur" et Application "Arbitre").
Pour la partie serveur faisant le lien entre la saisie des points et sa consultation, vous utiliserez la technologie de votre choix.
Livrables attendus
 Tous les documents d’analyse et de conception que vous serez amenés à créer (Schémas divers, UML, MCD, …)
 Les codes sources Java pour Android
 Les codes sources et BDD de la partie serveur (éventuellement avec une image du serveur web)
Etapes
Voici une suggestion des étapes à suivre pour mener à bien votre projet. Ce découpage n’est pas imposé.
ETAPE 1 – ANALYSE ET DESIGN PATTERNS
 Analyse du besoin exprimé dans la partie « Détails du projet » et assimilation des règles du comptage des points.
 Réflexions sur l’architecture générale du projet
 Réflexions sur le(s) Design Pattern(s) à adopter côté serveur et côté application Android.
 Conception générale du projet (Schémas, Diagrammes, …)
 Choix du langage côté serveur (code et BDD)
 …
ETAPE 2 – SERVEUR
La partie serveur ne nécessite pas d’interface graphique. Elle ne sert qu’à centraliser les informations et les rendre disponibles aux applications mobiles.
 Mise en oeuvre de l’environnement serveur
 Création de l’architecture SGBD
 Développement des processus métier (calcul des points notamment).
ETAPE 3 – APPLICATIONS ANDROID
Côté applications Android :
Application "Arbitre"
 Connexion au serveur
 Choix du terrain
 Saisie des joueurs
 Saisie des points
Application "Utilisateur"
 Connexion au serveur
 Récupération des matchs
 Choix du match à suivre
 Affichage du score en temps réel
ETAPE 4 – FINALISATION
 Finalisation de la documentation de l’application
 Mise en oeuvre d’une démo fonctionnelle
 Préparation de la soutenance
ETAPE 5 – SOUTENANCE
 Présentation de votre travail (répartition, architecture de votre projet, analyse, choix…) – 10 à 15 mn
 Démonstration – 10 mn
 Questions/Réponses – 10 mn
