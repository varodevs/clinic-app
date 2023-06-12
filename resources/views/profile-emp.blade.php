<div class="col-3 align-self-center m-3">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Full name</span>
            <input type="text" class="form-control" placeholder="Full name" aria-label="ID" aria-describedby="basic-addon1" @if($employee != null) value="{{ $employee->name_emp }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title</span>
            <input type="text" class="form-control" placeholder="Title" aria-label="ID" aria-describedby="basic-addon1" @if($employee != null) value="{{ $employee->title }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title court.</span>
            <input type="text" class="form-control" placeholder="Title courtesy" aria-label="ID" aria-describedby="basic-addon1" @if($employee != null) value="{{ $employee->title_court }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Birth date</span>
            @php
                use Carbon\Carbon;
                $dateb = Carbon::parse($employee->date_birth);
                $dateh = Carbon::parse($employee->date_hire);
            @endphp
            <input type="text" class="form-control" placeholder="Birth date" aria-label="ID" aria-describedby="basic-addon1" @if($employee != null) value="{{ $dateb->format('Y-m-d') }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date hired</span>
            <input type="text" class="form-control" placeholder="Date hired" aria-label="ID" aria-describedby="basic-addon1" @if($employee != null) value="{{ $dateh->format('Y-m-d') }}" @endif disabled>
        </div>
        <div class="input-group mb-3">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Upload</button>
    </form>
</div>