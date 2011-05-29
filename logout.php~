<?
session_start();
if(!isset($_SESSION["login"])){
header("location:login.php");
} else {
session_unset();
session_destroy();
echo "<h1>SectorWeb.net</h1>";
echo "Las variables de sesión han sido eliminadas, y la sesión se ha dado por finalizada correctamente da click <a href=\"login.php\">aqui para loguearte</a>";
}
?>
