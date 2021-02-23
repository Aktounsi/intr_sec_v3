<?php 
    function validate_data($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

if(!isset($_POST['nom'])) exit;


$name = validate_data($_POST['nom']);


/*************          NOM               ************/
if(preg_match('#^[a-z]{2,}$#i', $name)){echo '3';}
    else{echo '4';}


    ?>