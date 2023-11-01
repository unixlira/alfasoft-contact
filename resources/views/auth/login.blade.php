@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="text-left">
                <p>
                <h2>Login</h2>
                </p>
            </div>
        </div>
        <hr style="border-top: 1px solid #1f1f1f;">
        <div class="mt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8 mt-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="form-control block mt-1 w-full" type="password" name="password" :value="old('password')" required autofocus autocomplete="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-content-center mt-4">
                                <x-primary-button class="btn-block btn btn-info mb-2">
                                    {{ __('Sing In') }}
                                </x-primary-button>

                                Don´t have an account?
                                <a class="text-danger text-center" href="{{ route('register') }}">
                                    {{ __(' Register') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
