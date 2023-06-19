@extends('partials.main')
@section('container')
    @can('penjual')
    {{-- @dd($orders) --}}
        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $orders }}</h3>
                            <p>Pesanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/pesanan" class="small-box-footer">info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                My Product
                            </h3>
                            {{ $product->links() }}
                        </div>
                        <!-- /.card-header -->
                        @if (session()->has('success'))
                            <div class="alert alert-succes alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{--  --}}
                        {{-- @dd($product) --}}
                        @foreach ($product as $prd)
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                        <!-- todo text -->
                                        <span class="text">{{ $prd->namaproduk }}</span>

                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <button><a class="fas fa-edit"
                                                    href="/product/{{ $prd->id_product }}/edit"></a></button>
                                            <form action="/product/{{ $prd->id_product }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="fas fa-trash"
                                                    onclick="return confirm('Apa Anda Yakin menghapus data ini??')"></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                                data-bs-target="#formModal"><i class="fas fa-plus"></i>
                                Add item</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <!-- /.content -->
    @endcan
@endsection


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Produk</h1>
            </div>
            <div class="modal-body">
                <form action="/product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="namaproduk" class="col-sm-3 col-form-label" style="color: black">Nama
                            Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('namaproduk') is-invalid @enderror"
                                id="namaproduk" name="namaproduk" required autofocus value="{{ old('namaproduk') }}">
                            @error('namaproduk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">
                        <label for="jenisproduk" class="col-sm-3 col-form-label" style="color: black">Jenis
                            Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('jenisproduk') is-invalid @enderror"
                                id="jenisproduk" name="jenisproduk" required autofocus value="{{ old('jenisproduk') }}">
                            @error('jenisproduk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label" style="color: black">Stok
                            Produk</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                id="stok" name="stok" required autofocus value="{{ old('stok') }}">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label" style="color: black">gambar
                            Produk</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" name="image" autofocus value="{{ old('image') }}">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label" style="color: black">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                id="namaproduct" name="harga" required autofocus value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label" style="color: black">Deskripsi
                            Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" name="deskripsi" required autofocus value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <span></span>
                    <div class="form-group row">

                        <div class="col-sm-9">
                            <input type="hidden" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" autofocus value="{{ auth()->user()->email }}">
                            @error('email')
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
