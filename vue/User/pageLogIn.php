
<main id="connexion">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid height100p banner">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div class="centrer_form">
		    			<form action="<?php echo WEBROOT ?>User/login" method="POST" id="formLogin">
			
							<h1 class="text-center">Connexion</h1>
								
								<div class="form-group">
									<label>Email : <br><input class="form-control" type="email" name="email" autofocus required></label>
									<div class="info" id="infoEmail">
									<?php if (isset ($log)) 
										{
											echo $log;
										}
										?>
								</div>
								</div>
								
								<div class="form-group">
									<label>Mot de passe : <br><input class="form-control" type="password" name="pass" required></label>
									<div class="info" id="infoPass1">
										<?php if (isset ($log1)) 
										{
											echo $log1;
										}
										?>
									</div>
								</div>
								

						</form>
			
						<div id="boutons_valid_annul">
							<input type="submit" class="bouton_valid" value="Valider" form="formLogin">
							<a href="<?php echo WEBROOT ?>" class="bouton_valid">Annuler</a>

						</div>
	    				
	    			</div>

	    		</div>
	  		</div>
		</div>
	</div>
</main>