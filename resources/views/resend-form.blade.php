@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
            <h3 class="mx-3">Email Verification</h3>
        </div>
        <div class="container-fluid d-flex flex-column align-items-center pt-5">
            <div class="text-center w-50"><h2>Verify that your email exists</h2></div>
            <div class="text-center w-75"><p>If your email belongs to an user you will receive an email to reset your password.</p></div>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center">

                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('reset-email') }}" method="POST">
                        @csrf
                        <label class="_form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                        <button class="btn btn-light _submit" type="submit">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection