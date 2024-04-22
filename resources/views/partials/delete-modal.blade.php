<div class="modal fade" id="delete-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Eliminare definitivamente il piatto?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="delete-modal-body"  class="modal-body">Body</div>
            <div class="modal-footer">
                <form id="form-destroy" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


