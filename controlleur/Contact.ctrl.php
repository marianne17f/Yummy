<?php 

class CtrlContact extends Controller
{	
  // Returns the folder "contact" 's "index" page 
	public function index()
	{
		$this->render('Contact','index');
	}


	public function email()
  {
    $tab = '';

    /*boucle pour stocker tous les inputs du formulaire 'contact'
    dans une variable $tab + protection de ces inputs */
     foreach($_POST as $key => $value)
     {
       $tab .= '<p>'.strip_tags($value).'</p> ';
     }
      
      // SMTP est un serveur qui permet l'envoi des mails : ici smtp free
      $SMTP = 'smtp.free.fr';
      $MAIL_FROM = '';

      // ini_set change la valeur 'SMTP' par le contenu stocké dans $SMTP
      ini_set('SMTP', $SMTP);
      ini_set('sendmail_from', $MAIL_FROM);


      //stockage Destinataire das une variable
      $to = 'marianne17fabre@gmail.com';

      // stockage objet du mail dans une variable
      $subject = 'Contact YUMMY';

      // stockage message dans une variable
      $message = '
      <html>
       <head>
            <title>Contact</title>
                <style>

                   body
                   {
                       margin: 0;
                   }

                 main
                 {
                        text-align:left;
                        margin-left: 4vw
                 }

                 h1
                 {
                    font-size: 1.3em;
                 }


                 p
                 {
                        font-size: 1.1em;
                 }

                </style>
       </head>

       <body>


         <main>
             <h1>Contact</h1>



               '.$tab.'



           </main>
       </body>
      </html>
      ';

      // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=utf8';

      // En-têtes additionnels
      $headers[] = 'To: <marianne17fabre@gmail.com>';
      $headers[] = 'From: '.$_POST["email"].'';
      $headers[] = 'Reply-To: '.$_POST["email"].'';


      // Envoi ---- implode() rassemble les éléments d'un tableau en une chaîne
     if(mail($to, $subject, $message, implode("\r\n", $headers)))
     {
      // déf d'un 3e paramètre, m=0 si le mail a bien été envoyé
       $this->render('Contact','contactMessage','m=0');
     }
     else
     {
      // déf d'un 3e paramètre, m=1 si le mail n'a pas été envoyé
       $this->render('Contact','contactMessage','m=1');
     }
  }



}