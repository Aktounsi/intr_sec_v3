<?php 
    function validate_data($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    if(!isset($_POST['mdp'])) exit;

$mdp = validate_data($_POST['mdp']);


$i = 0;
if(preg_match('#[a-z]#', $mdp)){ $i++; }
if(preg_match('#[A-Z]#', $mdp)){ $i++; }
if(preg_match('#[0-9]#', $mdp)){ $i++; }
if(preg_match('#\W#', $mdp)){ $i++; }
if(strlen($mdp)<8){ $i=0; }
echo $i;



?>