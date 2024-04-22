import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
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




//validazione js per la login form

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


