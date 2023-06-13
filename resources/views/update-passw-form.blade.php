@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
            <h3 class="mx-3">Password Reset</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="_h4">Reset your password</h4>
                <p class="_carou-p">Make sure both passwords are the same.</p>
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('verify-reset') }}" method="POST">
                        @csrf
                        <label class="_form-label" for="email">Email</label>
                        <input class="form-control _form-input" type="email" name="email" id="email" placeholder="name@email.com">
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="password">New Password</label>
                        <input class="form-control _form-input" type="email" name="password" id="password">
                        @error('password')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="passw_conf">Password Confirmation</label>
                        <input class="form-control _form-input" type="password" name="passw_conf" id="passw_conf">
                        @error('passw_conf')
                        <span>{{ $message }}</span>
                        @enderror
                        <button class="btn btn-light _submit" type="submit">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection