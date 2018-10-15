@extends('user.layouts.template')

@section('content')
    @php $sum = 0; @endphp
    <div class="container">
        <div class="title-bg">
            <div class="title">Shopping Cart</div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered chart">
                <thead>
                <tr>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Print</th>
                    <th>Action</th>
                    <th>Number</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>225883</td>
                    <td>
                        <a href="#">
                            <i class="fa fa-edit btn btn-primary" style="color: white;"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-trash-o btn btn-danger" style="color: white;"></i>
                        </a>
                    </td>
                    <td class="number">11</td>
                    <td class="cost">$94.00</td>
                    <td class="sub_total">
                        @php $minor_sum = (11*11);@endphp
                        {{$minor_sum}}
                        @php $sum = $sum+ $minor_sum; @endphp

                    </td>


                </tr>
                <tr>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>225883</td>
                    <td>
                        <a href="#">
                            <i class="fa fa-edit btn btn-primary" style="color: white;"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-trash-o btn btn-danger" style="color: white;"></i>
                        </a>
                    </td>
                    <td class="number">11</td>
                    <td class="cost">$94.00</td>
                    <td class="sub_total">
                        @php $minor_sum = (11*11);@endphp
                        {{$minor_sum}}
                        @php $sum = $sum+ $minor_sum; @endphp

                    </td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-9">

                <div class="page-title-wrap" style="margin-top: 0%">
                    <div class="page-title-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bigtitle" style="color: #428bca;"><u>Mega Offer </u><i
                                            class="fa fa-plane"></i><i class="fa fa-plane"></i></div>
                                <br>
                                <div style="color: #428bca; font-size: large;"> Buy the product of NRs.2500 per month and every month get the gift hamper from our side.
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12 col-md-offset-8">
                                <button class="btn btn-default btn-yellow btn-lg">
                                    <a href="{{route('home')}}" class="btn btn-default btn-yellow">Continue Shopping</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="subtotal-wrap">
                    <div class="subtotal">
                        @php
                            $vat = 13/100*$sum;
                            $total_amt = $sum + $vat;
                            $sipping =  $total_amt*11/100;
                            $total_cost = $sum + $vat + $sipping;
                        @endphp
                        <p>Sum Total : {{$sum}}</p>
                        <p>Vat 13% : {{$vat}}</p>
                        @if($total_amt <  999)
                            <p>Sipping : {{$sipping}}</p>
                        @endif
                    </div>
                    <div class="total">Total : <span class="bigprice">${{$total_cost}}</span></div>
                    <a href="{{route('check_out')}}" class="btn btn-default btn-red">Check Out for Now</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="spacer"></div>
    </div>

@endsection