<form action="{{ Route('createPost') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" aria-hidden="true" role="dialog"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @csrf

                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Note Title</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Content</label>
                        <div class="col-md-8 col-lg-9">
                            {{-- <input name="content" type="text" class="form-control"> --}}
                            <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
