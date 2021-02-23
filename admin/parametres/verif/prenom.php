<?php 
    function validate_data($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

if(!isset($_POST['prenom'])) exit;


$p = validate_data($_POST['prenom']);


/*************          NOM               ************/
if(preg_match('#^[a-z]{2,}$#i', $p)){echo '3';}
else{echo '4';}

    ?>    