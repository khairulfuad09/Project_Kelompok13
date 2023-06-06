@extends('partials.main')
@section('container')
    <h1>Product</h1>
    <button type="button" class="btn bg-bluesky tombolTambahData mb-5" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Product
    </button>
@endsection
<table class="table-responsive">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Jenis Produk</th>
        <th scope="col">Stok Produk</th>
        <th scope="col">Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">deskripsi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-active">
        @php
        $no = 1;
        @endphp
        @foreach ($products as $index => $item)
        <tr>
          <th scope="row">{{ $index + $products->firstItem() }}</th>
          <td>{{ $item->namaproduk }}</td>
          <td>{{ $item->jenisproduk }}</td>
          <td>{{ $item->stok }}</td>
          <td>
            <div>
              <img style="width: 50px" src="{{ asset('storage/'. $item->image)}}">
            </div>
          </td>
          <td>{{ $item->hargaproduk }}</td>
          <td>{{ $item->deskripsi }}</td>
          <td>
            <a href="{{route('products.detail', $item->id)}}" class="btn btn-info">Detail</a>
            <a href="{{route('products.edit', $item->id)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('products.hapus', $item->id)}}" method="POST" class="d-inline">
              @csrf
              @method('put')
              <button class="btn btn-danger" onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
      </tr>
    </tbody>
  </table>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Penjual.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="namaproduk" class="col-sm-3 col-form-label" style="color: black">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('namaproduk') is-invalid @enderror" id="namaproduk" name="namaproduk" required autofocus value="{{ old ('namaproduk') }}">
                            @error('namaproduk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="jenisproduk" class="col-sm-3 col-form-label" style="color: black">Jenis Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('jenisproduk') is-invalid @enderror" id="jenisproduk" name="jenisproduk" required autofocus value="{{ old ('jenisproduk') }}">
                            @error('jenisproduk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label" style="color: black">Stok Produk</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" required autofocus value="{{ old ('stok') }}">
                            @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label" style="color: black">Produk</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required autofocus value="{{ old ('image') }}">
                            @error('image')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label" style="color: black">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="namaproduct" name="namaproduct" required autofocus value="{{ old ('harga') }}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <<span></span>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label" style="color: black">Deskripsi Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus value="{{ old ('deskripsi') }}">
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>