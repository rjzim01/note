@extends('dashboard1')

@section('content')
    <style>
        /* Override default link color */
        a.text-decoration-none,
        a.text-decoration-none *,
        a.text-decoration-none:hover,
        a.text-decoration-none:hover * {
            color: inherit;
            /* Inherit color from parent */
            text-decoration: none;
            /* Remove underline */
        }

        .main-div {
            background: rgb(225, 225, 225);
            margin: 3px 1px 3px 1px;
            border-radius: 5px;
            padding: 15px;
        }

        .title-div {
            /* background: rgb(213, 213, 213); */
            font-size: 20px;
        }

        .date-div {
            text-align: end;
        }
    </style>
    {{--     
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Notes</h1>
        <a data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-success mb-3 mt-3">Add Note</a>
        @include('crud.modal.1_create_modal')
    </div> 
    --}}
    <div class="row align-items-center mt-3">
        <div class="col-md-8">
            <h3>All Notes</h3>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-success">Add Note</a>
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-start">
        {{-- <a data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-success mb-3 mt-3">Add Note</a>
        @include('crud.modal.1_create_modal') --}}
    </div>

    <div class="table-responsive1">
        {{--         
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Modified Time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                    <tr>
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
        --}}
        <div class="container1" style="min-height: 463px">
            @foreach ($notes as $note)
                {{-- <a href="{{ route('details', ['noteId' => $note['id']]) }}" class="text-decoration-none"> --}}
                <div class="main-div">
                    {{-- @foreach ($notes as $note) --}}
                    <div class="note">
                        {{-- <input type="" class=""
                        onclick="window.location='{{ route('details', ['noteId' => $note->id]) }}'"> --}}
                        <div class="row">
                            <div class="col-6 title-div">{{ $note->title }}</div>
                            <div class="col-6 date-div">{{ $note->updated_at->format('g:i A F j, Y') }}</div>
                            {{-- <div class="col-6 date-div">{{ $note->created_at->format('F j, Y g:i A') }}</div> --}}
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-10">
                                {{ Str::limit($note->content, 155) }}...
                            </div>
                            <div class="col-2 text-end">
                                <a href="{{ route('detailsSet', ['noteId' => $note['id']]) }}"
                                    class="text-decoration-none bg-light p-1 rounded">See
                                    Details</a>
                            </div>
                        </div>
                        {{-- </input> --}}
                    </div>
                    {{-- @endforeach --}}
                </div>

                {{-- </a> --}}
            @endforeach
        </div>

        <div class="d-flex justify-content-end pe-5 border mt-1 pt-3">
            {{ $notes->links() }}
        </div>
    </div>
    @include('crud.modal.1_create_modal')
@endsection
