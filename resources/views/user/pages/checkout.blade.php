@extends('user.layouts.template')

@section('content')


 @if (Auth::guest())

     <div class="container">
        <div class="row">
            <div class="col-md-12 al-cus">
                <div class="title-bg"> 
                    <div class="title">New Customer</div>
                </div>
                <form role="form" method="post" action="{{route('register')}}">
                    {{ csrf_field() }}
                    <p>
                        I want to be the member.
                    </p>
                       @if ($errors->any())

        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-8" style="background-color: #ef807b;">
                 @foreach ($errors->all() as $error)
                    <p style="color: white; text-align: center; padding-top: 7px;">{{ $error }}</p>
                @endforeach
                            
            </div>
        </div>
@endif


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInput" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInpupas" placeholder="Enter Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInput" placeholder="citizenship_no" name="citizenship_no">
                            </div>



                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInput" placeholder="Contact Number" name="contact">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">


                            <div class="form-group">
                                <button class="btn btn-default btn-sm" style="background-color: #4267b2; color: white;"><a href="{{route('fb_login')}}" style="color: white;">Login With <i class="fa fa-facebook"></i></a></button>
                                <button class="btn btn-default btn-sm" style="background-color: #47a1f2; color: white;"><a href="#" style="color: white;">Login With <i class="fa fa-twitter"></i></a></button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default btn-sm" style="background-color: #922cb3; color: white;"><a href="#" style="color: white;">Login With <i class="fa fa-instagram"></i></a></button>

                                <button class="btn btn-default btn-sm" style="background-color: #f6bc0b; color: white;"><a href="#" style="color: white;">Login With <i class="fa fa-google-plus"></i></a></button>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-default btn-red" type="submit">Login</button>
                </form>
            </div>
            <div class="col-md-4 al-cus">
                <div class="title-bg">
                    <div class="title">Already Customer</div>
                </div>
                <form role="form">
                    <p>
                        I am returning customer
                    </p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInpupas" placeholder="Password">
                    </div>
                    <button class="btn btn-default btn-red">Login</button>
                </form>
            </div>



            <div class="col-md-8 new-cus">
                <div class="title-bg">
                    <div class="title">Guest CheckOut</div>
                </div>
                <form method="post" action="{{route('buy_items')}}">

                    {{csrf_field()}}

             @if ($errors->any())


        <div class="row" style="padding-bottom: 20px;">
          
            <div class="col-md-8" style="background-color: #ef807b;">
                 @foreach ($errors->all() as $error)
                                    <p style="color: white; text-align: center; padding-top: 7px;">{{ $error }}</p>
                                @endforeach
                            
            </div>
        </div>
                        @endif
                    <p>
                        By creating an account you will be able to shop faster, and somehow cheaper then in guest mode.
                    </p>

                    <input type="hidden" name="items" value="{{$items}}">
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="hidden" name="vat" value="{{$vat}}">
                    <input type="hidden" name="sumtotal" value="{{$sumtotal}}">

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="exampleInput" placeholder="Name">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="contact_number" class="form-control" id="exampleInput" placeholder="Contact Number">
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" id="exampleInput" placeholder="Dropping Location">
                            </div>
                            </div>
                        </div>
                    <button class="btn btn-default btn-red" type="submit">Proceed</button>
                </form>
            </div>


        </div>
        <div class="spacer"></div>
    </div>



 @else
        <div class="container">
        <div class="row">

                                       @if ($errors->any())


        <div class="row" style="padding-bottom: 20px;">
          
            <div class="col-md-8" style="background-color: #ef807b;">
                 @foreach ($errors->all() as $error)
                                    <p style="color: white; text-align: center; padding-top: 7px;">{{ $error }}</p>
                                @endforeach
                            
            </div>
        </div>
                        @endif
                        
            <div class="col-md-8">

                <div class="page-title-wrap" style="margin-top: 0%">
                    <div class="page-title-inner">
                        <div class="row">
                            <div class="col-md-12">
                <table class="table table-bordered chart">
            
                <tbody>
                   
                <tr> 
                    <th colspan="2">
                        <input type="hidden">Brif Information
                    </th>
                </tr>
                   
                <tr> 
                    <th>
                        <input type="hidden">Name
                    </th>
                    <td>
                        <input type="hidden">{{ Auth::guard()->user()->name }}
                    </td>
                </tr>
                   
                <tr> 
                    <th>
                        <input type="hidden">Brought Items No.
                    </th>
                    <td>
                        <input type="hidden">{{Session::has('cart') ? Session::get('cart')->quantity : ''}}
                    </td>
                </tr>
                   
                <tr> 
                    <th>
                        <input type="hidden">Vat
                    </th>
                    <td>
                        <input type="hidden">{{$vat}}
                    </td>
                </tr>
                   
                <tr> 
                    <th>
                        <input type="hidden">Total Cost
                    </th>
                    <td>
                        <input type="hidden">{{$sumtotal}}
                    </td>
                </tr>
               
                </tbody>
            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 al-cus">
                <div class="title-bg">
                    <div class="title">Details</div>
                </div>


                <form method="post" action="{{route('buy_items')}}">

                    {{csrf_field()}}
                    <p>
                        Thank you for shopping with us. <i class="fa fa-smile-o"></i>
                        <br>
                        Be Happy.
                    </p>

                    <input type="hidden" name="items" value="{{$items}}">
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="hidden" name="vat" value="{{$vat}}">
                    <input type="hidden" name="sumtotal" value="{{$sumtotal}}">

                    <div class="form-group">
                        <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter your Contact Number">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Dropping Address">
                    </div>


                    <button class="btn btn-default btn-red" type="submit">Proceed</button>
                </form>
            </div>
    </div>
</div>

    @endif

@endsection