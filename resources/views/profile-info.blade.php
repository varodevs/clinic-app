<div class="col-2 align-self-start m-3">
    <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">First Name</span>
            <input type="text" class="form-control" placeholder="First name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Birth date</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Age</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Sex</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Last Name</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>