<?php
session_start();
//si la variable de sesion n'existe pas on le redirige vers l'authentification
if(!(isset($_SESSION['profil']))){
header("location:login.php");
}
?>