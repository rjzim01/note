@extends('dashboard1')

@section('content')
    <style>
        a.text-decoration-none,
        a.text-decoration-none *,
        a.text-decoration-none:hover,
        a.text-decoration-none:hover * {
            color: inherit;
            text-decoration: none;
        }

        .main-div {
            background: rgb(225, 225, 225);
            margin: 3px 1px 3px 1px;
            border-radius: 5px;
            padding: 15px;
        }

        .title-div {
            font-size: 20px;
        }

        .date-div {
            text-align: end;
        }
    </style>

    <div class="row align-items-center mt-3">
        <div class="col-md-8">
            <h3>All Notes</h3>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <a data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-success">Add Note</a>
        </div>
    </div>

    <hr>

    <div class="table-responsive1">

        <div class="container1 mb-5" style="min-height: 463px">
            @foreach ($notes as $note)
                <div class="main-div">
                    <div class="note">
                        <div class="row">
                            <div class="col-6 title-div">{{ $note->title }}</div>
                            <div class="col-6 date-div">{{ $note->updated_at->format('g:i A F j, Y') }}</div>
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
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    @include('crud.modal.1_create_modal')
@endsection
