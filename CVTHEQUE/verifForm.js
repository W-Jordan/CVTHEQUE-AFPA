/**
 * Récupère tous les formulaires de la page. 
 */
var forms = document.querySelectorAll('form');

/**
 * Boucles sur la tableau de formulaire.
 */
for (let i = 0; i < forms.length; i++) {

    /**
     * Récupère tous les inputs du formulaire[i] sans récupérer les inputs de type="submit".
     */
    let inputs = forms[i].querySelectorAll("input:not([type='submit'])");
    /**
     * Récupère l'input ou le bouton submit du formulaire[i] tout dépend de la syntax utiliser.
     */
    let submit = forms[i].querySelector("input[type='submit'], button[type='submit']");
    /**
     * Récupère tous les inputs avec l'element required du formulaire[i].
     */
    let requiredInputs = forms[i].querySelectorAll('[required]');

    /**
     * Crée un objet "objectInputs" afin de stocker tout les inputs du formulaires[i].
     */
    let objectInputs = new Object();

    /**
     * Boucles sur les inputs récupéres afin de crée plusieurs objets possèdant les attributs de chaque input 
     * afin de les stocker dans l'objet "objectInputs". 
     */
    for (let i = 0; i < inputs.length; i++) {
        objectInputs[inputs[i].id] = {
            id : inputs[i].id,
            type: inputs[i].type,
            name: inputs[i].name,
            value: inputs[i].value,
            required: inputs[i].required,
            verified: false,
        };
    }

    /**
     * Ajoute un eventListener sur tous les inputs du formulaire[i] et execute la function verif avec paramètre
     * les variables créées via ce formulaire[i] afin de les réutiliser sur chaque event activer de ce formulaire[i].
     */
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function() {verif(inputs[i], inputs, objectInputs, submit, requiredInputs)}); 
    }
}

/**
 * Function qui vérifie que les patterns d'un formulaires sont respecter et que les champs required sont remplis.
 * @param {*} input 
 * @param {*} objectInputs 
 * @param {*} submit 
 * @param {*} requiredInputs 
 */
function verif(input, listInputs, objectInputs, submit, requiredInputs) {
    if (input.checkValidity() && input.value != "") {
        input.style.backgroundColor = "rgba(0,128,0,0.3)";
    }else if (input.value == "") {
        input.style.backgroundColor = "rgba(255,255,255,0.3)";
    }else{
        input.style.backgroundColor = "rgba(255,0,0,0.3)";
    }

    if (input.checkValidity()) {
            objectInputs[input.id].verified = true;
    }else{
            objectInputs[input.id].verified = false;
    }

    submitCheck(listInputs, objectInputs, submit, requiredInputs);
}

/**
 * Function qui retire l'element disabled du submit si tous les champs required sont remplis et que le formulaire est submitable.
 * @param {*} listInput 
 * @param {*} objectInputs 
 * @param {*} submit 
 * @param {*} requiredInputs 
 */
function submitCheck(listInput, objectInputs, submit, requiredInputs) {
    let inputsRequiredVerified = 0;
    let isSubmitable = true;

    requiredInputs.forEach(element => {
        if (objectInputs[element.id].required && objectInputs[element.id].verified) {
            inputsRequiredVerified++;
        }
    });

    listInput.forEach(element => {
        if (element.value != "" && objectInputs[element.id].verified == false) {
            isSubmitable = false;
        }
    });

    if (inputsRequiredVerified == requiredInputs.length && isSubmitable) {
        submit.disabled = false;
    }else{
        submit.disabled = true;
    }
}