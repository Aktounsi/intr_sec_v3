<?php defined('_DEFVAR') or exit('Restricted Access'); ?>
<html>
<head>
        <meta charset="utf-8">
    <title> CyberSecurity </title>
    <link rel="stylesheet" type="text/css" href="style_login.css">   
</head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->
              <a href=""><h2 class="active"> Sign In </h2></a>
              <a href="/INTR_SEC/SignUP/"><h2 class="inactive underlineHover">Sign Up </h2></a>
          
              <!-- Icon -->
              <div class="fadeIn first">
                <img src="/INTR_SEC/images/loading.gif" id="icon" alt="User Icon" />
              </div>
          
              <!-- Login Form -->
              <form method="POST" >
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" name="submit" value="Log In" style="cursor:pointer;">
              </form>
              <p style="color:red;">Mot de passe ou nom d'utilisateur incorrect !</p>
          
              <!-- Remind Passowrd -->
              <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
              </div>
          
            </div>
          </div>
    
    </body>
</html>