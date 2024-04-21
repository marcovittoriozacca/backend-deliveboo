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
        const uri = window.location.origin;
        const path = button.getAttribute('data-delete-path');
        const slug = button.getAttribute('data-delete-slug');
        const complete_uri = `${uri}/${path}/${slug}`;
        
        const name = button.getAttribute('data-delete-name');
        const deleteModalBody = document.getElementById('delete-modal-body')
        deleteModalBody.innerHTML = `Vuoi eliminare definitivamente il piatto: <span class="fw-bold">${name}</span>`;

        const deleteFormBtn = document.getElementById('form-destroy');
        deleteFormBtn.setAttribute('action', complete_uri);
    })
}


