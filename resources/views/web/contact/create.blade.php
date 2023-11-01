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
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                    <div class="mt-2">
                                        <ul>
                                            <li class="text-danger">{{ $message }}</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact">
                                @error('contact')
                                    <div class="mt-2">
                                        <ul>
                                            <li class="text-danger">{{ $message }}</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                                @error('email')
                                    <div class="mt-2">
                                        <ul>
                                            <li class="text-danger">{{ $message }}</li>
                                        </ul>
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-5">
                                <a href="/" class="btn btn-dark w-25 mx-2" onclick="showLoader()">Back</a>
                                <button type="submit" class="btn btn-success w-25 mx-2" onclick="checkFields()">Register</button>
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
        function checkFields() {
            let name    = $("#name").val();
            let contact = $("#contact").val();
            let email   = $("#email").val();

            if (name && contact && email) {
                showLoader();
            }
        }
    </script>
@endpushonce
