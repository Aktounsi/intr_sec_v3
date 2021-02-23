<?php defined('_DEFVAR') or exit('Restricted Access'); ?>
<div id="contenu" >
		<div class="container">
			<h2> Contact us</h2> <br>
            <form id="form" action="envoyer.php" method="post">
			<div class="form-group">
			<textarea class="form-control" name="msg" id="msg" cols="30" rows="10" placeholder="Ecrivez ici votre message..." 
					style="width:50%;height:160px;display:inline;"></textarea>
			<button type="submit" class="btn btn-info" style="margin-left:20px;margin-bottom:20px;">Envoyer</button>
			</div>
			</form>
<?php /*include('blogListe.php'); */ ?>
        </div>	 	
	</div>
</div>
</div>

<script src="envoyer.js"></script>

</body>
</html>