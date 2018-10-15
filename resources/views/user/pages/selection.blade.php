@extends('user.layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9"><!--Main content-->
                              <div class="title-bg">
                    <div class="title">Products Accoring to your Needs</div>
                </div>
                <div class="row prdct"><!--Products-->

                    @foreach($items as $item)
                    <div class="col-md-4">
                        <div class="productwrap">

                             <div class="pr-img">
                                <a href="{{route('myproduct',$item->id)}}">

                                    <img src=" {{asset('upload/items/'.$item->photo)}}" alt="" class="img-responsive" style="height:135px;" />
                                </a>
                                <div class="pricetag"><div class="inner">Nrs.{{$item->cost}}</div></div>
                            </div>
                            <span class="smalltitle"><a href="#">{{$item->print}}</a></span>

                            @if($item->status == 0)
                            <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i><i class="fa fa-warning" style="color: red;"></i></a>
                            @else
                            <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a>
                            @endif

                            <a href="#" class="btn btn-danger"><i class="fa fa-heart"></i></a>
                            <br>
                            <span class="smalldesc">{{$item->size}}</span>
                            <span class="smalldesc" style="float: right;">{{$item->brand_name}}</span>
                        </div>
                    </div>
                    @endforeach()

                </div><!--Products-->
                <div class="spacer"></div>
            </div><!--Main content-->
            <div class="col-md-3"><!--sidebar-->

                @include('user.layouts.sidebar')

            </div><!--sidebar-->
 

        </div>
    </div>
    @endsection