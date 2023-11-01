@extends('template')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-start">
            <p>
            <h2><b>Edit Contact</b></h2>
        </div>
        <hr style="border-top: 1px solid #1f1f1f;">
        <div class="mt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8 mt-3">
                        <form method="POST" action="{{ route('contact.update', $contact->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}">
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
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ $contact->contact }}">
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
                                <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                                @error('email')
                                <div class="mt-2">
                                    <ul>
                                        <li class="text-danger">{{ $message }}</li>
                                    </ul>
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-5 mb-5">
                                <a href="{{ route('index') }}" class="btn btn-dark w-25 mx-2" onclick="showLoader()">Back</a>
                                <button type="submit" class="btn btn-info w-25 text-white mx-2" onclick="showLoader()">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
