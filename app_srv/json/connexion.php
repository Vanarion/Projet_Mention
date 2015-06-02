
<?
require_once('../class/classe_utilisateur.php');
if(empty($_GET) && !isset($_GET))
{
	echo "ERREUR";
}
else
{
	if(isset($_GET['user']) && isset($_GET['password']))
	{
		$u = new user();
		$u->setName($_GET['user']);
		$u->setPassword(md5($_GET['password']));
		$u->connexion();
	}
}