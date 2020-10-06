@extends('frontendtemplate')
@section('title','Register Form')
@section('content')

<!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Be A Seller</h2>
                        <form method="post" action="#" enctype="multipart/form-data">
                          @csrf
                            <div class="group-input">
                                <label for="name">Name</label>
                                <input type="text" id="name">
                            </div>

                            <div class="group-input">
                                <label for="profile">Profile</label>
                                <input type="file" name="profile" class="form-control" id="Inputprofile" >
                            </div>

                            <div class="group-input">
                                <label for="address">Address</label>
                                <input type="text" id="address">
                            </div>

                            <div class="group-input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone">
                            </div>



                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" id="email">
                            </div>

                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" id="pass">
                            </div>
                            

                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="text" id="con-pass">
                            </div>

                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{route('login')}}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
@endsection