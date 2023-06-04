<div class="col-3 align-self-center m-3">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" placeholder="First name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $employee->name }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $employee->title }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title court.</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $employee->title_court }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Birth date</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $carbonDate = Carbon::createFromFormat('Y/m/d', $employee->date_birth); }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date hired</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $carbonDate = Carbon::createFromFormat('Y/m/d', $patient->date_hire); }}" disabled>
        </div>
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>