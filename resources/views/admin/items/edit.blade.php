@extends('admin.template')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.root')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('store.list.items')}}">Items</a></li>
        <li class="breadcrumb-item active">Edit Items</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('store.update.items')}}" name="adminForm" id="adminForm" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="id" value="{{$items->id}}">
                <div class="Tabpanelmks">
                    <div class="row">
                        <div class="col-md-9">

                            <input type="hidden" name="store_id" value="{{ Auth::guard('admin')->user()->id }}">

                            <div class="form-group {{ $errors->first('brand_name', 'has-error') }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="control-label">Brand Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Enter Brand Name"
                                               name="brand_name" value="{{old('brand_name',$items->brand_name)}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->first('description', 'has-error') }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="control-label">Description</label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="textarea" name="description"
                                                  placeholder="Enter Description">{{old('description',$items->description)}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('print', 'has-error') }}">
                                        <div class="row">
                                            <label class="control-label">Print</label>

                                            <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Print of T-shirt"
                                                       name="print" value="{{old('print',$items->print)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('color', 'has-error') }}">
                                        <div class="row">
                                            <label class="control-label">Color</label>

                                            <div class="col-md-12">
                                                <input type="text" class="form-control"
                                                       placeholder="Enter Color of T-shirt" name="color"
                                                       value="{{old('color',$items->color)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('size', 'has-error') }}">
                                        <div class="row">
                                            <label class="control-label">Size</label>
                                            <div class="col-md-12">
                                                <select class="form-control select2" id="type" name="size"
                                                        value="{{old('size')}}">
                                                    <option value="{{$items->size}}">{{$items->size}}</option>
                                                    <option value="Smaller">Smaller</option>
                                                    <option value="Small">Small</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Large">Large</option>
                                                    <option value="Larger">Larger</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('cost', 'has-error') }}">
                                        <div class="row">
                                            <label class="control-label">Cost Per Item</label>

                                            <div class="col-md-12">
                                                <input type="text" class="form-control" placeholder="Enter Cost in NRs."
                                                       name="cost" value="{{old('cost',$items->cost)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">


                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="col-sm-12">

                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                <img src="http://placehold.it/150x150" alt="profile pic">
                                            </div>
                                            <input type="file" accept="image/*" name="photo"
                                                   src="{{asset('/upload/items/'.$items->photo)}}"
                                                   style="padding: 6px 0px;">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->first('status', 'has-error') }}">
                                <div class="row">
                                    <label class="control-label">Status</label>
                                    <div class="col-md-12">
                                        <select class="form-control select2" id="type" name="status">
                                            <option value="{{$items->status}}">
                                                @if($items->status == 1)
                                                    Stock
                                                @else
                                                    Out of Stock
                                                @endif
                                            </option>
                                            <option value="1">Stock</option>
                                            <option value="0">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('display', 'has-error') }}">
                                <div class="row">
                                    <label class="control-label">Display</label>
                                    <div class="col-md-12">
                                        <select class="form-control select2" id="type" name="display">
                                            <option value="{{$items->display}}">
                                                @if($items->display == 1)
                                                    Show
                                                @else
                                                    Don't Show
                                                @endif
                                            </option>
                                            <option value="1">Show</option>
                                            <option value="0">Don't Show</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="SaveArticles_right">
                                <button class="savearticle" type="submit">Save</button>
                            </div>


                        </div>

                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <div id="add_here" class="row">
                                    @if($photo)
                                        @foreach($photo as $p)
                                            <div class="col-sm-3">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"
                                                         style="width: 150px; height: 150px;">
                                                        <img src="{{asset('/upload/items/'.$p)}}" alt="profile pic">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class=" btn-secondary" style=" padding: 5px; width: 100%"
                                        id="add_img">Add Images
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyright © 2018. All rights reserved.</p>
            </div>
        </div>
    </div>

@endsection
@section('header-scripts')

@endsection
@section('footer-scripts')
    <script src="{{ asset('backendcp/tinymce/tinymce.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        tinymce.init({
            selector: '.textarea',
            height: 250,
            theme: 'modern',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | removeformat | fontselect fontsizeselect',
            plugins: 'textcolor print code preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help spellchecker autosave save emoticons paste colorpicker',
            valid_styles: {
                '*': 'font-size,font-family,color,text-decoration,text-align'
            },
            relative_urls: false,
            remove_script_host: true,
            document_base_url: "{{config('packagebridge.site_url')}}",
            convert_urls: true
        });

        $("#add_img").click(function () {
            $("#add_here").append(' <div class="col-sm-3">' +
                '<div class="fileinput fileinput-new" data-provides="fileinput">' +
                '<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">' +
                '<img src="http://placehold.it/150x150" alt="profile pic">' +
                '</div>' +
                '<input type="file" accept="image/*" name="image[]" style="padding: 6px 0px;">' +
                '</div>' +
                '</div>');
        });
    </script>
@endsection

@section('modals')


@endsection
