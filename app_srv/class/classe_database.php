<?

//Classe : classe_database.php
//Auteur : VERRIER Alexandre
//Date   : 25/02/15
//Texte  : Classe gérant la connexion à la BDD

class db
{
  //----------------------------------------------------------------------------
  // ATTRIBUTS
  //----------------------------------------------------------------------------

  private $db_name;
  private $db_user;
  private $db_password;
  private $db_server;
  private $db_type;
  private static $_instance = null;
  private $db; // Contient l'instance de la bdd

  //----------------------------------------------------------------------------
  // GET
  //----------------------------------------------------------------------------
  public function getDB_name()
  {
    return $this->db_name;
  }


  public function getDB_user()
  {
    return $this->db_user;
  }

  public function getDB_password()
  {
    return $this->db_password;
  }

  public function getDB_server()
  {
    return $this->db_server;
  }

  public function getDB()
  {
    return $this->db;
  }

  //----------------------------------------------------------------------------
  // CREATION D'UNE CHAINE DE CONNEXION AVEC LE DESIGN PATTERN SINGLETON
  //----------------------------------------------------------------------------
  private function __construct()
  {
    require_once('conf.php');
    $this->db_name = $db1_name;
    $this->db_user = $db1_user;
    $this->db_password = $db1_password;
    $this->db_server = $db1_server;
    $this->db_type = $db1_type;
    try
    {
      $this->db = new PDO(
      $this->db_type.':host='.$this->db_server.'; dbname='.$this->db_name,
              $this->db_user,
              $this->db_password,
              array(PDO::ATTR_PERSISTENT => true)
      );
    }
    catch(PDOException $e)
    {
      echo "ERREUR : Connexion à la base de donnée impossible !";
      echo "MESSAGE : " .$e->getMessage();
    }
  }

  public static function getInstance()
  {
    if(is_null(self::$_instance))
    {
      self::$_instance = new self;
    }
    else
    {
    }
    return self::$_instance;
  }

}
