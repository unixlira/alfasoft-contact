@extends('template')

@section('content')
    <div class="d-flex justify-content-center">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>It's Works!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>It went Bad!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container-xl">
        <div class="row justify-content-start">
            <div class="text-left">
                <p>
                <h1>Contact Management Web App </h1>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container-xl">
                <div class="row justify-content-start">
                    <p>
                    <h2><b>Contact list</b></h2>
                </div>
                <hr style="border-top: 1px solid #1f1f1f;">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    @auth
                                        <a href="{{ route('contact.create') }}" class="btn btn-sm btn-success mt-2" onclick="showLoader()">
                                            <i class="material-icons align-middle">add_circle</i>
                                            <span class="align-middle"><b>Create New Contact</b></span>
                                        </a>
                                    @endauth
                                </div>
                                <div class="col-sm-4">
                                    <nav class="navbar navbar-light bg-light">
                                        <form class="form-inline" method="GET" action="{{ url()->current() }}">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                                <i class="material-icons align-middle">&#xE8B6;</i>
                                            </button>
                                        </form>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name <i class="fa fa-sort"></i></th>
                                <th>Contact</th>
                                <th>E-Mail Address</th>
                                @auth
                                    <th class="text-center">Actions</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    <td>{{ $contact->email }}</td>
                                    @auth
                                        <td class="text-center">
                                            <a href="{{ route('contact.show', $contact->id) }}" class="view" title="View" data-toggle="tooltip" onclick="showLoader()">
                                                <i class="material-icons">&#xE417;</i>
                                            </a>
                                            <a href="{{ route('contact.edit', $contact->id) }}" class="edit" title="Edit" data-toggle="tooltip" onclick="showLoader()">
                                                <i class="material-icons">&#xE254;</i>
                                            </a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="{{ $contact->id }}">
                                                <i class="material-icons">&#xE872;</i>
                                            </a>
                                        </td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row mb-5">
                            <div class="col-3">
                                <div class="d-flex justify-content-start text-hint btn btn-secondary ">
                                    Showing&nbsp;<b>{{ $contacts->firstItem() }}</b>&nbsp;of&nbsp;<b>{{ $contacts->total() }}</b>&nbsp;results
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-end">
                                    {{ $contacts->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@pushonce('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.delete').on("click", function (e) {
                e.preventDefault();
                let id = $(this).data("id");
                let confirmation = confirm('Are you sure you want to delete this contact?');

                if (confirmation) {
                    let url = "{{ route('contact.destroy', ':id') }}".replace(':id', id);

                    showLoader();

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE"
                        },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        },
                        complete: function () {
                            hideLoader();
                        }
                    });
                }
            });

        });
    </script>
@endpushonce
