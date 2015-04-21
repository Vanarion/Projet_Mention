<?
require_once('../class/classe_utilisateur.php');
$utilisateur = new User();
$utilisateur->setName('cyrill');
$utilisateur->setPassword('2031c6e347e257cc7b4959c37a7df833');
$utilisateur->connexion();
?>
