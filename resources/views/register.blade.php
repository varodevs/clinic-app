@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
            <h3 class="mx-3">Sign up</h3>
        </div>
        <div class="container-fluid d-flex flex-column align-items-center pt-5">
            <div class="text-center w-50"><h2>Sign up</h2></div>
            <div class="text-center w-75"><p>Sign up to our site to create a new user account.</p></div>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center">
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('register-done') }}" method="POST">
                        @csrf
                        <label class="_form-label" for="uname">Username</label>
                        <input class="form-control" type="text" name="uname" id="uname" placeholder="username">
                        @error('uname')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="password">Password</label>
                        <input class="form-control _form-input" type="password" name="password" id="password">
                        @error('password')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="pass_conf">Confirm Password</label>
                        <input class="form-control _form-input" type="password" name="pass_conf" id="pass_conf">
                        @error('pass_conf')
                        <span>{{ $message }}</span>
                        @enderror
                        <button class="btn btn-light _submit" type="submit">Sign up</button>
                        <label class="form-check-label" for="terms">I Accept the terms and conditions</label>
                        <input class="form-check-input" type="checkbox" name="check_terms" id="terms">
                        @error('check_terms')
                        <span>{{ $message }}</span>
                        @enderror                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection