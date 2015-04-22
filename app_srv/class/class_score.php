<?

//Classe : classe_score.php
//Auteur : VERRIER Alexandre
//Date   : 22/04/2015
//Texte  : Classe permettant la gestion du score
//Actions: L

require_once('classe_database.php');
class score
{
  private $id_score;
  private $id_set; // ID du set(Max = 5)
  private $score_set; // SET j1
  private $val_score; // JEU j1
  private $score_set2; // SET j2
  private $val_score2; // JEU j2
  private $avantage;
  private $id_joueur1;
  private $id_joueur2;

  private $con; // Utilisé à la connexion de la BDD

  /* GET/SET */

  public function getID()
  {
    return $this->id_score;
  }

  public function setID($p)
  {
    $this->id_score = $p;
  }

  public function getIDSet()
  {
    return $this->id_set;
  }

  public function setIDSet($p)
  {
    $this->id_set = $p;
  }

  public function getSet()
  {
    return $this->score_set;
  }

  public function setSet($p)
  {
    $this->score_set = $p;
  }

  public function getScore()
  {
    return $this->val_score;
  }

  public function setScore($p)
  {
    $this->val_score = $p;
  }

  public function getSet2()
  {
    return $this->score_set2;
  }

  public function setSet2($p)
  {
    $this->score_set2 = $p;
  }

  public function getScore2()
  {
    return $this->score_set2;
  }

  public function setScore2($p)
  {
    $this->score_set2 = $p;
  }

  public function getAvantage()
  {
    return $this->avantage;
  }

  public function setAvantage($p)
  {
    $this->avantage = $p;
  }

  public function getJ1()
  {
    return $this->id_joueur1;
  }

  public function getJ2()
  {
    return $this->id_joueur2;
  }

  public function setJ1($p)
  {
    $this->id_joueur1 = $p;
  }

  public function setJ2($p)
  {
    $this->id_joueur2 = $p;
  }

  /* FIN GET/SET */


  //----------------------------------------------------------------------------
  // Fonction retournant sous forme de tableau toutes les informations sur le
  // Joueur 1 ou le joueur 2 de la classe
  //----------------------------------------------------------------------------
  public function recupererJoueur($j)
  {
    if($j != 1 && $j != 2)
      echo "ERREUR : Le numero du joueur est different de 1 ou 2, merci de corriger cela";

    // Chaine de connexion à la BDD
    $db = db::getInstance();
    $this->con = $db->getDB();
    $joueur = array();

    if($j == 1)
      $req = "SELECT * FROM joueurs WHERE id_joueur = {$this->getJ1()} ";
    else if($j == 2)
      $req = "SELECT * FROM joueurs WHERE id_joueur = {$this->getJ2() } ";
    else
      $req = "";

    $stm = $this->con->prepare($req);
    try
    {
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {

        $joueur = $res;
      }
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer le joueur";
      echo "MESSAGE ERREUR : " .$e->getMessage();
      return 0;
    }
    $this->con = null;
    return $joueur;
  }

  //----------------------------------------------------------------------------
  // Fonction qui retourne le score actuel des deux joueurs dans la classe
  //----------------------------------------------------------------------------
  public function getScoreActuel()
  {
    $score = array();
    $continue = false;

    // Chaine de connexion à la BDD
    $db = db::getInstance();
    $this->con = $db->getDB();

    if($this->getJ1() != null)
      if($this->getJ2() != null)
        $continue = true;

    if($continue != false)
    {
      $req = "SELECT * FROM score WHERE id_joueur1 = {$this->getJ1()} AND id_joueur2 = {$this->getJ2()}";

      $stm = $this->con->prepare($req);
      try
      {
        $stm->execute();
        while($res = $stm->fetch(PDO::FETCH_ASSOC))
        {
          $score += $res;
        }

      }
      catch(PDOException $e)
      {
        echo "ERREUR : Impossible de recuperer le score des 2 joueurs ! ";
        echo "MESSAGE ERREUR : " .$e->getMessage();
      }
      $this->con = null;
      return $score;
    }
  }
  //----------------------------------------------------------------------------
  // Fonction qui ajoute des points (score ou set) dans la base
  //----------------------------------------------------------------------------
  public function UPD($score = array())
  {
    $continue = false;
    $updated = false;
    $return = array();
    // Chaine de connexion à la BDD
    $db = db::getInstance();
    $this->con = $db->getDB();

    if(!empty($score) && $score != 0 || $score != null)
      $continue = true;

    if($continue != false)
    {
      // Récupération de chaque champs du tableau passé en paramètre dans notre objet
      $this->setIDSet($score['id_set']);
      $this->setSet($score['score_set']);
      $this->setSet2($score['score_set2']);
      $this->setScore($score['val_score']);
      $this->setScore2($score['val_score2']);
      if($score['avantage'] != null && $score['avantage'] != 0)
        $this->setAvantage($score['avantage']);
      else
        $this->setAvantage(0);

      $req =  "UPDATE score SET score_set = {$this->getSet()}, val_score = {$this->getScore()}, score_set2 = {$this->getSet2()},
               val_score2 = {$this->getScore2()}, avantage = {$this->getAvantage()} WHERE id_score = {$score['id_score']} AND id_set = {$score['id_set']}";

      $stm = $this->con->prepare($req);

      try
      {
        $stm->execute();
        if($res = $stm->fetch(PDO::FETCH_ASSOC) != null)
          $updated = true;
      }

      catch(PDOException $e)
      {
        echo "ERREUR : Impossible de mettre a jour le score du match ! ";
        echo "MESSAGE ERREUR : ".$e->getMessage();
        $updated = false;
      }
    }
  }
}
