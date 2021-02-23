<?php defined('_DEFVARADMIN') or exit('Restricted Access');  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" <?php  if($_SESSION['active']=='0') {    ?> href="/INTR_SEC/admin/style.css" <?php }else{ ?> href="/INTR_SEC/admin/style2.css" <?php } ?>  >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href="/INTR_SEC/fontawesome-free-5.13.0-web/css/fontawesome.css" rel="stylesheet">
   <link href="/INTR_SEC/fontawesome-free-5.13.0-web/css/brands.css" rel="stylesheet">
   <link href="/INTR_SEC/fontawesome-free-5.13.0-web/css/solid.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>
    <script type="text/javascript" src="/INTR_SEC/sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="/INTR_SEC/sweetalert/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>CyberSecurity</title>
    </head>
    <body>
    <div id="c1" class="wrapper">      
		<nav id="sidebar">
			<div class="sidebar-header">       <!-- sidebar header -->
				<h3><img src="/INTR_SEC/admin/images/ssi.png" width="50px" height="50px" alt="" id="ssi"> CyberSecurity</h3>
			</div>
			<ul class="list-unstyled components">       <!-- sidebar list -->
                <li <?php if( (isset($_SESSION['active']))  &&  ($_SESSION['active']=='0') ){ ?> class="active" <?php } ?> ><a href="/INTR_SEC/admin/"  >Accueil</a>
				</li>
				<li <?php if(   (isset($_SESSION['active']))  &&  (($_SESSION['active']=='1')  ||  ($_SESSION['active']=='2'))  ) { ?> class="active" <?php } ?> ><a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Espace Admin</a>
					<ul class="collapse list-unstyled" id="admin">
						<li <?php if(   (isset($_SESSION['active']))  &&  ($_SESSION['active']=='1') ){ ?> class="active" <?php } ?> ><a href="/INTR_SEC/admin/ajouter_cours/">Ajouter un cours</a>
						</li>
						<li <?php if(   (isset($_SESSION['active']))  &&  ($_SESSION['active']=='2') ){ ?> class="active" <?php } ?> ><a href="">Parcourir</a>
						</li>
					</ul> 
				</li>
                <li <?php if( (isset($_SESSION['active']))  &&  ( $_SESSION['active']=='3') ){ ?> class="active" <?php } ?> ><a href="/INTR_SEC/admin/cours/" >Cours</a>
				</li>
                <li <?php if( (isset($_SESSION['active']))  &&  ($_SESSION['active']=='4') ){ ?> class="active" <?php } ?> ><a href="/INTR_SEC/admin/blog/">Blog</a>
				</li>
				<li <?php if(  (isset($_SESSION['active']))  &&  ($_SESSION['active']=='5') ){ ?> class="active" <?php } ?> ><a href="/INTR_SEC/admin/contact/">Contact Us</a>
				</li>
			</ul>
			<ul class="list-unstyled CTAs">				<!-- sidebar footer -->
				<li <?php if(  (isset($_SESSION['active']))  && ($_SESSION['active']=='6') ){ ?> class="active" <?php } ?>  ><a href="/INTR_SEC/admin/parametres/" class="download">Paramètres</a>
				</li>
				<li <?php if(  (isset($_SESSION['active']))  &&  ($_SESSION['active']=='7') ){ ?> class="active" <?php } ?>  ><a href="/INTR_SEC/admin/aide/" class="article">aide</a>
				</li>
			</ul>
		</nav>

		<div class="content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-left:5px;">
					<i class="fa fa-align-justify"></i> <span></span>
				</button>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
                <div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="/INTR_SEC/admin/deconnexion.php">Déconnexion</a>
						</li>
					</ul>
				</div>
            </nav>
            
            
				