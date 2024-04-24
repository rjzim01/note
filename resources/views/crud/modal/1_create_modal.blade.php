<form action="{{ Route('jobsAdminStore') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" aria-hidden="true" role="dialog"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Post Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="creator_id" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label>Job Name</label>
                        <input type="text" class="form-control" name="job_name">
                    </div>

                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="company_name">
                    </div>

                    <div class="form-group">
                        <label>Company Logo</label>
                        <input class="form-control" name="company_logo" type="file">
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" name="position">
                    </div>

                    <div class="form-group">
                        <label>Education</label>
                        <input type="text" class="form-control" name="education_minimum">
                    </div>

                    <div class="form-group">
                        <label>Experience</label>
                        <input type="text" class="form-control" name="experience_minimum">
                    </div>

                    <div class="form-group">
                        <label>Posted On</label>
                        <input type="datetime-local" class="form-control" name="posted_on">
                    </div>

                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="datetime-local" class="form-control" name="deadline">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Post</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
