<?php
require_once("securite.php");
?>
<?php
require_once("connexion.php");
$mc="";//on doit initialiser la chaine de caracteres.
$size=3;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=0;//si la page n'est pas spécifiée, la page par défaut c'est 0.
}
$offset=$size*$page; //si la page est 0, offset est 0.
if(isset($_GET['motcle'])){
    $mc=$_GET['motcle'];
    $req="select * from etudiants where nom  LIKE  '%$mc%' LIMIT $size OFFSET $offset";

}
else{

    $req="SELECT * FROM etudiants LIMIT $size OFFSET $offset";
}
if(isset($_GET['motcle'])) {
    $ps2=$pdo->prepare("select count(*) as nb_et FROM etudiants where nom  LIKE  '%$mc%'");
}
else
    $ps2=$pdo->prepare("select count(*) as nb_et FROM etudiants");
$ps2->execute();
$ligne=$ps2->fetch(PDO::FETCH_ASSOC);//recuperer la ligne sous forme de tableau associatif avec le PDO.
$nbet=$ligne['nb_et'];

if(($nbet % $size)==0){
    $nbpages=floor($nbet/$size);//la fonction floor permet d'arrondir la page.
}
else{
    $nbpages=floor($nbet/$size)+1;
}
$ps=$pdo->prepare($req);
$ps->execute();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>  </title>
    </head>
            <body>
            <?php require_once("entete.php"); ?>
            <div class="col-md-12 col-xs-12 spacer">
                <form method="get" action="etudiants.php">
                    <label class="control-label">Mot clé:</label>
                    <input type="text" name="motcle" value="<?php echo($mc)?>"/>
                    <button type="submit">chercher</button>
                </form>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-info spacer"> <!--on cree une classe spacer pour ajouter ses styles personnels-->
                    <div class="panel-heading">Liste des etudiants</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>CODE</th><th>NOM</th><th>EMAIL</th><th>PHOTO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($et=$ps->fetch()){?>
                                <tr>
                                    <td><?php echo($et['CODE'])?></td>
                                    <td><?php echo($et['NOM'])?></td>
                                    <td><?php echo($et['EMAIL'])?></td>
                                    <td><img src="images/<?php echo($et['PHOTO'])?>" width="100" height="100" </td>
                                    <td><a href="editEtudiant.php?code=<?php echo($et['CODE'])?>">Editer</a></td>
                                    <td><a onclick="return confirm('etes vous sure..?');" href="supprimeEtudiant.php?code=<?php echo($et['CODE'])?>">supprimer</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <ul class="nav nav-pills ">
                            <?php for($i=0;$i<$nbpages;$i++){?>
                            <li class="<?php echo(($i==$page)?("active"):"")?>"><!--expressions ternaires-->
                                <a href="etudiants.php?page=<?php echo($i)?>&motcle=<?php echo($mc)?>">page <?php echo($i)?></a>
                            </li><!-- pour i inferieur au nombre de pages on affiche i-->
                            <?php }?>
                        </ul>
                        <!--pour le lien: on fait appel à la meme page tout en envoyant l'url de la page-->
                    </div>
                </div>
         </div>
            </body>
         </html>
