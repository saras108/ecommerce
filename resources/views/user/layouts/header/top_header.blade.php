<div class="header"><!--Header -->
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4 main-logo">
                <img src="{{asset('client/images/logo.png')}}" alt="logo" class="logo img-responsive" />
            </div>



                @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                <div class="col-md-8">
                <div class="pushright">
                    <div class="top">
                        <a href="#" id="reg" class="btn btn-default btn-dark">{{ Auth::guard()->user()->name }}</a>
                        <div class="regwrap" style="width: 24%;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <p style="text-align: center;"><a href="#" style="color: #3b454e;"><b>My Profile</b></a></p>
                                        <hr>
                                        <p style="text-align: center;"><a href="{{route('cart')}}" style="color: #3b454e;"><b>My Cart</b></a></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="float: right;">
                             {{ csrf_field() }}
                           <button class="btn btn-default btn-dark" type="submit">Log Out</button>
                        </form>
                        
                    </div>
                </div>

            </div>
                    @else
                <div class="col-md-8">
                <div class="pushright">
                    <div class="top">
                        <a href="#" id="reg" class="btn btn-default btn-dark">Login<span></a>
                        <div class="regwrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title-widget-bg">
                                        <div class="title-widget">Login</div>
                                    </div>
                                    <form role="form" method="POST" action="{{ route('login') }}">
                                          {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" placeholder="Enter your E-mail" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" placeholder="Enter the Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-default btn-red btn-sm">Log In</button>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-default btn-sm" style="background-color: #4267b2; color: white;"><a href="{{route('fb_login')}}" style="color: white;">Using <i class="fa fa-facebook"></i></a></button>
                                            <button class="btn btn-default btn-sm" style="background-color: #47a1f2; color: white;">Using <i class="fa fa-twitter"></i></button>
                                            <button class="btn btn-default btn-sm" style="background-color: #922cb3; color: white;">Using <i class="fa fa-instagram"></i></button>
                                            <button class="btn btn-default btn-sm" style="background-color: #f6bc0b; color: white;">Using <i class="fa fa-google-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                                        <div class="form-group">

                            <p style="float: left; padding-left: 44%; margin: 6px 0 10px;">Not a Member Yet?</p>    
                                            <button style="float: right;" class="btn btn-default btn-red btn-sm"><a href="{{route('check_out')}}" style="color: white;">Sign up</a></button>
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div class="dashed"></div>
</div>
