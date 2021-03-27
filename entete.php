<div class="navbar navbar-inverse navbar-fixed-top">
    <ul class="nav navbar-nav">
        <li><a href="etudiants.php">Etudiants</a></li>
        <li><a href="saisieEtudiant.php">saisie</a></li>
        <li><a href="logout.php">LogOut[<?php echo((isset($_SESSION['profil']['login']))?($_SESSION['profil']['login']):"")?>]</a></li>
        <!--condition ternaire en php: si condition?afficher(valeur si vraie:valeur sifaux)-->
    </ul>
</div>
