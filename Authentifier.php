<?php
require_once("connexion.php");
$login=$_POST['username'];
$password=md5($_POST['pass']);//on utilise la fonction md5 pour avoir le mot de passe crypté dans la base de donées.
$email=$_POST['email'];
$ps=$pdo->prepare("select * from users where LOGIN=? AND PASSWORD=?");
$params=array($login,$password);
$ps->execute($params);
if($user=$ps->fetch()){
    session_start();
    $_SESSION['profil']=$user;
    header("location:etudiants.php");
}
else{
    header("location:login.php");
}
?>