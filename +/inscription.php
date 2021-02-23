<?php 
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'){
require('../DBconnection.php');


$name = $_POST['nom'];
$prenom = $_POST['prenom'];
$matricule = $_POST['matricule'];
$username = $_POST['username'];
$mdp = $_POST['mdp'];
$cmdp = $_POST['cmdp'];

$ch = ''; $user = 0; $mot_de_passe_correct = 0; $conf_mot_de_passe_correct = 0;

if  ((!isset($name))  ||  (!preg_match('#^[a-z]{2,}$#i', $name)))   $ch = $ch . '?nom=0';     
else   $ch = $ch . '?nom='. $name;  

if  ((!isset($prenom))  ||  (!preg_match('#^[a-z]{2,}$#i', $prenom)))   $ch = $ch . '&prenom=0';     
else   $ch = $ch . '&prenom='. $prenom;

if  ((!isset($matricule))  ||  (!preg_match('#^[0-9]{12}$#', $matricule)))   $ch = $ch . '&matricule=0';     
else   $ch = $ch . '&matricule='. $matricule;

if  ((!isset($mdp))  ||  (strlen($mdp) < 8 ))   {$ch = $ch . '&mdp=0'; $mot_de_passe_correct = 0; }    
else{   $ch = $ch . '&mdp=1'; $mot_de_passe_correct = 1;}

if  ((!isset($cmdp))  ||  ( strcmp($mdp,$cmdp) != 0 ))   {$ch = $ch . '&cmdp=0';  $conf_mot_de_passe_correct = 0;   }
else   {$ch = $ch . '&cmdp=1';   $conf_mot_de_passe_correct = 1; }


if  ((!isset($username))  ||  (!preg_match('#^[a-z]\w{4,20}$#i', $username)))   {$ch = $ch . '&username=0'; $user = 0;}     
else{ $pseudo = $_POST['username'];    
    $reqSelect = $bdd->prepare('SELECT pseudo AS username FROM membres WHERE pseudo=?');
    $reqSelect->execute(array($pseudo));
    $resultat = $reqSelect->fetch();
    if($resultat){$ch = $ch . '&username=0'; $user = 0;}
    else{$ch = $ch . '&username='. $username; $user = 1;}}




$toutvabien = '?nom='. $name .'&prenom='. $prenom .'&matricule='. $matricule .'&mdp=1&cmdp=1&username='. $username;
if( strcmp($ch,$toutvabien) == 0 ) {    

    if(     (isset($_POST['nom'])) &&
            (isset($_POST['prenom'])) &&
            (isset($_POST['matricule'])) &&   
            (isset($_POST['username'])) &&   
            (isset($_POST['mdp'])) 
       ){
        
        // inserer l'admin temp
        $req = $bdd->prepare('INSERT INTO membres (membre_ID,nom,prenom,matricule,pseudo,mdp,type_membre) VALUES (NULL,?,?,?,?,?,?)' );
         $req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['matricule'],$_POST['username'],$_POST['mdp'],'0'));
          $_SESSION['username'] = $_POST['username'];  
          $_SESSION['password'] = $_POST['mdp'];  

         header('Location: index.php');
            
         

        }
        


}

}

?>
