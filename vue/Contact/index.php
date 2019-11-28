<main id="contact">
	<div class="conteneur-img">
		<div class="jumbotron jumbotron-fluid height100p banner" id="home">
	  		<div class="container h100">
	    		<div class="contentBox h100">
	    			<div class="centrer_form">

						<form action="<?php echo WEBROOT ?>Contact/email" method="POST">
		
							<h1 class="headerText text-center">Contact</h1>
								
								<div class="form-group">
									<label>Nom / Société * :<input class="form-control" type="text" name="nom" autofocus required></label>
								</div>

								<div class="form-group">
									<label>Email * :<input type="email" class="form-control" name="email" required></label>
								</div>

								<div class="form-group">
									<label>Message * :
									<textarea name="message" class="form-control textarea" required></textarea></label>
								</div>

								<div class="form-group text-center">
									<input type="submit" class="bouton_valid" value="ENVOYER">
								</div>

						</form>
	    				
	    			</div>

	    		</div>
	  		</div>
		</div>
	</div>
</main>
