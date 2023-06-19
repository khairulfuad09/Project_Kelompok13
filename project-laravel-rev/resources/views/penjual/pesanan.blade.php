@extends('partials.main')
@section('container')
    {{-- @dd($pesanans) --}}
    @auth
        @can('penjual')
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pesanan masuk</h1>
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
                                <h3>{{ $products }}</h3>
                                <p>Produk ku</p>
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
                                {{-- {{ $product->links() }} --}}
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
                            @foreach ($pesanans as $pesanan)
                                <div class="card-body">
                                    <ul class="todo-list" data-widget="todo-list">
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <!-- todo text -->
                                            <span class="text">{{ $pesanan->namaproduk }} | {{ $pesanan->username }} | jumlah
                                                pesanan : {{ $pesanan->jumlah_pesanan }}</span>

                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <button><a class="fas fa-edit"
                                                        href="/pesanan/{{ $pesanan->id }}/edit"></a></button>
                                                <form action="/pesanan/{{ $pesanan->id }}" method="post">
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
    @endauth
@endsection
