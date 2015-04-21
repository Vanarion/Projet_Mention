<?

//Classe : classe_matchs.php
//Auteur : VERRIER Alexandre
//Date   : 25/02/15
//Texte  : Classe permettant la gestion d'un match
//Actions: Login / SEL / ADD / DEL

require_once('classe_database.php');

class match
{
  // Attributs de la classe match
  private $id_match;
  private $date_match;
  private $estEnCours;
  private $cours_match;
  private $joueur1_match;
  private $joueur2_match;

  private $con; // Variable utilisée pour la chaine de connexion

  /* GET/SET DE LA CLASSE MATCH */
  public function getID()
  {
    return $this->id_match;
  }

  public function setID($p)
  {
    $this->id_match = $p;
  }

  public function getDate()
  {
    return $this->date_match;
  }

  // La date est un datetime, est vérifiee lors du set et retourne une erreur
  // Si le datetime est incorrect
  public function setDate($p)
  {
    $format ="Y-m-d H:i:s"; // Le "H" majuscule pour des heures en 24 heures
    try
    {
      if(($date = DateTime::createFromFormat($format,$p)) === false)
        throw new Exception;
      $this->date_match = $p;
    }
    catch(Exception $e)
    {
       trigger_error("Le format de la date et de l'heure est invalide", E_USER_WARNING);
       return;
    }
  }

  public function getEstEnCours()
  {
    return $this->estEnCours;
  }

  public function setEstEnCours($p)
  {
    $this->estEnCours = $p;
  }

  public function getCours()
  {
    $this->cours_match;
  }

  public function setCours($p)
  {
    $this->cours_match = $p;
  }

  public function setJ1($p)
  {
    $this->joueur1_match = $p;
  }

  public function getJ1()
  {
    return $this->joueur1_match;
  }

  public function setJ2($p)
  {
    $this->joueur2_match = $p;
  }

  public function getJ2()
  {
    return $this->joueur2_match;
  }

  /* FIN GET/SET */

  // Constructeur vide
  public function __construct()
  {
    $this->id_match = 0;
    $this->date_match = '0000-00-00 00:00:00';
    $this->estEnCours = false;
    $this->cours_match = '';
    $this->joueur1_match = '';
    $this->joueur2_match = '';
  }

  // Fonction pour récupérer toutes les informations sur un match
  // l'ID est récupérer dans la classe, et si il est correct, les informations en JSON
  // sont retournées avec $out['message'] contenant un message de confirmation
  // Sinon, si l'ID envoyé est incorrect, $out['message'] contiendra le message
  // d'erreur correspondant
  public function selectionnerMatch()
  {
    // Chaine de connexion à la base de données
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "SELECT * FROM matchs WHERE id_match = {$this->getID()}";

    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {
        $out[] = $res;
      }

      // Retourne seulement {"message":"erreur"} si une erreur est survenue
      // Sinon, cela retourne toutes les infos sur le match sélectionné
      if(empty($out))
      {
        $out['message'] = "ERREUR : l'ID du match pass&eacute; en parametre est incorrect. Merci de corriger cela.";
      }
      else
      {
        $out['message'] = "ok";
      }

      return print(json_encode($out));
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer les infos de connexion en BDD \n";
      echo "MESSAGE ERREUR : " .$e->getMessage();
    }
    // Puis on vide la chaine de connexion
    $this->con = null;
  }

  public function getAllMatch()
  {
    // Chaine de connexion à la base de données
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "SELECT * FROM matchs";
    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {
        $out[] = $res;
      }

      if(empty($out))
      {
        $out['message'] = "ERREUR : Aucun match present en base ";
      }
      else
      {
        $out['message'] = "ok";
      }

      return print(json_encode($out));
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer la liste des matchs en BDD ";
      echo "MESSAGE ERREUR : " .$e->getMessage();
    }
    $this->con = null;
  }

}
