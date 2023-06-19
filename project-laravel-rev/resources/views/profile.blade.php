@extends('partials.main')
@section('container')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Profile</h3>
                        </div>
                        <div class="form-group">
                            <h4>Username : {{ $profile->username }}</h4>
                        </div>
                        <div class="form-group">
                            <h4>Email : {{ $profile->email }}</h4>
                        </div>
                        <div class="form-group">
                            <h4>Alamat : {{ $profile->alamat }}</h4>
                        </div>
                    </div>
                    <!-- /Billing Details -->


                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Foto Profile</h3>
                    </div>

                    < <div class="input-checkbox">
                </div>
                
                <a href="/" class="primary-btn order-submit">kembali</a>
            </div>
            <!-- /Order Details -->
            <!-- Shiping Details -->
            <div class="shiping-details">
                <div class="section-title">
                    <h3 class="title">Edit Profile</h3>
                </div>
                <form action="/profile/{{ $profile->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">
                        <label for="shiping-address">
                            <span></span>
                            perbarui Profile
                        </label>
                        <input type="hidden" name="password" value="{{ bcrypt($profile->password) }}">
                        <input type="hidden" name="id_status" value="{{ $profile->id_status }}">

                        <div class="caption">
                            <div class="form-group">
                                <input class="input" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="alamat" placeholder="alamat">
                            </div>
                            <div class="form-group">
                                <input class="input" type="file" name="image" placeholder="Gamabar">
                            </div>
                            <div class="form-group">
                                <input class="input" type="submit" name="submit">
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- /Shiping Details -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
