<?php defined('_DEFVARADMIN') or exit('Restricted Access');  session_start();
    include('../validate_data_function.php');
    
if(  !(isset($_SESSION['username']) ) ||
     !(isset($_SESSION['password'])) ||
     !(isset($_SESSION['type_membre']))  ){
        header('Location: /INTR_SEC/admin/');

     }else{
         include('../DBconnection.php'); $verified = 1;

         $reqSession = $bdd->prepare('SELECT  count(*) AS nb, type_membre FROM membres WHERE pseudo = ? AND mdp = ?');
                $reqSession->execute(array(validate_data($_SESSION['username']), validate_data($_SESSION['password'])     ));
                $resultatSession = $reqSession->fetch();
                if($resultatSession['nb']=='0'){ 
                    if($resultatSession['type_membre']=='0'){ header('Location: /INTR_SEC/'); }
                    header('Location: /INTR_SEC/admin/');
                }
          
     }

 

?>