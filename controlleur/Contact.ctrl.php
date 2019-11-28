<?php 

class CtrlContact extends Controller
{	
	public function index()
	{
		$this->render('Contact','index');
	}


	public function email()
  {


     $tab = '';

     foreach($_POST as $key => $value)
     {
       $tab .= '<p>'.strip_tags($value).'</p>';
     }




      $SMTP = 'smtp.free.fr';
      $FROM = '';

      ini_set('SMTP', $SMTP);
      ini_set('sendmail_from', $FROM);


      //Destinataire
      $to = 'marianne17fabre@gmail.com';

     // utf8_decode   permet de décoder les caractères spéciaux
      $subject = utf8_decode("Contact YUMMY");

      // message
      $message = '
      <html>
        <head>
            <title>Contact</title>
                <style>

                   body
                   {
                      margin: 0;
                      color: #000;
                   }

                   main
                   {
                      text-align:left;
                      margin-left: 4vw;
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
             <h1>Contact YUMMY !</h1>



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
      $headers[] = 'From: ';
      $headers[] = 'Reply-To: '.$_POST["email"].'';


      // Envoi
    if(mail($to, $subject, $message, implode("\r\n", $headers)))
    {
      $this->render('Contact','contactMessage','m=0');
    }
    else
    {
      $this->render('Contact','contactMessage','m=1');
    }
    
  
  }



}