<?php define('_DEFVAR', 1);
include('../verify_session.php');

if(     (isset($_POST['nom'])) &&
            (isset($_POST['prenom'])) &&
            (isset($_POST['username'])) &&   
            (isset($_POST['mdp'])) &&
            (isset($_POST['matricule']))            
       ){
//require('../DBconnection.php');


$name = validate_data($_POST['nom']);
$prenom = validate_data($_POST['prenom']);
$matricule = validate_data($_POST['matricule']);
$username = validate_data($_POST['username']);
$mdp = validate_data($_POST['mdp']);


$requsername = $bdd->query('SELECT membre_ID from membres
    where membres.pseudo=\'' . $_SESSION['username'] . '\' ');
    $rowusername = $requsername->fetch();


$membre_ID = $rowusername['membre_ID'];

if  ((!isset($name))  ||  (!preg_match('#^[a-z]{2,}$#i', $name)))  {
    $response = ['success'=>'Un ou plusieurs champs ne sont pas valides','type'=>'error','title'=>'Erreur!'];
    echo json_encode($response);exit;
    }  

if  ((!isset($prenom))  ||  (!preg_match('#^[a-z]{2,}$#i', $prenom)))   {
    $response = ['success'=>'Un ou plusieurs champs ne sont pas valides','type'=>'error','title'=>'Erreur!'];
    echo json_encode($response);exit;
}

if  ((!isset($matricule))  ||  (!preg_match('#^[0-9]{12}$#', $matricule)))   {
    $response = ['success'=>'Un ou plusieurs champs ne sont pas valides','type'=>'error','title'=>'Erreur!'];
    echo json_encode($response);exit;
}


if  ((!isset($mdp))  ||  (strlen($mdp) < 8 ))   {
    $response = ['success'=>'Un ou plusieurs champs ne sont pas valides','type'=>'error','title'=>'Erreur!'];
    echo json_encode($response);exit;
}


if  ((!isset($username))  ||  (!preg_match('#^[a-z]\w{4,20}$#i', $username)))   {
    $response = ['success'=>'Un ou plusieurs champs ne sont pas valides','type'=>'error','title'=>'Erreur!'];
    echo json_encode($response);exit;
}     
else{   
    $pseudo = $_SESSION['username'];    
    $reqSelect = $bdd->prepare('SELECT * FROM membres WHERE pseudo=?  ');
    $reqSelect->execute(array($username));
    $resultat = $reqSelect->fetch();
    
    if(  ($resultat)  &&  (strcmp($pseudo,$resultat['pseudo']) != 0)  ){ 
        $response = ['success'=>'username already exist','type'=>'error','title'=>'Erreur!'];
        echo json_encode($response);exit;
    }else{
        
    }
    
}


$reqUpdate = $bdd->prepare('UPDATE membres SET nom = ?, prenom = ?, matricule = ?, mdp = ?, pseudo = ?  WHERE membre_ID = ?');

$reqUpdate->execute(array($name,$prenom,$matricule,$mdp,$username,$membre_ID));
if(isset($_SESSION['username'])) $_SESSION['username'] = $username;
if(isset($_SESSION['password'])) $_SESSION['password'] = $mdp;


       }else{
           echo 'You don\'t have access !'; exit;
       }

?>