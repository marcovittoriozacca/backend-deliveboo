import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { forEach, isNumber } from 'lodash';
import.meta.glob([
    '../img/**'
])






//modale di cancellazione, per adesso solo dei piatti
const deleteBtns = document.querySelectorAll('.delete-button');
if(deleteBtns.length > 0){
    deleteBtns.forEach((button) => {
        button.addEventListener('click', function(){
            //https://127.0.0.1:800 oppure localhost
        const uri = window.location.origin;
        //dishes
        const path = button.getAttribute('data-delete-path');
        //slug dell'elemento che dobbiamo cancellare
        const id = button.getAttribute('data-delete-id');

        //https://127.0.0.1:800/dishes/id
        const complete_uri = `${uri}/${path}/${id}/softDelete`;

        //nome dell'elemento
        const name = button.getAttribute('data-delete-name');
        console.log(complete_uri, name)
        //messaggio custo di conferma con il nome effettivo dell'elemento
        const deleteModalBody = document.getElementById('delete-modal-body');
        deleteModalBody.innerHTML = `Vuoi eliminare definitivamente il piatto: <span class="fw-bold">${name}</span>`;

        //prendiamo il form di cancellazione e gli applichiamo l'action con l'url corretto
        const deleteFormBtn = document.getElementById('form-destroy');
        deleteFormBtn.setAttribute('action', complete_uri);
        })
    })
}

//funzione che controlla la mail con un regex
const validateEmail = function(email) {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return validRegex.test(email);
}
//funzione che controlla la password con un regex
const validatePassword = function (password) {
    let validRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_@$!%*?&])[A-Za-z\d\-_@$!%*?&]{8,}$/;
    return validRegex.test(password);
}

//prendiamo l'intero form per prevenire, in caso di errori, l'invio con submit ed event.preventDefault()
const loginForm = document.getElementById('login-form');
if(loginForm){
    loginForm.addEventListener('submit', function(event) {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        // Validazione dell'email
        if (!email || !validateEmail(email)) {
            emailError.innerText = 'Inserisci una Mail valida';
            emailError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            emailError.innerText = '';
            emailError.classList.replace('d-block', 'd-none')
        }

        // Validazione della password
        if (!password || !validatePassword(password) || password.length<8) {
            passwordError.innerText = 'Inserisci una Password valida';
            passwordError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            passwordError.innerText = '';
            passwordError.classList.replace('d-block', 'd-none')
        }
    })
}

