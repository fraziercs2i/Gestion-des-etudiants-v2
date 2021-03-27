
<?php
require_once("securite.php");
require_once("role.php");
?>

<?php
$code=$_GET['code'];
require_once("connexion.php");
$ps=$pdo->prepare("DELETE FROM etudiants WHERE CODE =?");
$params=array($code);
$ps->execute($params);
header("location:etudiants.php");
?>