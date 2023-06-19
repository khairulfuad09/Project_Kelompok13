@extends('partials.main')
@section('container')
    @can('penjual')
        <!-- Main content -->
        {{-- @dd($product) --}}


        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/product/{{ $product->id_product }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input name="namaproduk" type="text" class="form-control" id="exampleInputEmail1" name="namaproduk"
                            placeholder="Nama Produk" value={{ old('namaproduk', $product->namaproduk) }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Produk</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Jenis Produk"
                            name="jenisproduk" value={{ old('jenisproduk', $product->jenisproduk) }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok Produk</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="stok Produk"
                            name="stok" value={{ old('stok', $product->stok) }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Harga" name="harga"
                            value={{ old('harga', $product->harga) }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Produk</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi"
                            name="deskripsi" value={{ old('deskripsi', $product->deskripsi) }}>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="email" name="email"
                            value={{ old('email', $product->email) }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar Product</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image"
                                    value="{{ old('image', $product->image) }}">
                                <label class="custom-file-label"
                                    for="exampleInputFile">{{ old('image', $product->image) }}</label>

                            </div>
                        </div>
                    </div>
                    <p>note : nama file baru yg di upload namanya memang tidak muncul, yang tampil hanya nama file
                        sebelumnya</p>
                    <img src="/img/{{ $product->image }}" alt="gambar" style="width: 150px">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="/product">
                        <button class="btn btn-danger">close</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    @endcan
@endsection
