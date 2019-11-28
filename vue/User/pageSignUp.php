<main id="inscription">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid height100p banner" id="home">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div class="centrer_form">

						<form action="<?php echo WEBROOT ?>User/signUp" method="POST" id="formSignup">
		
							<h1 class="headerText text-center">Inscription</h1>
										<?php if (isset ($log)) 
											{
												echo $log;
											}
										?>
								
								<div class="form-group">
									<label>Prénom : <input class="form-control" type="text" name="firstName" required></label>
									<div class="info" id="infoPrenom">
										<?php // if (isset ($log1)) 
										// {
										// 	echo $log1;
										// }
										?>
									</div>
								</div>

								<div class="form-group">
									<label>Nom : <input type="text" class="form-control" name="lastName" required></label>
									<div class="info" id="infoNom">
										<?php if (isset ($log2)) 
										{
											echo $log2;
										}
										?>
									</div>
								</div>

								<div class="form-group">
									<label>Email : <input class="form-control" type="email" name="email" required></label>
									<div class="info" id="infoEmail">
									<?php if (isset ($log3)) 
										{
											echo $log3;
										}
										?>
									</div>
								</div>

								<div class="form-group">	
									<label>Mot de passe : <input class="form-control" type="password" name="pass1" required></label>
									<div class="info" id="infoPass1">
										<?php if (isset ($log4)) 
										{
											echo $log4;
										}
										?>
									</div>
								</div>

								<div class="form-group">
									<label>Confirmer le mot de passe : <input class="form-control" type="password" name="pass2" required></label>
									<div class="info" id="infoPass2">
										<?php if (isset ($log5)) 
										{
											echo $log5;
										}
										?>
									</div>
								</div>
						</form>
		
						<div id="boutons_valid_annul">
							<input type="submit" class="bouton_valid" value="Valider" form="formSignup">	
							<a href="<?php echo WEBROOT ?>Home/index" class="bouton_valid" >Annuler</a>
						</div>
	    				
	    			</div>

	    		</div>
	  		</div>
		</div>
	</div>
</main>