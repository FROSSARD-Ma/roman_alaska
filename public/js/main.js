
// FORM Validation -------------------------------------------
const formulaire = document.querySelector('form');

let textElt = document.querySelectorAll('input[type=text][required]'); // node list 
let textareaElt = document.querySelector('textarea');
let emailElt = document.querySelector('input[type=email]');
let passElt = document.querySelector('input[type=password]');

// Image
let imgElt = document.querySelector('input[type=file]');


// Message d'erreur
let errorElt = document.querySelector('.errorMessage');

const btnForm = document.querySelector('button[type=submit]');

// FORM : Validation
let formValid = false;


/* == GESTIONS EVENEMENTS ================================ */

/* Controle tous les Champs TEXT ---- */
if(textElt)
{
    textElt.forEach(function(textElt) {
        textElt.addEventListener('blur', (event) => {

            // on vérifie la validité du champ TEXT.
            if (textElt.value.length >= 2 && textElt.value.length <= 50)
            {
                textElt.classList.remove('erreur');
                errorElt.style.display = 'none';
                formValid = true;
            } 
            else
            {
                textElt.classList = "erreur";
                errorElt.innerHTML = "Le champ doit comporter entre 2 et 50 lettres";
                errorElt.style.display = 'block';
                formValid = false;
            }
        });
    });
}

/* Controle Champ EMAIL ---- */
if(emailElt)
{
    emailElt.addEventListener('blur', (event) => {

    	// Adresse Email avec ...... @ ... . ...
    	let emailRegex = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,6}$/;

      	if (emailElt.value.length === 0 || emailRegex.test(emailElt.value)) {
            emailElt.classList.remove('erreur');
            errorElt.style.display = 'none';
            formValid = true;
        } 
        else
        {
            emailElt.classList = "erreur";
            errorElt.innerHTML = "Votre Email n'est pas valide, elle doit être du format xxx @ xx . xx";
        	errorElt.style.display = 'block';
            formValid = false;
        }
    });
}


/* Controle Champ TEXTAREA ---- */
if(textareaElt)
{
    textareaElt.addEventListener('blur', (event) => {

    	// on vérifie la validité du champ TEXTAREA.
    	if (textareaElt.value.length >= 2)
    	{
            textareaElt.classList.remove('erreur');
            errorElt.style.display = 'none';
            formValid = true;
        } 
        else
        {
            textareaElt.classList = "erreur";
            errorElt.innerHTML = "Le texte du message n'est pas assez long !";
        	errorElt.style.display = 'block';
            formValid = false;
        }
    });
}

/* Controle Champ PASS ---- */
if(passElt)
{
    passElt.addEventListener('blur', (event) => {
    	// on vérifie la validité du champ TEXT.
    	if (passElt.value.length >= 8)
    	{
            passElt.classList.remove('erreur');
            errorElt.style.display = 'none';
            formValid = true;
        } 
        else
        {
            passElt.classList = "erreur";
            errorElt.innerHTML = "Le mot de passe doit comporter 8 caractères";
        	errorElt.style.display = 'block';
            formValid = false;
        }
    });
}


/* Controle AVANT envoie FORM ---- */
if(formulaire)
{
    formulaire.addEventListener("submit", function (e) {
      	// on vérifie que le champ email est valide.
      	if(formValid = true)
      	{
      		return true;
      	}	
       	else
       	{
          return false;
          e.preventDefault();
       	}
    });
}