

// -------- AFFICHAGE FENETRE DELETE RENCONTRES CULINAIRES ---------- //
if (document.querySelector(".displayDeleteEvent") != null )
{
	let btnDisplayDeleteEvent = document.querySelectorAll(".displayDeleteEvent");

	btnDisplayDeleteEvent.forEach(function(btn)
	{
		btn.addEventListener("click", DisplayDeleteEvent);
	});

	function DisplayDeleteEvent()
	{
		let deleteEvent = document.querySelector("#deleteEvent");

		deleteEvent.style = "display:block";
	}
}


// --------- FERMER FENETRE DELETE RENCONTRES CULINAIRES --------- //
if (document.querySelectorAll(".cancelDeleteEvent") != null )
{
	let btnCancelDeleteEvent = document.querySelectorAll(".cancelDeleteEvent");

	console.log(btnCancelDeleteEvent);

	btnCancelDeleteEvent.forEach(function(btn)
	{
		btn.addEventListener("click", cancelDeleteEvent);
	});

	function cancelDeleteEvent()
	{
		
		let deleteEvent = document.querySelector("#deleteEvent");

		deleteEvent.style = "display:none";
	}
}



/*------------ BARRE DE RECHERCHE -------------*/


// let inputSearch = document.querySelector('.search'); 

// inputSearch.addEventListener('input',sendSearch);

// function sendSearch()
// {
// 	$.ajax(
// 	{
// 	    url: 'core/search.php',
// 	    type: 'POST',
// 	    data: $('search').serialize()
// 	}).done(function(response)
// 	{
// 		let results = JSON.parse(response);
		
// 		console.log(results);
// 		let div = document.createElement('div');
		
// 		results.forEach(function(result) {
// 			let article = document.createElement('div');
			
// 			let lien = document.createElement('a');
// 			lien.setAttribute('href','Event/read/'+result.id);
// 			lien.innerText = result.name;

// 			let name = document.createElement('h2');
// 			name.innerText = result.name;

// 			div.appendChild(lien);
// 			div.appendChild(a);

// 			section.appendChild(div);
// 		});
// 		$('#result').html(section);
// 	});
// }




/*------------ URL -------------*/

function changeUrl(url)
{

	let pathName = window.location.pathname; 
	pathName = pathName.split('/');
	let folder = pathName[1];

	history.replaceState(null,null,window.location.protocol + "//" + window.location.host +'/'+folder+'/'+url);

}






// ------------------ VERIF FORMULAIRE INSCRIPTION ------------------ //


function verif(inputToTest,reg,idInfo,message)
	{
		// stockage dans la variable info de la div où l'ont veut afficher le message
		let info = document.querySelector(idInfo);
		// Si la longueur de la valeur de l'input est supérieure à 0
		if (inputToTest.value.length > 0)
		{
			// Si l'expression régulière est différente de la valeur de l'input
			if (!reg.test(inputToTest.value) )
			{
				// J'insers le message dans la div où l'ont veut afficher le message
				info.innerHTML = message;
				// J'applique une box shadow orange à l'input
				inputToTest.style = "box-shadow: 0 0 0.5vw #C83D00; border-bottom: 1.5px solid #C83D00";
			}
			else
			{
				// Je supprime le message
				info.innerHTML = "";
				// J'applique une box shadow vert à l'input 
				inputToTest.style = "box-shadow: 0 0 0.7vw #465512; border-bottom: 1.5px solid #465512";
			} 
		}
		else
		{
			// Je supprime le message
			info.innerHTML = "";
			// Je supprime le box shadow
			inputToTest.style = "box-shadow: none";
		}
	}


