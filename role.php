<?php
if(!($_SESSION['profil']['role']=="scolarite")){
    header("location:$_SERVER[HTTP_REFERER]");
    //si le profil  n'est pas scolarite on renvoie l'utilisateur vers la page ou il se trouve.
}

?>