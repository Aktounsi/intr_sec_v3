<?php defined('_DEFVARADMIN') or exit('Restricted Access'); ?>
<html>
<head>
        <meta charset="utf-8">
    <title> CyberSecurity - admin </title>
    <link rel="stylesheet" type="text/css" href="style_login.css">   
</head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->
              <h2 class="active"> Sign In </h2>
              <h2 class="inactive underlineHover">Sign Up </h2>
          
              <!-- Icon -->
              <div class="fadeIn first">
                <img src="images/loading.gif" id="icon" alt="User Icon" />
              </div>
          
              <!-- Login Form -->
              <form method="POST" action="/INTR_SEC/admin/">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
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