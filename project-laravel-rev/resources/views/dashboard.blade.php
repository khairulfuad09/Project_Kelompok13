@extends('partials.main')
@section('container')
    @auth
        @can('user')
            <!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->

            <!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">New Products</h3>
                                <div class="section-nav">

                                </div>
                            </div>
                        </div>
                        <!-- /section title -->

                        <!-- Products tab & slick -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">
                                    <!-- tab -->
                                    <div id="tab1" class="tab-pane active">
                                        <div class="products-slick" data-nav="#slick-nav-1">
                                            @foreach ($product as $prd)
                                                <!-- product -->
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img src="/img/{{ $prd->image }}" alt="" style="height: 250px">
                                                        <div class="product-label">
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">{{ $prd->jenisproduk }}</p>
                                                        <h3 class="product-name"><a href="#">{{ $prd->namaproduk }}</a></h3>
                                                        <h4 class="product-price">Rp.{{ $prd->harga }}
                                                        </h4>
                                                        <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="product-btns">
                                                            <a href="/produk/{{ $prd->id_product }}/edit" class="quick-view"><i
                                                                    class="fa fa-eye"></i><span></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a href="/cart/{{ $prd->id_product }}">
                                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- /product -->
                                            @endforeach


                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                    </div>
                                    <!-- /tab -->
                                </div>
                            </div>
                        </div>
                        <!-- Products tab & slick -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->



            <!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">Top selling</h3>
                                <div class="section-nav">

                                </div>
                            </div>
                        </div>
                        <!-- /section title -->

                        <!-- Products tab & slick -->
                        <div class="row">
                            @foreach ($product as $prd)
                                <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="/img/{{ $prd->image }}" alt="" style="height: 250px">
                                            <div class="product-label">
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $prd->jenisproduk }}</p>
                                            <h3 class="product-name"><a href="#">{{ $prd->namaproduk }}</a></h3>
                                            <h4 class="product-price">{{ $prd->harga }}</h4>
                                            <div class="product-btns">
                                                <a href="/produk/{{ $prd->id_product }}/edit" class="quick-view"><i
                                                        class="fa fa-eye"></i><span></span></a>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="/cart/{{ $prd->id_product }}">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach
                        </div>
                        <!-- /Products tab & slick -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->
        @endcan

        @can('penjual')
            {{-- @dd(auth()) --}}
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
                        <a href="/pesanan" class="small-box-footer">info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $products }}</h3>
                            <p>Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/product" class="small-box-footer">info<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin')
            <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
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
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <!-- /.content -->
        @endcan
    @else
        {{-- @dd(auth()) --}}
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">



                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Rekomendasi Produk</h3>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        @foreach ($product as $prd)
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="/img/{{ $prd->image }}" alt=""
                                                        style="height: 250px">
                                                    <div class="product-label">
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">{{ $prd->jenisproduk }}</p>
                                                    <h3 class="product-name"><a href="#">{{ $prd->namaproduk }}</a>
                                                    </h3>
                                                    <h4 class="product-price">Rp.{{ $prd->harga }}
                                                    </h4>
                                                    <div class="product-btns">
                                                        <a href="/produk/{{ $prd->id_product }}/edit" class="quick-view"><i
                                                                class="fa fa-eye"></i><span></span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="/sign">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                            add to
                                                            cart</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                        @endforeach

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->



        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Produk</h3>
                            <div class="section-nav">

                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    {{ $product->links() }}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        @foreach ($product as $prd)
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="/img/{{ $prd->image }}" alt=""
                                                        style="height: 250px">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">{{ $prd->jenisproduk }}</p>
                                                    <h3 class="product-name"><a href="#">{{ $prd->namaproduk }}</a>
                                                    </h3>
                                                    <h4 class="product-price">{{ $prd->harga }}
                                                    </h4>

                                                    <div class="product-btns">
                                                        <a href="/produk/{{ $prd->id_product }}/edit" class="quick-view"><i
                                                                class="fa fa-eye"></i><span></span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="/sign">
                                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                        @endforeach
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- /Products tab & slick -->

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->
    @endauth
@endsection