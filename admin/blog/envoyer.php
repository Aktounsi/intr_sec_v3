<?php   define('_DEFVARADMIN', 1);
include('../verify_session.php');
//session_start();
//require('../DBconnection.php');
 

if(!empty($_POST)){  $_POST['msg'] = validate_data($_POST['msg']);
    
    if(strlen($_POST['msg']) < 3){exit;}
	
	/*if(strlen($_POST['msg']) < 3){
		$response = ['success'=>'le message doit contenir au moins 3 caractères','type'=>'error'];
                        echo json_encode($response);exit;
	}*/
	



//$code_notif = time();
$date_actuelle = date("Y-m-d H:i:s");
$contenu = $_POST['msg'] ;

    $requsername = $bdd->query('SELECT membre_ID from membres
    where membres.pseudo=\'' . $_SESSION['username'] . '\' ');
    $rowusername = $requsername->fetch();

$code_user = $rowusername['membre_ID'] ;


$reqNotif = $bdd->prepare('INSERT INTO message (d,membre_ID,contenu) VALUES (?,?,?)' );
            if($reqNotif->execute(array($date_actuelle,$code_user,$contenu))) 
                {$response = ['success'=>'Message publié avec succès','type'=>'success'];
                        echo json_encode($response); } exit;

}
         
         
         ?>