// Récupération des inputs dans une variable correspondante
if (document.querySelector("input[name='firstName']") != null)
{
	let prenom = document.querySelector("input[name='firstName']");
	let nom = document.querySelector("input[name='lastName']");
	
	let email = document.querySelector("input[name='email']");
	let pass1 = document.querySelector("input[name='pass1']");
	let pass2 = document.querySelector("input[name='pass2']");

	// Déclaration des regex
	let regPrenom = /^[A-Za-zÀ-ÖØ-öø-ÿ-\s]+$/;
	let regNom = /^[A-Za-zÀ-ÖØ-öø-ÿ-\s]+$/;
	
	let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
	let regPass1 = /^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^¤£@\#!*()"$]).*$/;

	// Déclaration des messages
	let messPrenom = "<p>Le prénom doit contenir uniquement des lettres</p>";
	let messNom = "<p>Le nom doit contenir uniquement des lettres</p>";
	
	let messEmail = "<p>l'email n'est pas valide</p>";
	let messPass1 = '<p>Le mot de passe doit avoir :</p> <ul><li>Au moins une majuscule</li><li>Au moins un chiffre</li><li>Au moins 6 caractères</li><li>Au moins un caractère spécial</li></ul>';

	// Ajout d'écouteur d'évènement au changement de la valeur des inputs
	// le 1er paramètre de l'écouteur d'évènement est le type d'évènement (input)
	/* le 2ème paramètre de l'écouteur d'évènement est une fonction anonyme qui fait
	 appel à la fonction paramétrée verif
	*/
	prenom.addEventListener("input",function()
	{
		verif(prenom,regPrenom,'#infoPrenom',messPrenom);
	});

	nom.addEventListener("input", function() 
	{
		verif(nom,regNom,'#infoNom',messNom);
	});

	email.addEventListener("input",function()
	{
		verif(email,regEmail,'#infoEmail',messEmail);
	});

	pass1.addEventListener("input",function()
	{
		verif(pass1,regPass1,'#infoPass1',messPass1);
	});

	pass2.addEventListener("input",verifPass);

	// Declaration de la fonction paramétrée verif
	 /* la fonction vérif est composée de 4 paramètres :
	 - inputToTest : le nom de la variable correspondant à l'input que l'on veut tester
	 - reg : le regexp correspondant à l'input que l'on veut tester
	 - idInfo : le nom de l'identifiant de la div où l'ont veut afficher le message
	 - message : le message
	 */
	

	function verifPass() {
		let infoPass = document.querySelector('#infoPass2');
		if (pass1.value != pass2.value) {
			infoPass.innerHTML = "<p>La vérification du mot de passe ne correspond pas</p>";
			pass2.style = "box-shadow: 0 0 0.5vw #C83D00; border-bottom: 1.5px solid #C83D00";
		} else {
			infoPass.innerHTML = "";
			pass2.style = "box-shadow: 0 0 0.7vw #465512; border-bottom: 1.5px solid #465512";
		}
	}
}


//-----------------VERIF FORM INPUT ADDRESS ---------------- //


if (document.querySelector("input[name='address']") != null)
{
	let address = document.querySelector("input[name='address']");


	// Déclaration des regex
	let regAddress = /^[A-Za-z0-9À-ÖØ-öø-ÿ'-\s]+$/;
	
	// Déclaration des messages
	let messAddress = '<p>L\'adresse ne peut contenir :</p><ul><li>Des lettres</li><li>Des chiffres</><li>Des espaces, tirets et apostrophes</li></ul>';
	

	// Ajout d'écouteur d'évènement au changement de la valeur de l'input
	// le 1er paramètre de l'écouteur d'évènement est le type d'évènement (input)
	/* le 2ème paramètre de l'écouteur d'évènement est une fonction anonyme qui fait
	 appel à la fonction paramétrée verif
	*/
	
	address.addEventListener("input",function()
	{
		verif(address,regAddress,'#infoAddress',messAddress);
	});

	

	// Declaration de la fonction paramétrée verif
	 /* la fonction vérif est composée de 4 paramètres :
	 - inputToTest : le nom de la variable correspondant à l'input que l'on veut tester
	 - reg : le regexp correspondant à l'input que l'on veut tester
	 - idInfo : le nom de l'identifiant de la div où l'ont veut afficher le message
	 - message : le message
	 */
	

	
}


// ------------------ VERIF FORMULAIRE LOGIN ------------------ //

if (document.querySelector("#formLogin") != null )
{
	let email = document.querySelector("input[name='email']");
	let pass = document.querySelector("input[name='pass']");
	
	// Déclaration des regex
	let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
	let regPass1 = /^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^¤£@\#!*()"$]).*$/;

	// Déclaration des messages
	let messEmail = "<p>l'email n'est pas valide</p>";
	let messPass1 = '<p>Le mot de passe doit avoir :</p> <ul><li>Au moins une majuscule</li><li>Au moins un chiffre</li><li>Au moins 6 caractères</li><li>Au moins un caractère spécial</li></ul>';

	// Ajout d'écouteur d'évènement au changement de la valeur des inputs
	// le 1er paramètre de l'écouteur d'évènement est le type d'évènement (input)
	/* le 2ème paramètre de l'écouteur d'évènement est une fonction anonyme qui fait
	 appel à la fonction paramétrée verif
	*/
	email.addEventListener("input",function()
	{
		verif(email,regEmail,'#infoEmail',messEmail);
	});
	pass.addEventListener("input",function()
	{
		verif(pass,regPass1,'#infoPass1',messPass1);
	});
}




