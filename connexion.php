<?php
require_once("securite.php");
?>


 <?php
 /*
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("scolarite") or die(mysql_error());
 script dépassé */

 try {
     $strconnection= 'mysql:host=localhost;dbname=scolarite';
     $pdo= new PDO ($strconnection, 'root', '');
 }
 catch(PDOException $e) {
     $msg='erreur PDO dans: '. $e->getMessage();
     die($msg);
 }
?>