//prendiamo l'intero form per prevenire, in caso di errori, l'invio con submit ed event.preventDefault()
const registerForm = document.getElementById('register-form');
if(registerForm){
    registerForm.addEventListener('submit', function(event) {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let passwordConfirm = document.getElementById('password-confirm').value;
        let address = document.getElementById('address').value;
        let piva = document.getElementById('piva').value;
        let image = document.getElementById('image');
        const allowedExtensions = ['image/jpg','image/jpeg','image/jpe','image/webp','image/heif','image/bmp','image/tiff','image/tif','image/xbm','image/png','image/svg'];
        let activityName = document.getElementById('activity_name').value;
        let typologies = document.getElementById('typologies');
        let typologiesArray = Array.from(typologies.selectedOptions).map(option => option.value);

        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const nameError = document.getElementById('nameError');
        const surnameError = document.getElementById('surnameError');
        const passwordConfirmError = document.getElementById('passwordConfirmError');
        const typologiesError = document.getElementById('typologiesError');
        const addressError = document.getElementById('addressError');
        const activityNameError = document.getElementById('activityNameError');
        const pivaError = document.getElementById('pivaError');
        const imageError = document.getElementById('imageError');

        //validazione del nome
        if (!name) {
            nameError.innerText = 'Inserisci un Nome';
            nameError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            nameError.innerText = '';
            nameError.classList.replace('d-block', 'd-none')
        }

        //validazione cognome
        if (!surname) {
            surnameError.innerText = 'Inserisci un Cognome';
            surnameError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            surnameError.innerText = '';
            surnameError.classList.replace('d-block', 'd-none')
        }

        // Validazione dell'email
        if (!email || !validateEmail(email)) {
            emailError.innerText = 'Inserisci una Mail valida';
            emailError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            emailError.innerText = '';
            emailError.classList.replace('d-block', 'd-none')
        }

        // Validazione della password
        function validaPassword(password) {
            const regexCarattereSpeciale = /[@!#\/]/;
            const regexMaiuscolo = /[A-Z]/;
            const regexNumero = /[0-9]/;

            let valido = true;

            if (password.length < 8) {
                document.getElementById('lung').style.color="red";
                valido = false;
            }else{
                document.getElementById('lung').style.color="green";
            }

           if (!regexCarattereSpeciale.test(password)) {
                document.getElementById('speciale').style.color="red";
                valido = false;
            }else{
                document.getElementById('speciale').style.color="green";
            }

            if (!regexMaiuscolo.test(password)) {
                document.getElementById('maiuscolo').style.color="red";
                 valido = false;
            }else{
                document.getElementById('maiuscolo').style.color="green";
            }

             if (!regexNumero.test(password)) {
                 document.getElementById('numero').style.color="red";
                valido = false;
             }else{
                document.getElementById('numero').style.color="green";
            }

             return valido;
         }

         if (validaPassword(password)) {
             passwordError.innerText = '';
             passwordError.classList.replace('d-block', 'd-none')
         } else {
             passwordError.innerText = 'Inserisci una Password valida';
             passwordError.classList.replace('d-none', 'd-block')
             event.preventDefault();
         }






        // Validazione della conferma password
        if (passwordConfirm != password ) {
            passwordConfirmError.innerText = 'La password non corrisponde';
            passwordConfirmError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            passwordConfirmError.innerText = '';
            passwordConfirmError.classList.replace('d-block', 'd-none')
        }
        // Validazione della conferma password
        if (!activityName ) {
            activityNameError.innerText = 'Inserisci un Nome per il tuo Ristorante';
            activityNameError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            activityNameError.innerText = '';
            activityNameError.classList.replace('d-block', 'd-none')
        }

        // Validazione della Tipologia dei ristoranti
        if (typologiesArray.length === 0) {
            typologiesError.innerText = 'Inserisci almeno una Tipologia';
            typologiesError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            typologiesError.innerText = '';
            typologiesError.classList.replace('d-block', 'd-none')
        }

        //validazione dell'indirizzo
        if (!address) {
            addressError.innerText = 'Inserisci un Indirizzo';
            addressError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            addressError.innerText = '';
            addressError.classList.replace('d-block', 'd-none')
        }

        //validazione della partita iva
        if (!piva || piva.length != 11 || isNaN(piva)) {
            pivaError.innerText = 'Inserisci una P.IVA valida';
            pivaError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            pivaError.innerText = '';
            pivaError.classList.replace('d-block', 'd-none')
        }

        //validazione dell'immagine
        if (!image.files[0] || !allowedExtensions.includes(image.files[0].type)) {
            imageError.innerText = "Inserisci un'Immagine valida";
            imageError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            imageError.innerText = '';
            imageError.classList.replace('d-block', 'd-none')
        }

    })
}


// Aggiunta la possibilità di vedere la password in chiaro nella registrazione
if((window.location.href === 'http://127.0.0.1:8000/register')||(window.location.href === 'http://127.0.0.1:8000/login')){
let button_visib=document.getElementById("visible");
button_visib.addEventListener("click",function(){
    if(password.type=="password"){
        password.type="text"
        document.getElementById("password-confirm").type="text"
    }else{
        password.type="password"
        document.getElementById("password-confirm").type="password"
    }
})
}

const dishForm = document.getElementById('dish-form');
if(dishForm){
    const categoryValuesArray = document.querySelectorAll('.category-option')
    let categories_values = [];
    categoryValuesArray.forEach((category) => {
        categories_values.push(category.value);
    })

    dishForm.addEventListener('submit', function(event){
        let name = document.getElementById('name').value;
        let description = document.getElementById('description').value;
        let ingredient = document.getElementById('ingredient').value;
        let image = document.getElementById('image');
        const allowedExtensions = ['image/jpg','image/jpeg','image/jpe','image/webp','image/heif','image/bmp','image/tiff','image/tif','image/xbm','image/png','image/svg'];
        let price = document.getElementById('price').value;
        let category = document.getElementById('category').value;


        const nameError = document.getElementById('nameError');
        const descriptionError = document.getElementById('descriptionError');
        const ingredientError = document.getElementById('ingredientError');
        const imageError = document.getElementById('imageError');
        const priceError = document.getElementById('priceError');
        const categoryError = document.getElementById('categoryError');



        //validazione del nome
        if (!name) {
            nameError.innerText = 'Inserisci un Nome';
            nameError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            nameError.innerText = '';
            nameError.classList.replace('d-block', 'd-none')
        }

        //validazione della categoria
        if (!category || !categories_values.includes(category)) {
            categoryError.innerText = 'Inserisci una Categoria';
            categoryError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            categoryError.innerText = '';
            categoryError.classList.replace('d-block', 'd-none')
        }

        //validazione della descrizione
        if (!description) {
            descriptionError.innerText = 'Inserisci una Descrizione';
            descriptionError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        }else if(description.value > 255){
            descriptionError.innerText = 'Inserisci una descrizione più breve';
            descriptionError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        }
        else {
            descriptionError.innerText = '';
            descriptionError.classList.replace('d-block', 'd-none')
        }

        //validazione degli ingredienti
        if (!ingredient) {
            ingredientError.innerText = 'Inserisci gli ingredienti';
            ingredientError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            ingredientError.innerText = '';
            ingredientError.classList.replace('d-block', 'd-none')
        }

        //validazione dell'immagine
        if(image.files[0]){
            if (!allowedExtensions.includes(image.files[0].type)) {
                imageError.innerText = "Inserisci un'Immagine valida";
                imageError.classList.replace('d-none', 'd-block')
                event.preventDefault();
            } else {
                imageError.innerText = '';
                imageError.classList.replace('d-block', 'd-none')
            }
        }
        //validazione del prezzo
        if (!price || price > 1000) {
            priceError.innerText = "Inserisci un prezzo valido";
            priceError.classList.replace('d-none', 'd-block')
            event.preventDefault();
        } else {
            priceError.innerText = '';
            priceError.classList.replace('d-block', 'd-none')
        }
    })
}
