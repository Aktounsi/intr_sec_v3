<?php  
define('_DEFVAR', 1); 
session_start();
include('../validate_data_function.php');
include('../DBconnection.php');

     if(   !(isset($_SESSION['username']))   || !(isset($_SESSION['password']))  || !(isset($_SESSION['type_membre']))  ){  


        if(     (isset($_POST['nom']))          && 
                (isset($_POST['prenom']))       &&
                (isset($_POST['matricule']))    &&
                (isset($_POST['username']))     &&
                (isset($_POST['password']))     &&
                (isset($_POST['cpassword']))    ){
                
                    $username = validate_data($_POST['username']);
                    $password = validate_data($_POST['password']);
                    $cpassword = validate_data($_POST['cpassword']);
                    $nom =  validate_data($_POST['nom']);
                    $prenom =  validate_data($_POST['prenom']);
                    $matricule =  validate_data($_POST['matricule']);

                    if(  (correctMatricule($matricule))  &&  
                         (correctNom($nom))              &&
                         (correctPrenom($prenom))        &&
                         (correctUsername($username))    &&
                         (correctPassword($password))    &&
                         (correctCpassword($password,$cpassword))   ){

                            //include('../DBconnection.php');
                            $req = $bdd->prepare('SELECT  pseudo FROM membres WHERE pseudo = :idf');
                            $req->execute(array('idf' => $username));
                            
                            if($resultat = $req->fetch()){
                                include('yetUsernameExist.php');

                            }else{
                                //register
                                $reg = $bdd->prepare('INSERT INTO membres (membre_ID,nom,prenom,pseudo,mdp,matricule) VALUES (NULL,?,?,?,?,?)');
                                $reg->execute(array($nom,$prenom,$username,$password,$matricule));
                                //créer session and redirect 
                                //session_start();
                                $_SESSION['username'] = $username;
                                $_SESSION['password'] = $password;
                                $_SESSION['type_membre'] = 0;
                                header('Location: /INTR_SEC/');
                            }
                         }else{
                            include('yet.php');
                         }



        }
        elseif( (!isset($_POST['nom']))          && 
        (!isset($_POST['prenom']))       &&
        (!isset($_POST['matricule']))    &&
        (!isset($_POST['username']))     &&
        (!isset($_POST['password']))     &&
        (!isset($_POST['cpassword']))    ){  include('notyet.php');
         }else{
            include('yet.php');
         }
     }    
     else{
        header('Location: /INTR_SEC/');
     }
/*functions*/
     function correctNom(String $nom) {
        if( preg_match('#^[a-z]{2,}$#i', $nom) ) return TRUE;
        return FALSE;
      }

      function correctPrenom(String $prenom) {
        if( preg_match('#^[a-z]{2,}$#i', $prenom) ) return TRUE;
        return FALSE;
      }

      function correctMatricule(String $matricule) {
        if( preg_match('#^[0-9]{12}$#', $matricule) ) return TRUE;
        return FALSE;
      }

      function correctUsername(String $username) {
        if( preg_match('#^[a-z]\w{4,20}$#i', $username) ) return TRUE;
        return FALSE;
      }

      function correctPassword(String $password) {
        if( (strlen($password) < 8 ) ) return FALSE;
        return TRUE;
      }
      
      function correctCpassword(String $password,String $cpassword) {
        if( strcmp($cpassword, $password)==0 ) return TRUE;
        return FALSE;
      }

?>