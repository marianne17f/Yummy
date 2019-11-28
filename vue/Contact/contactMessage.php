<main id="contactMessage">

    <div class="conteneur-img">
        <div class="jumbotron jumbotron-fluid height100p banner" id="home">
            <div class="container h100">
                <div class="contentBox h100">
                    <div class="centrer_form">


                    
                        <?php
                            $_GET['m']= '';

                            if($_GET['m']==0)
                            {
                                echo '<p>Le message a été envoyé</p>
                                <a href="'.WEBROOT.'Home/index">Retour vers l\'accueil</a>';
                            }
                            else
                            {
                                echo '<p>le message n\'a pas été envoyé<p>
                                <a href="'.WEBROOT.'Contact/index">Renvoyer</a>';
                            }
                        ?>

                        
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

