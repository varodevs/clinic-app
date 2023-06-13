@extends('layout')

@section('content')
<div class="col-3 align-self-center m-3">
    <h3>New User</h3>
    <form action="{{ route('admin-new-usr') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Username</span>
            <input type="text" class="form-control" name="uname" placeholder="Username" aria-label="fn" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="text" class="form-control" name="email" placeholder="name@email.com" aria-label="ln" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">password</span>
            <input type="text" class="form-control" name="passw" placeholder="Phone Number" aria-label="pn" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Role</span>
            <select name="role">
                <option value="5">Employee</option>
                <option value="6">User</option>
            </select>
        </div>
        <button class="btn btn-success" type="submit">Create User</button>
    </form>
</div>
@endsection