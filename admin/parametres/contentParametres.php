<?php defined('_DEFVARADMIN') or exit('Restricted Access'); ?>
<div id="contenu" >
		<div class="container">
        <h2>Paramètres</h2> <br>
			<?php if(   (isset($_SESSION['accessToParametres']))  &&  ($_SESSION['accessToParametres']==1)   ){
			require('infosPersonnels.php');
			?>
			<form id="form" method="post" action="modParametres.php">
			    <label for="nom">Nom :</label>
				<span id="plnom"></span>
				<span id="erreurnom" style="color:red;"></span> 
				<span id="oknom" style="color:green;"></span>
				<input class="form-control" type="text" name="nom" id="nom" value="<?php echo $name; ?>">
				<br>
				<label for="prenom">Prénom :</label>
				<span id="plprenom"></span>
				<span id="erreurprenom" style="color:red;"></span> 
				<span id="okprenom" style="color:green;"></span>
				<input class="form-control" type="text" name="prenom" id="prenom"  value="<?php echo $prenom; ?>">
				<br>
				<label for="username">Username :</label>
				<span id="pl" ></span>
				<span id="erreur" style="color:red;"></span> 
				<span id="ok" style="color:green;"></span>
                <input class="form-control" type="text" name="username" id="username" value="<?php echo $pseudo; ?>">
                <br>
				<label for="matricule">Matricule :</label>
				<span id="plmatricule" ></span>
				<span id="erreurmatricule" style="color:red;"></span> 
				<span id="okmatricule" style="color:green;"></span>
				<input class="form-control" type="text" name="matricule" id="matricule" value="<?php echo $matricule; ?>">
				<br>
			    <label for="mdp">Mot de passe :</label>
				<span id="plmdp" ></span>
				<span id="erreurmdp" style="color:red;"></span> 
				<span id="okmdp" style="color:green;"></span>
				<span id="faible" style="color:rgb(255, 115, 0);"></span>
				<span id="moyen" style="color:orange;"></span>
				<input class="form-control" type="text" name="mdp" id="mdp">
			    <br>
				<button type="submit" class="btn btn-success" >Suivant</button>
				</form>  

				<?php  } else{
				?>
                <form id="form" method="post" action="modifierParametres.php">
				<label for="mdp">Entrez votre mot de passe pour continuer :</label>
				<input class="form-control" type="password" name="mdp" id="mdp" style="width:400px;">
				<br>
				<button type="submit" class="btn btn-success" >Suivant</button>
				</form>  
			    <?php  } 
				?>																									
        </div>	 	
	</div>
</div>
</div>



    <script src="verif/nom.js"> </script>
	<script src="verif/prenom.js"></script>
	<script src="verif/matricule.js"></script>
	<script src="verif/username.js"></script>
    <script src="verif/mdp.js"></script>
    <script src="modParametres.js"></script>


</body>
</html>