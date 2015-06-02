<?

//Classe : classe_utilisateur.php
//Auteur : VERRIER Alexandre
//Date   : 25/02/15
//Texte  : Classe permettant la gestion d'un utilisateur
//Actions: Login / SEL / ADD / DEL

require_once('classe_database.php');

class user
{
  //----------------------------------------------------------------------------
  // ATTRIBUTS
  //----------------------------------------------------------------------------
  private $user_name;
  private $user_password;
  private $con; // Utilisé pour la connexion à la BDD

  // Get/Set
  function getName()
  {
    return $this->user_name;
  }

  function setName($p_name)
  {
    $this->user_name = $p_name;
  }

  function getPassword()
  {
    return $this->user_password;
  }

  function setPassword($p_password)
  {
    $this->user_password = $p_password;
  }

  //----------------------------------------------------------------------------
  // METHODES
  //----------------------------------------------------------------------------
  public function __construct()
  {
    $this->user_name = '';
    $this->user_password = '';
    $this->con = null;
  }

  //----------------------------------------------------------------------------
  // Méthodes permettant à un utilisateur de se connecter
  // Elle vérifie qu'il existe en base, et retourne du JSON contenant les infos
  // si il existe en base, sinon il ne retourne rien
  //----------------------------------------------------------------------------
  public function connexion()
  {
    $db = db::getInstance();
    $this->con = $db->getDB();

    $user = $this->getName();
    $pwd = $this->getPassword();

    // Préparation de la requête, execution et vérification du résultat
    $req = "SELECT * FROM users WHERE user_name = '$user' AND user_password = '$pwd'";
    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      $out = array();
      $results = $stm->fetchAll(PDO::FETCH_ASSOC);

      // Retourne seulement {"message":"erreur"} si l'username/mdp est incorrect
      // Sinon, cela retourne toutes les infos de l'user avec message=OK
      if(empty($results))
      {
        $out['0']['message'] = "ERREUR";
        $out = array('return' => $out);
      }
      else
      {
        $out['0']['message'] = "OK";
        $out = array('return' => $out);
      }

      echo(json_encode($out));
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer les infos de connexion en BDD \n";
      echo "MESSAGE ERREUR : " .$e->getMessage();
    }

    $this->con = null;
  }

  //----------------------------------------------------------------------------
  // Méthode permettant de récupérer des infos d'un utilisateur grâce au nom
  // Retourne du JSON !
  //----------------------------------------------------------------------------
  public function SEL($p_user_name)
  {
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "SELECT * FROM users WHERE user_name = '$p_user_name' ";

    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      while($res = $stm->fetch(PDO::FETCH_ASSOC))
      {
        $out[] = $res;
      }

      // Retourne {"message": "erreur"} si l'user_name est incorrect
      // Sinon, cela retourne en JSON toutes les infos de la personne sélectionnée
      if(empty($out))
      {
        $out['message'] = "erreur";
      }
      else
      {
        $out['message'] = "ok";
      }

      return print(json_encode($out));
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de recuperer les infos de cet utilisateur. \n
            Nom d'utlisateur incorrect ?";
      echo "MESSAGE ERREUR : " .$e->getMessage();
    }

    $this->con = null;
  }

  //----------------------------------------------------------------------------
  // Méthode permettant d'ajouter un utilisateur en base, en cryptant le mdp md5
  // RETURN : true -> Utilisateur bien ajouté /\ false -> Erreur ajout en base
  //----------------------------------------------------------------------------
  public function ADD()
  {
    $this->user_password = md5($this->user_password);

    $req = "INSERT INTO users VALUES ('', '$this->user_name', '$this->user_password')";

    $db = db::getInstance();
    $this->con = $db->getDB();

    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      echo "L'utilisateur a bien été créer !";
      return true; // Cas ou l'utilisateur a bien été creer
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible d'ajouter l'utilisateur en base de donnée";
      echo "MESSAGE : " .$e->getMessage();
      return false; // Cas ou l'utilisateur n'a pas été créer
    }

    $this->con = null;

  }

  //----------------------------------------------------------------------------
  // Méthode permettant de supprimer un utilisateur en fonction de son user_name
  // RETURN : "true" -> Utilisateur bien supprimé /\"false" -> Erreur supression
  //----------------------------------------------------------------------------
  public function DEL($p_user_name)
  {
    $db = db::getInstance();
    $this->con = $db->getDB();

    $req = "DELETE FROM users WHERE user_name = '$p_user_name' ";
    try
    {
      $stm = $this->con->prepare($req);
      $stm->execute();
      echo "L'utilisateur a bien été supprimé!";
      return true;
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Impossible de supprimer l'utilisteur";
      echo "MESSAGE : " .$e->getMessage();
      return false;
    }

    $this->con = null;
  }


}
?>
