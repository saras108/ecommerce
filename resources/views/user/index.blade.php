@extends('user.layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9"><!--Main content-->
                              <div class="title-bg">
                    <div class="title">Our Products</div>
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
                            <a href="{{route('add_to_cart',$item->id)}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i><i class="fa fa-warning" style="color: red;"></i></a>
                            @else
                            <a href="{{route('add_to_cart',$item->id)}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a>
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

     
 
    <div class="f-widget featpro">
        <div class="container">
            <div class="title-widget-bg">
                <div class="title-widget">Most Sold Products</div>
                <div class="carousel-nav">
                    <a class="prev"></a>
                    <a class="next"></a>
                </div>
            </div>
            <div id="product-carousel" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <div class="hot"></div>
                            <a href="#"><img src="client/images/sample-1.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Nikon Camera</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <div class="new"></div>
                            <a href="#"><img src="client/images/sample-2.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Black Shoes</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="#"><img src="client/images/sample-3.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Red T-Shirt</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="#"><img src="client/images/sample-1.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Nikon Camera</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="#"><img src="client/images/sample-2.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Black Shoes</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="#"><img src="client/images/sample-3.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Red T-Shirt</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <a href="#"><img src="client/images/sample-1.jpg" alt="" class="img-responsive"/></a>
                            <div class="pricetag blue"><div class="inner"><span>$199</span></div></div>
                        </div>
                        <span class="smalltitle"><a href="#">Nikon Camera</a></span>
                        <span class="smalldesc">Item no.: 1000</span>
                    </div>
                </div>
            </div>
                   
        </div>


    </div>
    @endsection