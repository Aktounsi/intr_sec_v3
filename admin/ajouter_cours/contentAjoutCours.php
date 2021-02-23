<?php defined('_DEFVARADMIN') or exit('Restricted Access'); ?>
<div id="contenu" >
		<div class="container">
			<h2> Ajouter un cours</h2> <br>
            <form id="form" action="envoyer.php" method="post" enctype="multipart/form-data">
			<div class="custom-file">
            <input class="custom-file-input" type="file" name="cours" id="cours" required/>
            <label class="custom-file-label" for="cours">Choose file...</label>
            <div class="invalid-feedback" >Example invalid custom file feedback</div> <br>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            <div id="uploadStatus"></div>
            <br> <br> <br>
			<button type="submit" class="btn btn-info" style="margin-left:20px;margin-bottom:20px;">Envoyer</button> <br> <br> <br> <br> <br> <br>
			</div>
			</form>
        </div>	 	
	</div>
</div>
</div>

<script src="envoyer.js"></script>

<script src="progress"></script>

</body>
</html>