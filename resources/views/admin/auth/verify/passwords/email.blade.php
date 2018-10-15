<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title Page-->
<title>NCS Dashboard</title>

<!-- Fontfaces CSS-->
<link href="{{asset('backendcp/css/font-face.css')}}" rel="stylesheet" media="all">
<link href="{{asset('backendcp/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('backendcp/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="{{asset('backendcp/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('backendcp/css/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="{{asset('backendcp/css/layout.css')}}" rel="stylesheet" media="all">
</head>

<body class="animsition loginbody">
<div class="page-wrapper">
        <div class="page-content-login">
            <div class="container">
                <div class="login-wrap">
                    <h3>{{config('app.name')}}</h3>
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('backendcp/images/ncsdashboard.png')}}" alt="ncsadmin">
                            </a>
                        </div>
                        <div class="login-form">
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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <ul>
                <li> {{ session('success') }}</li>
            </ul>
        </div>
    @endif
                            <form action="{{ route('admin.passwords.email') }}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <button class="au-btn au-btn--block signbtnmks m-b-20" type="submit">Admin Password</button>

                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script src="{{asset('backendcp/js/jquery-3.2.1.min.js')}}"></script> 
<script src="{{asset('backendcp/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('backendcp/js/wow.min.js')}}"></script> 
<script src="{{asset('backendcp/js/perfect-scrollbar.js')}}"></script> 
<script src="{{asset('backendcp/js/Chart.bundle.min.js')}}"></script> 
<script src="{{asset('backendcp/js/select2.min.js')}}"></script> 
<script src="{{asset('backendcp/js/main.js')}}"></script>
<script type="text/javascript">
    
      $(document).ready(function(){
          var str=location.href.toLowerCase();
        $('.navbar__list li a').each(function() {
                if (str.indexOf(this.href.toLowerCase()) > -1) {
                        $("li.highlight").removeClass("highlight");
                        $(this).parent().addClass("highlight"); 
                   }
                                            }); 
        $('li.highlight').parents().each(function(){
                                                  
                    if ($(this).is('li')){
                        $(this).addClass("highlight"); 
                        }                             
                                                  });
       })
</script>
</body>
</html>

