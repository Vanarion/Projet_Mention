<?
require_once('classe_database.php');
//Classe : classe_joueur.php
//Auteur : VERRIER Alexandre
//Date   : 25/02/15
//Texte  : Classe permettant la gestion d'un joueur'
//Actions: Login / SEL / ADD / DEL

class joueur
{
  // Attributs de la classe
  private $id_joueur;
  private $nom_joueur;
  private $prenom_joueur;
  private $pays_joueur;

  private $db; // Utilisé pour la chaine de connexion

  /* GET / SET */
  public function getID()
  {
    return $this->id_joueur;
  }

  public function setID($p)
  {
    $this->id_joueur = $p;
  }

  public function setNom($p)
  {
    $this->nom_joueur = $p;
  }

  public function getNom()
  {
    return $this->nom_joueur;
  }

  public function getPrenom()
  {
    return $this->prenom_joueur;
  }

  public function setPrenom($p)
  {
    $this->prenom_joueur = $p;
  }

  public function setPays($p)
  {
    $this->pays_joueur = $p;
  }

  public function getPays()
  {
    return $this->pays_joueur;
  }

  /* FIN GET/SET */

  // Récupération d'un joueur par son nom et prénom
  public function getJoueurParNom()
  {
    // Chaine de connexion à la base de données
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "SELECT * FROM joueurs WHERE nom_joueur = '{$this->getNom()}' AND prenom_joueur = '{$this->getPrenom()}' ";
    $stm = $this->con->prepare($req);

    try
    {
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {
        $out[] = $res;
      }
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer les infos de la base de donnees ";
      echo "MESSAGE ERREUR : ".$e->getMessage();
    }

    if(empty($out))
    {
      $out['message'] = "ERREUR : La combinaison nom prenom est incorrect. Merci de corriger cela";
    }
    else
    {
      $out['message'] = "ok";
    }

    return print(json_encode($out));

    $this->con = null;
  }

  public function getJoueurParID()
  {
    // Chaine de connexion à la base de données
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "SELECT * FROM joueurs WHERE id_joueur = {$this->getID()} ";
    $stm = $this->con->prepare($req);

    try
    {
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {
        $out[] = $res;
      }
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer les infos de la base de donnees ";
      echo "MESSAGE ERREUR : ".$e->getMessage();
    }

    if(empty($out))
    {
      $out['message'] = "ERREUR : l'ID du match pass&eacute; en parametre est incorrect. Merci de corriger cela.";
    }
    else
    {
      $out['message'] = "ok";
    }

    return print(json_encode($out));

    $this->con = null;
  }
}
