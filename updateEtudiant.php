<?php
require_once("securite.php");
require_once("role.php");
?>
<?php
$code=$_POST['code'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
require_once("connexion.php");
if($nomPhoto==""){
    $ps=$pdo->prepare("update etudiants set NOM=?, EMAIL=? WHERE CODE=?");
    $params=array($nom,$email,$code);
    $ps->execute($params);
}
else{
    $fichierTempo=$_FILES['photo']['tmp_name'];
   //echo($fichierTempo); voir le repertoire par défaut ou est stocké le fichier.
    move_uploaded_file($fichierTempo,"./images/tofs/$nomPhoto");
    $ps=$pdo->prepare("update etudiants set NOM=?, EMAIL=?, PHOTO=? WHERE CODE=?");
    $params=array($nom,$email,$nomPhoto,$code);
    $ps->execute($params);

}
header("location:etudiants.php");

?>