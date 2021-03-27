<?php
require_once("securite.php");
require_once("role.php");
?>


<?php
$code=$_GET['code'];
require_once("connexion.php");
$ps=$pdo->prepare("SELECT * from etudiants WHERE code=?");
$params=array($code);
$ps->execute($params);
$etudiant=$ps->fetch();

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
            <form method="post" action="updateEtudiant.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">code: <?php echo($etudiant['CODE'])?></label>
                    <input type="hidden" name="code" value="<?php echo($etudiant['CODE'])?>"  class="form-control"/>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label">Nom:</label>
                    <input type="text" name="nom" value="<?php echo($etudiant['NOM'])?>"  class="form-control"/>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label">Email:</label>
                    <input type="text" name="email" value="<?php echo($etudiant['EMAIL'])?>" class="form-control"/>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-label">photo:</label>
                    <input type="file" name="photo" class="form-control"/>
                    <img src="images/<?php echo($etudiant['PHOTO'])?>" width="100" height="100">
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