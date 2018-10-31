<div class="main-nav"><!--end main-nav -->
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('home')}}" class="active">Home</a><div class="curve"></div></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('brand')}}">T-Shirt Brand</a></li>
                                    <li><a href="{{route('mission')}}">Our Mission and Vision</a></li>
                                    <li><a href="{{route('policy')}}">Our Policy</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 machart">
                    <button class="btn btn-default btn-chart btn-sm ">
                        <span class="mychart"><a href="{{route('cart')}}">MY Chart</a></span>
                        <span class="badge" style="font-weight: 200; background-color: #2b788d;">{{Session::has('cart') ? Session::get('cart')->quantity : ''}}</span>
                        |
                        <span class="allprice">Nrs.{{Session::has('cart') ? Session::get('cart')->totalPrice : ''}}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>