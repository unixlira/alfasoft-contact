@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="text-left">
                <p>
                <h2>Add contact</h2>
                </p>
            </div>
        </div>
        <hr style="border-top: 1px solid #1f1f1f;">
        <div class="mt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8 mt-3">
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ $contact->name }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control"  value="{{ $contact->contact }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input  class="form-control" value="{{ $contact->email }}" disabled>
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <a href="/" class="btn btn-dark w-25 mx-2" onclick="showLoader()">Back</a>
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning w-25 mx-2" onclick="showLoader()">Edit</a>
                                <button type="button" class="btn btn-danger w-25 mx-2 delete"  title="Delete" data-toggle="tooltip" data-id="{{ $contact->id }}">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushonce('scripts')
    <script>
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
                        window.location.href = "{{ route('index') }}";
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
    </script>
@endpushonce
