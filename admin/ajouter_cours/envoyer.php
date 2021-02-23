<?php  
//var_dump($_FILES);
//session_start();

//include('../DBconnection.php');
define('_DEFVARADMIN', 1); include('../verify_session.php'); 

if(!empty($_FILES)){
    $file_name = $_FILES['cours']['name'];
    $file_tmp_name = $_FILES['cours']['tmp_name'];
    $file_type = $_FILES['cours']['type'];
    $file_extension = strrchr($file_name,".");
    $file_size = $_FILES['cours']['size'];

    $extension_autorisees = array('.pdf','.pptx','.docx','.png','.jpg', '.php');
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $timestamp = time();
    $file_name = $timestamp.'_'.$file_name;
    $destination = SITE_ROOT.'/files/'.$file_name;
    

    if(in_array(strtolower($file_extension),$extension_autorisees)){

        if($_FILES['cours']['error']==0){
                if(move_uploaded_file($file_tmp_name,$destination)){
                    //inserer une référence dans la bdd
                    $requsername = $bdd->query('SELECT membre_ID from membres
                    where membres.pseudo=\'' . $_SESSION['username'] . '\' ');
                    $rowusername = $requsername->fetch();
                    $code_user = $rowusername['membre_ID'] ;
                    $date_actuelle = date("Y-m-d H:i:s");

                    $req = $bdd->prepare('INSERT INTO cours (cours_ID,titre,size,URI,membre_ID,date_ajout) VALUES (null,?,?,?,?,?)');
                    $req->execute(array($file_name,$file_size,$destination,$code_user,$date_actuelle));

                $response = ['success'=>'Fichier envoyé avec succès','type'=>'success'];
                                echo json_encode($response);  exit;
                }else{
                    $response = ['success'=>'Une erreur est survenue lors de l\'envoi du fichier !','type'=>'error'];
                                        echo json_encode($response);  exit;
                }
            }else{$response = ['success'=>'Une erreur est survenue lors de l\'envoi du fichier !','type'=>'error'];
                echo json_encode($response);  exit;}

    }else{
        $ext_autoris = implode (', ', $extension_autorisees);
        $response = ['success'=>'Seul les fichiers ('. $ext_autoris .') sont autorisés !','type'=>'error'];
                        echo json_encode($response);  exit;
    }
}
else{
    $response = ['success'=>'Une erreur est survenue lors de l\'envoi du fichier !!','type'=>'error'];
                        echo json_encode($response);  exit;
}

     
         ?>
