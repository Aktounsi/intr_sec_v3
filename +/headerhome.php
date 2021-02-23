<?php session_start();
require('DBconnection.php');
if(   (isset($_SESSION['username']))   && (isset($_SESSION['password']))    ){ $username = $_SESSION['username'];
    $req = $bdd->prepare('SELECT  type_membre FROM membres WHERE pseudo = :idf');
                $req->execute(array(
                    'idf' => $username));
                
                if(  ($resultat = $req->fetch())  &&  ($resultat['type_membre']=='1') )
                 { $_SESSION['type_membre'] = '1';  header('Location: admin.php'); }
                else {header('Location: homee.php');}
                }else  header('Location: index.php');

?>