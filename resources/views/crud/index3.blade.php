@extends('dashboard1')

@section('content')
    <div class="row align-items-center mt-3">
        <div class="col-md-8">
            <h3>{{ $note->title }}</h3>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $note->id }}" class="btn btn-info me-2">Edit</a>
            <a data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $note->id }}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10">
            <div class="container border">
                {{-- <div>{{ $note->content }}</div> --}}
                <div>
                    <pre style="min-height: 600px">{{ $note->content }}</pre>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="container border">
                <div>Last Update :- </div>
                <div>{{ $note->updated_at->format('g:i A F j, Y') }}</div>
                <br>
                <div>Create Time :-</div>
                <div>{{ $note->created_at->format('g:i A F j, Y') }}</div>
            </div>
        </div>
    </div>

    @include('crud.modal.2_edit_modal')
    @include('crud.modal.3_delete_modal')
@endsection
