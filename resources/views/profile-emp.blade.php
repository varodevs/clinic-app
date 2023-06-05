<div class="col-3 align-self-center m-3">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" placeholder="First name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $employee->name_emp }}" disabled>
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
            @php
                use Carbon\Carbon;
            @endphp
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $employee->date_birth->format('Y-m-d')) }}" disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date hired</span>
            <input type="text" class="form-control" placeholder="Last name" aria-label="ID" aria-describedby="basic-addon1" value="{{ $patient->date_hire->format('Y-m-d') }}" disabled>
        </div>
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>