<?
/* CALCUL DES POINTS DU ROLAND GAROSS */

// Création d'un nouvel objet score
require_once('../class/class_score.php');
$score = new score();

if(isset($_POST['id']))
  $add = $_POST['id'];
else
  $add = 0;
$add = 2;
// Définition des deux joueurs
$score->setJ1(1);
$score->setJ2(2);

// Récupération sous la forme $joueur['attribut_bdd']
$joueur1 = $score->recupererJoueur(1);
$joueur2 = $score->recupererJoueur(2);

$scoreActuel = $score->getScoreActuel();

/* DEBUT VERIFICATION DES POINTS POUR L'AJOUT */

if ($scoreActuel['val_score'] != 45 && $scoreActuel['val_score2'] != 45 &&
    $scoreActuel['val_score']  < 45 && $scoreActuel['val_score2']  < 45){
  // CAS : J1 et J2 ont moins de 45 pts tout les 2
  // On ajoute alors 15 pts au joueur sélectionné

  if($add == 1)
    $scoreActuel['val_score'] += 15;
  else if($add == 2)
    $scoreActuel['val_score2'] += 15;
  else
    $scoreActuel = null;
}
else if($scoreActuel['val_score'] == 45 && $scoreActuel['val_score2'] != 45 && $scoreActuel['val_score2'] < 45 && $add == 1)
{
  // CAS : J1 possède 45 pts, J2 possède moins de 45pts, J1 marque
  // On lui rajoute alors un set, et on réinitialise les jeux

  $scoreActuel['val_score'] = 0;
  $scoreActuel['val_score2'] = 0;
  $scoreActuel['score_set'] += 1;
}
else if($scoreActuel['val_score2'] == 45 && $scoreActuel['val_score'] != 45 && $scoreActuel['val_score'] < 45 && $add == 2)
{
  // Cas : J2 possède 45 pts, J1 possède moints de 45pts, J2 marque
  // On lui rajoute alors un set, et on réinitialise les jeux

  $scoreActuel['val_score'] = 0;
  $scoreActuel['val_score2'] = 0;
  $scoreActuel['score_set2'] += 1;
}
else if($scoreActuel['val_score'] == 45 && $scoreActuel['val_score2'] == 45 && $add == 1)
{
  // CAS : J1 et J2 possèdent 45 pts, J1 marque
  // On définit l'avantage pour J1

  $scoreActuel['avantage'] = 1;
}
else if($scoreActuel['val_score'] == 45 && $scoreActuel['val_score2'] == 45 && $add == 1)
{
  // CAS : J1 et J2 possèdent 45 pts, J2 marque
  // On définit l'avantage pour J2

  $scoreActuel['avantage'] = 2;
}

// Puis on met à jour le score en base
$score->UPD($scoreActuel);
var_dump($score);
?>
