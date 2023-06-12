<div class="col-3 align-self-center m-3">
    <h3>Patient information</h3>
    <form action="#" method="POST" enctype="multipart/form-data">
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
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>