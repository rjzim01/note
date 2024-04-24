<form action="{{ Route('deleteNote') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalDelete{{ $note->id }}" tabindex="-1" aria-hidden="true" role="dialog"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Delete Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @csrf

                    <input type="hidden" name="id" class="form-control" value="{{ $note->id }}">

                    <h6>Are you sure delete this note?</h6>
                    <br>

                    <button type="submit" class="btn btn-danger">Delete</button>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
