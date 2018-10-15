@extends('owner.template')
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
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('owner.list.owners')}}">Owner</a></li>
    <li class="breadcrumb-item active">Pages</li>
</ol>

    <div class="row">
        <div class="col-md-12">
            <form  action="{{route('owner.update.owners')}}"  name="adminForm" id="adminForm" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="Tabpanelmks">
                  <div class="row">
                    <div class="col-md-9">

                      <input type="hidden" name="id" value="{{$owner->id}}">

                      <div class="form-group {{ $errors->first('name', 'has-error') }}">
                        <div class="row">
                          <div class="col-md-2">
                            <label class="control-label">Owner Name</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter Owner Name" name="name" value="{{old('name',$owner->Name)}}">
                          </div>
                        </div>
                      </div>


                          <div class="form-group {{ $errors->first('citizionship', 'has-error') }}">
                            <div class="row">
                              <div class="col-md-2">
                                <label class="control-label">Citizionship</label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Enter Citizionship Number" name="citizionship" value="{{old('citizionship',$owner->citizionship)}}">
                              </div>
                            </div>
                          </div>


                            <div class="form-group {{ $errors->first('contact', 'has-error') }}">
                              <div class="row">
                                <div class="col-md-2">
                                  <label class="control-label">Contact </label>
                                </div>
                                <div class="col-md-10">
                                  <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" value="{{old('contact',$owner->contact)}}">
                                </div>
                              </div>
                            </div>




                              <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <div class="row">
                                  <div class="col-md-2">
                                    <label class="control-label">E-mail</label>
                                  </div>
                                  <div class="col-md-10">
                                    <input type="email" class="form-control" placeholder="Enter E-mail Address" name="email" value="{{old('email',$owner->email)}}" readonly>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group {{ $errors->first('profession', 'has-error') }}">
                                 <div class="row">
                                   <div class="col-md-2">
                                     <label class="control-label">Profession</label>
                                   </div>

                                   <div class="col-md-10">
                                     <select class="form-control select2" id="type" name="profession">

                                       <option value="{{old('profession',$owner->profession)}}">Activate</option>
                                       <option value="">--Select--</option>
                                       <option value="Activate">Activate</option>
                                       <option value="Deactivate">Deactivate</option>
                                     </select>
                                   </div>
                                 </div>
                             </div>


                    <!--  <div class="form-group {{ $errors->first('type', 'has-error') }}">
                         <div class="row">
                             <div class="col-md-2">
                                 <label class="control-label">select</label>
                             </div>
                             <div class="col-md-10">
                                <select class="form-control select2" id="type" name="type">
                                  <option value="slider">Slider</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="form-group {{ $errors->first('type', 'has-error') }}">
                       <div class="row">
                           <div class="col-md-2">
                               <label class="control-label">Description</label>
                           </div>
                           <div class="col-md-10">
                              <textarea class="textarea" name="description"></textarea>
                           </div>
                       </div>
                     </div>-->

                   </div>
                   <div class="col-md-3">

                    <div class="form-group">
                      <label for="image">Image</label>
                        <div class="col-sm-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                  <img src="http://placehold.it/150x150" alt="profile pic">
                              </div>
                              <input type="file" accept="image/*" name="image" style="padding: 6px 0px;">

                            </div>
                          </div>
                        </div>


                        <div class="SaveArticles_right">
                                <button class="savearticle" type="submit">Update</button>
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
    selector:'.textarea',
    height: 250,
    theme: 'modern',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | removeformat | fontselect fontsizeselect',
    plugins: 'textcolor print code preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help spellchecker autosave save emoticons paste colorpicker',
    valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
    },
    relative_urls : false,
    remove_script_host : true,
    document_base_url : "{{config('packagebridge.site_url')}}",
    convert_urls : true
});
</script>
@endsection

@section('modals')


@endsection
