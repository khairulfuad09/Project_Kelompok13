@extends('partials.main')
@section('container')
    {{-- Content --}}
    @if (session()->has('success'))
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- @dd($user) --}}
    <h1>Data User</h1>
    <button type="button" class="btn btn-blue tombolTambahData mb-5" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Data
    </button>

    <table class="table text-white tb-center">
        <tbody>
            @foreach ($user as $usr)
                <tr>
                    <td class="bold">{{ $usr->username }}</td>
                    <td class="bold">{{ $usr->email }}</td>
                    <td class="bold">{{ $usr->alamat }}</td>
                    <td class="d-flex">
                        {{-- <a href="/user/{{ $usr->id }}/edit" class="btn btn-blue">Edit</a> --}}
                        <div class="">
                            <a href="/user/{{ $usr->id }}/edit" class="btn btn-blue">Edit data</a>
                        </div>
                        <form action="/user/{{ $usr->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Content --}}
@endsection

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label" style="color: black">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old ('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label" style="color: black">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old ('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label" style="color: black">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old ('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label" style="color: black">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old ('password') }}">
                            @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>