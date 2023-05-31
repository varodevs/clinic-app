@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3">Contact us</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center w-50">
                <h4></h4>
                <p></p>
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="" method="POST">
                    @csrf
                    <div class="d-flex justify-content-evenly w-75">
                        <div>
                            <label class="_form-label" for="fname">First Name</label>
                            <input class="form-control" type="text" name="fname" id="fname">
                            <label class="_form-label" for="sname">Phone Number</label>
                            <input class="form-control" type="text" name="sname" id="sname">
                        </div>
                        <div>
                            <label class="_form-label" for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" id="lname">
                            <label class="_form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                            
                        </div>
                    </div>
                        <div class="w-75">
                            <label class="_form-label" for="textarea" >Describe your problem:</label>
                            <textarea class="form-control" name="textarea" id="textarea"></textarea>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection