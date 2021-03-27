
<?php
require_once("securite.php");
require_once("role.php");
?>

<!DOCTYPE html>
<html>
 <head>
     <link rel="stylesheet" type="text/css" href="css/mystyle.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <meta charset="UTF-8">
     <title></title>
 </head>
 <body>
 <?php require_once("entete.php");?>
 <div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
     <div class="panel panel-default">
         <div class="panel panel-heading">Saisie des Etudiants</div>
         <div class="panel-body">
             <form method="post" action="saveEtudiant.php" enctype="multipart/form-data">
                 <div class="form-group">
                     <label class="control-label">Nom:</label>
                     <input type="text" name="nom" class="form-control"/>
                     </label>
                 </div>
                 <div class="form-group">
                     <label class="control-label">Email:</label>
                     <input type="text" name="email" class="form-control"/>
                     </label>
                 </div>
                 <div class="form-group">
                     <label class="control-label">photo:</label>
                     <input type="file" name="photo" class="form-control"/>
                     </label>
                 </div>
                 <div>
                     <button type="submit">save</button>
                 </div>
             </form>
         </div>

     </div>

 </div>

 </body>
</html>