

<?php
require_once("securite.php");
require_once("role.php");
?>
<?php
$nom=$_POST['nom'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
$fichierTempo=$_FILES['photo']['tmp_name'];
//echo($fichierTempo); voir le repertoire par défaut ou est stocké le fichier.
move_uploaded_file($fichierTempo,"./images/tofs/$nomPhoto");
require_once("connexion.php");
$ps=$pdo->prepare("insert into etudiants(nom,email,photo)VALUES(?,?,?) ");
$params=array($nom,$email,$nomPhoto);
$ps->execute($params);
header("location:etudiants.php");
?>