@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3">Sign in</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center">
                <h4></h4>
                <p></p>
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('login-done') }}" method="POST">
                        @csrf
                        <label class="_form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com" required>
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                        <label class="_form-label" for="password">Password</label>
                        <input class="form-control _form-input" type="password" name="password" id="password" required>
                        @error('password')
                        <span>{{ $message }}</span>
                        @enderror
                        <button class="btn btn-light _submit" type="submit">Sign in</button>
                    </form>
                    <a href="{{ route('reset-view') }}"><p class="_carou-p w-100 text-center">Forgot your password?</p></a>
                </div>
            </div>
        </div>
    </div>

@endsection