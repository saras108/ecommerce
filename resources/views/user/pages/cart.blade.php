@extends('user.layouts.template')

@section('content')
    @php $sum = 0; @endphp
    <form method="get" action="{{route('check_out')}}">
        {{csrf_field()}}
    <div class="container">
        <div class="title-bg">
            <div class="title">Shopping Cart</div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered chart">
                <thead>
                    @if($products)
                <tr>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Print</th>
                    <th>Action</th>
                    <th>Number</th>
                    <th>Unit Price (Nrs.)</th>
                    <th>Total Price</th>

                </tr>
                @endif
                </thead>
                <tbody>
                    @if($products)
                    @foreach($products as $product)
                <tr> 
                    <td>
                        <input type="hidden" name="brand_name[]" value="{{$product['items']['brand_name']}}">{{$product['items']['brand_name']}}
                    </td>


                   
                        <input type="hidden" name="store_id[]" value="{{$product['items']['store_id']}}">
                        <input type="hidden" name="size[]" value="{{$product['items']['size']}}">
                        <input type="hidden" name="product_id[]" value="{{$product['items']['id']}}">
                

                    <td>
                        <input type="hidden" name="color[]" value="{{$product['items']['color']}}">{{$product['items']['color']}}
                    </td>
                    <td>
                        <input type="hidden" name="print[]" value="{{$product['items']['print']}}">{{$product['items']['print']}}
                    </td>
                    <td>
                        <a href="#">
                            <i class="btn btn-success" style="color: white;">+1</i>
                        </a>
                        <a href="#">
                            <i class="btn btn-warning" style="color: white;">-1</i>
                        </a>
                        <a href="#">
                            <i class="fa fa-trash-o btn btn-danger" style="color: white;"></i>
                        </a>
                    </td>
                    <td class="number">
                        <input type="hidden" name="qty[]" value="{{$product['qty']}}">{{$product['qty']}}
                    </td>
                    <td class="cost">
                        <input type="hidden" name="cost[]" value="{{$product['items']['cost']}}">{{$product['items']['cost']}}
                    </td>
                    <td class="sub_total">
                        <input type="hidden" name="price[]" value="{{$product['price']}}">{{$product['price']}}
                    </td>
                </tr>

                @endforeach
                @else
                <h1>No Products in the cart.</h1>
                @endif
                </tbody>
            </table>
        </div>
        <dir></dir class="row">
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

             @if($products)
            <div class="col-md-3">
                <div class="subtotal-wrap">
                    <div class="subtotal">
                        @php
                            $vat = 13/100*$totalPrice;
                            $total_cost = $totalPrice + $vat;
                        @endphp
                        <p>Cost : Nrs. {{$totalPrice}}</p>
                        <p>Vat 13% : {{$vat}}</p>
                    </div>
                    <input type="hidden" name="total" value="{{$totalPrice}}">
                    <input type="hidden" name="vat" value="{{$vat}}">
                    <input type="hidden" name="sumtotal" value="{{$total_cost}}">
                    <div class="total">Total : <span class="bigprice">Nrs. {{$total_cost}}</span></div>
                    <button class="btn btn-default btn-red" type="submit">  <a style="color: white;" >Check Out for Now</a> </button>
                   
                </div>
                <div class="clearfix"></div>
            </div>
            @endif()
        </div>
    </form>
        <div class="spacer"></div>
    </div>

@endsection