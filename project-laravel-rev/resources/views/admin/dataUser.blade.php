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
                <h1 class="modal-title fs-5 c-black" id="judulModal">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" placeholder="username"
                            name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" placeholder="password"
                            name="password">
                    </div>
                    <input type="hidden" name="id_status" value="usr">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
            </form>
        </div>
    </div>
</div>
