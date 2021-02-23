<?php
define('_DEFVARADMIN', 1);
include('../verify_session.php');

if(  (isset($_GET['id']))  &&  (is_numeric($_GET['id']))  ){
        $id= $_GET['id'];
        $req = $bdd->prepare('DELETE FROM cours WHERE cours_ID = ?');
        $req->execute(array($id));
        
        $response = ['success'=>'Suppression effectuée avec succès','type'=>'success'];
        echo json_encode($response);exit;
}else{
    $response = ['success'=>'Une erreur est servenue lors de la suppression !','type'=>'error'];
     echo json_encode($response);exit;
}
?>