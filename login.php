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
         <div class="panel panel-heading">Authentification</div>
         <div class="panel-body">
             <form method="post" action="Authentifier.php">
                 <div class="form-group">
                     <label class="control-label">Login:</label>
                     <input type="text" name="username" class="form-control"/>
                     </label>
                 </div>
                 <div class="form-group">
                     <label class="control-label">Password:</label>
                     <input type="password" name="pass" class="form-control"/>
                     </label>
                 </div>
                 <div>
                     <button type="submit">connect</button>
                 </div>
             </form>
         </div>

     </div>

 </div>

 </body>
</html>