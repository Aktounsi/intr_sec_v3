<?php 
define('_DEFVARADMIN', 1);
include('../verify_session.php');
if  (isset($_POST['mdp']))  {
    $_POST['mdp'] = validate_data($_POST['mdp']);
    $requsername = $bdd->query('SELECT mdp from membres
    where membres.pseudo=\'' . $_SESSION['username'] . '\' ');
    $rowusername = $requsername->fetch();
    if(  (strlen($_POST['mdp']) < 3)   ||  (strcmp($rowusername['mdp'],$_POST['mdp']) != 0)) {  
        $response = ['success'=>'Mot de passe incorrect','type'=>'error'];
        echo json_encode($response);exit;                                                    }else{ 
            $_SESSION['accessToParametres'] = 1; header('Location: index.php');              }


    
        ?>
   



<?php

} else{   $response = ['success'=>'tapez votre mot de passe svp!','type'=>'error'];
          echo json_encode($response);  echo 'You don\'t have access';  exit;      }

?>
