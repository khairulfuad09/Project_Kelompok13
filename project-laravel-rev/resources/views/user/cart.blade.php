@extends('partials.main')
@section('container')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form action="/order" method="post">
                    @csrf
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="username" placeholder="username" value="{{ auth()->user()->username }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="alamat" placeholder="alamat" value="{{ auth()->user()->alamat }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="nomor" placeholder="nomor telephone">
                            </div>
                            <div class="form-group">
                                <input class="input" type="hidden" name="status" placeholder="status" value="unpaid">
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="create-account">
                                    <label for="create-account">
                                        <span></span>
                                        Create Account?
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt.</p>
                                        <input class="input" type="password" name="password"
                                            placeholder="Enter Your Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Billing Details -->

                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            <div class="order-products">
                                {{-- @dd(session('cart')) --}}
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ((array) session('cart') as $id => $details)
                                    @php
                                        $total += $details['price'] * $details['quantity'];
                                    @endphp
                                    <div class="order-col">
                                        <div>{{ $details['quantity'] }} x {{ $details['product_name'] }}
                                        </div>
                                        <div>{{ $details['price'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div>
                                    <strong class="order-total">Rp.{{ $total }}</strong>
                                    <input class="input" type="hidden" name="total_harga" placeholder="total harga"
                                        value="{{ $total }}">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="primary-btn order-submit" >
                    </div>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
