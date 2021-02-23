<?php 

define('_DEFVAR', 1);  
session_start();
include('../../DBconnection.php');
function validate_data($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}


if(!isset($_POST['username'])) exit;




$pseudo = validate_data($_POST['username']);    
$reqSelect = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=? ');
    $reqSelect->execute(array($pseudo));

$resultat = $reqSelect->fetch();
if(!preg_match('#^[a-z]\w{4,20}$#i', $pseudo)){
    echo '2';
}
else{
    if(  (!$resultat)  ||  (strcmp($pseudo,$_SESSION['username'])==0)  ){echo '0';}
    else{echo '1';}
}
?>