@extends('partials.main')
@section('container')
    {{-- @dd(session('snap')) --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    {{-- @dd($orders) --}}
    <!-- store products -->
    <!-- aside Widget -->
    <div class="aside">
        <button class="btn btn-primary mt-3 " id="pay-button" onclick="pay()">Bayar Sekarang</button>
        {{-- <h3 class="aside-title">CheckOut</h3> --}}
    </div>
    <!-- /aside Widget -->
    <div class="row">
        <!-- product -->
        @foreach ($orders as $order)
            <div class="col-md-4 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/img/{{ $order->image }}" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $order->jenisproduk }}</p>
                        <h3 class="product-name"><a href="#">{{ $order->namaproduk }}</a></h3>
                        <h4 class="product-price">{{ $order->jumlah_pesanan }} x {{ $order->harga }}</h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                    wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                    compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                    view</span></button>
                        </div>
                    </div>
                    <form action="/order/{{ $order->id }}" method="post">
                        @method('delete')
                        @csrf
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> batal pesan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /product -->
        @endforeach
        @foreach (session('snap') as $ses)
            {{ $sessioni = $ses }}
        @endforeach
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script type="text/javascript">
    function pay() {

        window.snap.pay("{{ $sessioni }}") {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        }
    }
</script>
