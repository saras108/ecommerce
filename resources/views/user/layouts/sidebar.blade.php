                <div class="title-bg">
                    <div class="title">Select of your type</div>
                </div>

                <div class="categorybox">
                    <ul>
                        <li><a href="{{route('home')}}">Show All</a></li>
                        <li><a href="#"> Size</a>
                            <ul>
                                <li><a class="size" href="#" value="Smaller">Smaller</a></li>
                                <li><a class="size" href="#" value="Small">Small</a></li>
                                <li><a class="size" href="#" value="Medium">Medium</a></li>
                                <li><a class="size" href="#" value="Large">Large</a></li>  
                                <li><a class="size" href="#" value="Larger">Larger</a></li>
                            </ul>
                        </li>
                        <li><a href="#"> Cost</a>
                            <ul>
                                <li><a class="cost" href="#" value="< 500">Below 500)</a></li>
                                <li><a class="cost" href="#" value="1000 > 500">Range (500-1000) </a></li>
                                <li><a class="cost" href="#" value=">1000">Above 1000</a></li>
                            </ul>
                        </li>
                        <li><a href="#"> Popular Available Color</a>
                            <ul>
                                <li><a class="color" href="#">Black</a></li>
                                <li><a class="color" href="#">White</a></li>
                                <li><a class="color" href="#">Gray </a></li>
                                <li><a class="color" href="#">Red</a></li>
                                <li><a class="color" href="#">Navy</a></li>
                            </ul>
                        </li>
                        <li class="lastone"><a href="#">Offers</a></li>
                    </ul>
                </div>

                @section('footer-script')
                 <script type="text/javascript">
                $(document).ready(function(){

                    $( ".size" ).click(function() {
                        $data = $(this).attr('value'); 
                        alert($data);
                         $(this).attr('href', '{{route("size",'$data')}}');
                    });

                    $( ".cost" ).click(function() {
                        $data = $(this).attr('value'); 
                        alert($data);
                         $(this).attr('href', '{{route("cost",'$data')}}');
                    });

                    $( ".color" ).click(function() {
                        $data = $(this).attr('value'); 
                        alert($data);
                         $(this).attr('href', '{{route("color",'$data')}}');
                    });

                });
                </script>
                @endsection