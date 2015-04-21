<?

//Classe : classe_match.php
//Auteur : VERRIER Alexandre
//Date   : 25/02/15
//Texte  : Classe permettant la gestion d'un match
//Actions: Login / SEL / ADD / DEL

require_once('classe_database.php');

class match
{
  private $id_match;
  private $stade_match;
  private $date_match;
  private $enCours;

  /* GETTERS / SETTERS */
  function getID()
  {
    return $this->id_match;
  }

  function setID($p_id)
  {
    $this->id_match = $p_id;
  }

  function getStade()
  {
    return $this->stade_match;
  }

  function setStade($p_stade)
  {
    $this->stade_match = $p_stade;
  }

  function getDate()
  {
    return $this->date_match;
  }

  // Date à insérer au format dd-mm-YYYY
  function setDate($p_date)
  {
    $this->date_match = $p_date;
  }

  // Permet de remplir l'attribut par la date actuelle du serveur
  function setDateActuelle()
  {
    $this->date_match = date("d-m-Y");
  }

  function getEnCours()
  {
    return $this->enCours;
  }

  function setEnCours($p_enCours)
  {
    $this->enCours = $p_enCours;
  }

  /* FIN GETTERS / SETTERS */
  //----------------------------------------------------------------------------
  // Méthode permettant de créer un nouveau match "vide" sans joueur
  // Le JSON va retourner les infos sur le match créer si cela ce passe bien
  // sinon il retournera un message d'erreur
  // PARAM : $date : Si = true, alors la date sera celle du jour / Sinon on la définit
  //----------------------------------------------------------------------------
  function creerMatch($boolDate, $date)
  {
    if($boolDate == true)
      $this->setDateActuelle();
    else
      $this->setDate($date);

    $req = "INSERT INTO match (nom_stade, )"
  }
}
