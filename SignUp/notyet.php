<?php defined('_DEFVAR') or exit('Restricted Access'); ?>
<html>
<head>
        <meta charset="utf-8">
    <title> CyberSecurity </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="/INTR_SEC/style_login.css">  

    <script type="text/javascript" src="/INTR_SEC/sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/INTR_SEC/sweetalert/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <body style="background-color:#56baed;" >
      <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->
              <a href="/INTR_SEC/"><h2 class="inactive underlineHover"> Sign In </h2></a>
              <a href="/INTR_SEC/SignUP/"><h2 class="active" >Sign Up </h2></a>
          
              <!-- Icon -->
              <div class="fadeIn first">
                <img src="/INTR_SEC/images/loading.gif" id="icon" alt="User Icon" style="height: 100px;" />
              </div>
          
              <!-- Login Form -->
              <form method="POST" action="/INTR_SEC/SignUp/">
                    <div class="row">
                            <div class="col">
                              <input id="nom" name="nom" type="text" class="form-control" placeholder="Nom">
                            </div>
                            <div class="col">
                              <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Prénom">
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                              <input id="matricule" name="matricule" type="text" class="form-control" placeholder="matricule">
                            </div>
                            <div class="col">
                              <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                    </div>


                <input type="password" name="password" id="password" class="fadeIn second" name="password" placeholder="password">
                <input type="password" name="cpassword" id="cpassword" class="fadeIn third" name="cpassword" placeholder="confirm password">
                <input type="submit" class="fadeIn fourth" name="submit" value="Sign up" style="cursor:pointer;">
              </form>
          
          
            </div>
          </div>
        </div>
  <script src="effect.js"></script>
    </body>
</html>