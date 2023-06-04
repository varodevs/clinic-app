<div class="col-3 align-self-center m-3">
    <h3>Patient information</h3>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" placeholder="First name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->first_name }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->last_name }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->phone }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Birth date</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $carbonDate = Carbon::createFromFormat('Y/m/d', $patient->date_birth); }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Age</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->age }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Sex</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->sex }}" disabled>
        </div>
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>