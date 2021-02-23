<?php define('_DEFVAR', 1); 
        session_start();
        include('validate_data_function.php');
        include('DBconnection.php');

     if(   !(isset($_SESSION['username']))   || !(isset($_SESSION['password']))  || !(isset($_SESSION['type_membre']))  ){  


        if(   (isset($_POST['username']))   && (isset($_POST['password']))    ){
            $username = validate_data($_POST['username']);
            $password = validate_data($_POST['password']);

           



                $req = $bdd->prepare('SELECT  mdp, type_membre FROM membres WHERE pseudo = :idf AND type_membre = 0');
                $req->execute(array(
                    'idf' => $username));
                $resultat = $req->fetch();

                //$hash = password_hash($resultat['mdp'])
                // Comparaison du pass envoyé via le formulaire avec la base
                //$isPasswordCorrect = password_verify($password, $hash);
                $isPasswordCorrect = strcmp($password, $resultat['mdp']);
                $type_membre = $resultat['type_membre'];

                if (!$resultat)
                {
                    include('yet.php');
                }
                else
                {
                    if ( $isPasswordCorrect != 0) {
                       include('yet.php');
                        
                    }
                    else {
                        //session_start();
                        //créer ou modifier le cookie qui contient le pseudo 
                        //le dernier paramètre httpOnly nous protège contre la faille XSS si on a oublié htmlspecialchars qlq part
                        //setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true);
                        //le cookie expire après 3h d'une connexion ;)
                        setcookie('username', $username, time() + 3*3600); 

                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        $_SESSION['type_membre'] = $type_membre;
                        header('Location: /INTR_SEC/');
                    }
                }





        }
        else{  include('notyet.php');





        }
     }    
     else{
        //header('Location: headerhome.php');
        $reqSession = $bdd->prepare('SELECT  count(*) AS nb, type_membre FROM membres WHERE pseudo = ? AND mdp = ?');
        $reqSession->execute(array(validate_data($_SESSION['username']), validate_data($_SESSION['password'])     ));
        $resultatSession = $reqSession->fetch();
        if($resultatSession['nb']!='0'){ 
            if($resultatSession['type_membre']=='1'){ header('Location: admin/'); }
            else{$_SESSION['active']='0'; include('included.php'); include('contenthome.php');}
        }else{include('notyet.php');}

     }

     



?>
