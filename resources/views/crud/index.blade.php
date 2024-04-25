@extends('dashboard1')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Notes</h1>
    </div>

    <div class="d-flex justify-content-start">
        <a data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-success mb-3 mt-3">Add Note</a>
        @include('crud.modal.1_create_modal')
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Modified Time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                {{-- 
                @php
                    $sl = 1;
                @endphp 
                --}}
                @foreach ($notes as $note)
                    <tr>
                        {{-- <th scope="row">{{ $sl++ }}</th> --}}
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>

                        <td>{{ $note->created_at->format('F j, Y g:i A') }}</td>

                        <td>{{ $note->updated_at->format('F j, Y g:i A') }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $note->id }}"
                                class="me-3 btn btn-info bi bi-pencil-square">Edit</a>
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $note->id }}"
                                class="me-3 btn btn-danger bi bi-pencil-square">Delete</a>
                        </td>
                        @include('crud.modal.2_edit_modal')
                        @include('crud.modal.3_delete_modal')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
