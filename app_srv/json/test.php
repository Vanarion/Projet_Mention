<?
//require_once('../class/classe_match.php');
//require_once('../class/classe_joueur.php');
// require_once('../class/classe_utilisateur.php');
require_once('../class/class_score.php');


/* Vérification de date :
$p = "2015-01-01 01:01:01";
$match->setDate($p);
echo $match->getDate();
*/

/* Récupérer un match X
$match = new match();
$match->setID(3);
$match->selectionnerMatch();
$infoJoueur['joueur1'] = $match->getJoueur(1);
var_dump($infoJoueur);
*/

// ADDITIONEL : Lancer un match
//$match->lancerMatch();
//*/


/* Récupérer tous les match existant
$match = new match();
$res = $match->getAllMatch();
*/

/* Récupération d'un joueur par nom/prénom
$j = new joueur();
$j->setNom("alex");
$j->setPrenom("alex");
$j->getJoueurParNom();
*/

/* Récupération d'un joueur par son ID
$j2 = new joueur();
$j2->setID(1);
$j2->getJoueurParID();
*/

/* Test de connexion d'un utilisateur
$u = new user();
$u->setName('unUser');
$u->setPassword('33a0e4061be498c4944dfe8c99a35b06');
$u->connexion();
*/

/* Création d'un utilisateur avec mot de passe crypté automatiquement
$u2 = new user();
$u2->setName("alexandre.verrier");
$u2->setPassword("monMotDePasse33SuperComplique");
$u2->ADD();
/* Cette fonction va automatiquement crypté mon mot de passe en md5
 afin de l'ajouter en base, il faudra donc vériifier lors de la connexion
 Que le md5 du mot de passe saisi dans le formulaire est égal à celui en base
 P.S : La suppresion d'un utilisateur se fait avec son login
*/

/* Récupération d'un joueur sur un score
$score = new score();
$score->setJ1(1);
$j1 = $score->recupererJoueur(1);
echo $j1['nom_joueur'];
*/


?>
