<?php
define('_DEFVAR', 1);
include('../verify_session.php');

if( (isset($_GET['id']))  &&  (is_numeric($_GET['id']))  &&  ($_GET['id']>=0) ){
        $id= $_GET['id'];
        $req = $bdd->prepare('SELECT * FROM cours WHERE cours_ID = ?');
        $req->execute(array($id));
        if($data = $req->fetch()){

            header('Content-Description: File Transfer');
            header('Content-Type: application/force-download');
            header("Content-Disposition: attachment; filename=\"" . basename($data['titre']) . "\";");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . $data['size']);
            ob_clean();
            flush();
            readfile($data['URI']); //showing the path to the server where the file is to be download
            exit;
        }
        else{
            echo 'file does not existe !';
        }
}else{
    echo 'file does not existe !';
}
?>