<?php defined('_DEFVARADMIN') or exit('Restricted Access'); ?>
<div id="contenu" >
		<div class="container">
            <h2> Cours</h2> <br>
            <br> <br>
			<table class="table table-striped">
				<thead>
					<th>Code cours#</th>
					<th>Titre </th>
					<th>Ajouté le</th>
					<th>Ajouté par</th>
					<th>Taille</th>
					<th>Télécharger</th>
					<th></th>
                </thead>
            
<?php include('coursListe.php');  ?>
        </div>	 	
	</div>
</div>
</div>
<script src="delete.js" ></script>
</body>
</html>