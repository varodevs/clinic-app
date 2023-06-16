<div class="col-3 align-self-center m-3">
    <h3>Patient information</h3>
    <form action="{{ route('upd-pat') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" placeholder="First name" aria-label="fn" aria-describedby="basic-addon1" @if($patient != null) value="{{ $patient->first_name }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ln" aria-describedby="basic-addon1" @if($patient != null) value="{{ $patient->last_name }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone</span>
            <input type="text" class="form-control" placeholder="Phone Number" aria-label="pn" aria-describedby="basic-addon1" @if($patient != null) value="{{ $patient->phone }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Birth date</span>
            @php
                use Carbon\Carbon;
                if($patient != null){
                    $dateb = Carbon::parse($patient->date_birth);
                }                
            @endphp
            <input type="text" class="form-control" placeholder="Birthdate" aria-label="date" aria-describedby="basic-addon1" @if($patient != null) value="{{ $dateb->format('Y-m-d') }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Age</span>
            <input type="text" class="form-control" placeholder="Age" aria-label="age" aria-describedby="basic-addon1" @if($patient != null) value="{{ $patient->age }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Sex</span>
            @php
                if($patient != null){
                    if($patient->sex == 1)
                        $sex = "Male";
                }else {
                    $sex = "Female";
                }
            @endphp
            <input type="text" class="form-control" placeholder="Sex" aria-label="sex" aria-describedby="basic-addon1" @if($patient != null) value="{{ $sex }}" @endif disabled>
        </div>
    </form>
    <form action="{{ route('mod-img') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button class="btn btn-primary _submit" type="submit" @if($patient == null) disabled @endif>Upload</button>
    </form>
</div>
<div class="col-9 align-self-center">
    <h4>Address</h4>
    <form action="{{ route('add-addr') }}" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Street</span>
            <input type="text" class="form-control" placeholder="Street" name="street" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->street }}" @endif>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">P.C</span>
            <input type="text" class="form-control" placeholder="pc" name="pc" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->pc }}" @endif>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">City</span>
            <input type="text" class="form-control" placeholder="City" name="city" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->city }}" @endif>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Country</span>
            <input type="text" class="form-control" placeholder="Country" name="country" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->country }}" @endif>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Number</span>
            <input type="text" class="form-control" placeholder="Number" name="number" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->number }}" @endif>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Flat</span>
            <input type="text" class="form-control" placeholder="Flat" name="flat" aria-label="pn" aria-describedby="basic-addon1" @if($address != null) value="{{ $address->flat }}" @endif>
        </div>
        <input type="hidden" name="cod_pat" @if($patient == null) value="{{ $patient->cod_patient }}" @endif>
        <button class="btn btn-primary _submit" type="submit" @if($patient == null) disabled @endif>Add Address</button>
    </form>
</div>