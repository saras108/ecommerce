@extends('user.layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 al-cus">
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
            <div class="col-md-5 al-cus">
                <div class="title-bg">
                    <div class="title">New Customer</div>
                </div>
                <form role="form">
                    <p>
                        I want to be the member.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInput" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInpupas" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInput" placeholder="citizenship_no">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInpupas" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-default btn-red">Login</button>
                </form>
            </div>


            <div class="col-md-4 new-cus">
                <div class="title-bg">
                    <div class="title">Guest CheckOut</div>
                </div>
                <form role="form">
                    <p>Select Your Area</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Inside Valley
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Outside Valley
                                    </label>
                                </div></div>
                        </div>
                    </div>
                    <p>
                        By creating an account you will be able to shop faster, and somehow cheaper then in guest mode.
                    </p>
                    <button class="btn btn-default btn-red">Continue</button>
                </form>
            </div>


        </div>
        <div class="spacer"></div>
    </div>

@endsection