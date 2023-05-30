@extends('partials.main')
@section('container')
    <h1>Update User</h1>

    <form action="/user/{{ $user->id }}" method="post" class="from-tUser">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="username" name="username"
                value="{{ old('username', $user->username) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email"
                value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat"
                value="{{ old('alamat', $user->alamat) }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="" name="password">
        </div>
        <div class="mb-3">
            <input type="hidden" name="id_status" value="usr">
            <button type="button" class="btn btn-danger mb-3" data-bs-dismiss="modal"><a href="/user">Close</a></button>
            <button type="submit" class="btn btn-blue">Update data</button>
        </div>

    </form>
@endsection
