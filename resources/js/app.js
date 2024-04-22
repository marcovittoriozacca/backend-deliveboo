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
        const complete_uri = `${uri}/${path}/${id}`;

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


