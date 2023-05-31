@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3">Request your appointment</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center w-50">
                <h4></h4>
                <p></p>
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('request-done') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-evenly w-75">
                        <div>
                            <label class="_form-label" for="fname">First Name</label>
                            <input class="form-control" type="text" name="fname" id="fname">
                            <label class="_form-label" for="sname">Phone Number</label>
                            <input class="form-control" type="text" name="sname" id="sname">
                            <label class="_form-label" for="birth">Date of Birth</label>
                            <input class="form-control" type="date" name="birth" id="birth">
                            <label class="_form-label" for="spec">Speciality</label>
                            <select class="form-control" type="text" name="spec" id="spec">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div>
                            <label class="_form-label" for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" id="lname">
                            <label class="_form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                            <label class="_form-label" for="id">ID</label>
                            <input class="form-control" type="text" name="id" id="id">
                            <label class="_form-label">Underage?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="underchck" value="1" id="under">
                                <label class="form-check-label" for="under">Yes</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="underchck" value="2" id="under2">
                                <label class="form-check-label" for="under2">No</label>
                            </div>
                            
                        </div>
                    </div>
                        <div class="my-4 w-75">
                            <label class="_form-label" for="textarea" >Describe your problem:</label>
                            <textarea class="form-control" name="textarea" id="textarea"></textarea>                            
                        </div>
                        <button class="btn btn-light _submit" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection