@extends('user.layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
                <div class="title">Product Details</div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dt-img">
                        <div class="detpricetag"><div class="inner">Nrs.{{$product->cost}}</div></div>
                        <a class="fancybox" href="{{asset('upload/items/'.$product->photo)}}" data-fancybox-group="gallery" style="height: 411px;"><img src="{{asset('upload/items/'.$product->photo)}}" alt="" class="img-responsive"   /></a>
                    </div>

                   
                    @if($img)
                     @foreach($img as $p)
                    <div class="thumb-img">
                        <a class="fancybox" href="{{asset('/upload/items/'.$p)}}" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="{{asset('/upload/items/'.$p)}}" alt="" class="img-responsive" /></a>
                    </div>
                      @endforeach
                    @endif
                </div>
                <div class="col-md-6 det-desc">
                    <div class="productdata">
                        <div class="infospan">Brand Name <span>{{$product->brand_name}}</span></div>
                        <div class="infospan">Store Name <span>{{$product->store_name}}</span></div>
                        <div class="infospan">Print <span>{{$product->print}}</span></div>
                        <div class="infospan">Color <span>{{$product->color}}</span></div>
                        <div class="infospan">Size <span>{{$product->size}}</span></div>
                        <div class="average">
                            <form role="form">
                                <div class="form-group">
                                    <div class="rate"><span class="lbl">Average Rating</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star-half" style="color: #f7c51b;"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>

                        <form class="form-horizontal ava" role="form">
                            <div class="form-group">
                                <label for="qty" class="col-sm-2 control-label">Qty</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="qty" placeholder="Quantity" value="1">
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-default btn-success btn-sm"><span class="addchart">Add To Chart</span></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>

                        <div class="sharing">
                            <div class="avatock">
                                <div class="row">
                                    <div class="col-md-5">
                                        @if($product->status == 0)
                                        <button class="btn btn-primary btn-sm">Out of Stock <i class="fa fa-warning" style="color: red;"></i></button>
                                        @else
                                        <button class="btn btn-primary btn-sm">Available in Stock <i class="fa fa-smile-o" style="color: yellow;"></i></button>
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        <button class="btn btn-default"><span class="fa fa-facebook" style="color: #3b5997;"></span></button>
                                        <button class="btn btn-default "><span class="fa fa-twitter" style="color: #47a1f2;"></span></button>
                                        <button class="btn btn-default "><span class="fa fa-instagram" style="color: #f35d25;"></span></button>
                                    </div>

                                </div>
                                

                             
                              </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-review">
                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                    <li class=""><a href="#rev" data-toggle="tab">Reviews (0)</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade active in" id="desc">
                        <p>
                            {!!$product->description!!}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="rev">
                        <p class="dash">
                            <span>Jhon Doe</span> (11/25/2012)<br/><br/>
                            Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                        </p>
                        <h4>Write Review</h4>
                        <form role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" >
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="text" ></textarea>
                            </div>
                            <div class="form-group">
                                <div class="rate"><span>Rating:</span></div>
                                <div class="starwrap">
                                    <div>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                        <i class="fa fa-star" style="color: #f7c51b;"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <button type="submit" class="btn btn-default btn-red btn-sm">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

            <div id="title-bg">
                <div class="title">Other Product from this Store</div>
            </div>
            <div class="row prdct"><!--Products-->
                @foreach($related as $r)
                    <div class="col-md-4">
                        <div class="productwrap">

                             <div class="pr-img">
                                <a href="{{route('myproduct',$r->id)}}">

                                    <img src=" {{asset('upload/items/'.$r->photo)}}" alt="" class="img-responsive" style="height:135px;" />
                                </a>
                                <div class="pricetag"><div class="inner">Nrs.199</div></div>
                            </div>
                            <span class="smalltitle"><a href="#">{{$r->print}}</a></span>

                            @if($r->status == 0)
                            <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i><i class="fa fa-warning" style="color: red;"></i></a>
                            @else
                            <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a>
                            @endif

                            <a href="#" class="btn btn-danger"><i class="fa fa-heart"></i></a>
                            <br>
                            <span class="smalldesc">{{$r->size}}</span>
                            <span class="smalldesc" style="float: right;">{{$r->brand_name}}</span>
                        </div>
                    </div>
                @endforeach

                <div style="text-align: center;">
                    <button class="btn btn-primary"><a href="#" style="color: white">View More Product from this Store</a></button>
                </div>
            </div><!--Products-->
            <div class="spacer"></div>
        </div><!--Main content-->
        <div class="col-md-3"><!--sidebar-->
             @include('user.layouts.sidebar')


                <div class="ads">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolor</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolor</p>
                   
                </div>

        </div><!--sidebar-->
    </div>
</div>
    @endsection