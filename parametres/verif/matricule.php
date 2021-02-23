<?php 
    function validate_data($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

if(!isset($_POST['matricule'])) exit;

$matricule = validate_data($_POST['matricule']);

if(preg_match('#^[0-9]{12}$#', $matricule)){
    echo '3';
}
else{
    echo '4';
}




?>