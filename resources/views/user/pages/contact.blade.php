@extends('user.layouts.template')

@section('content')
    <div class="container">
        <div class="title-bg">
            <div class="title">Contact</div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="page-content" >
                   Feel free to contact us. We are always there for your help.
                </p>
                <ul class="contact-widget">
                    <li class="fphone">
                        Phone &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :  &nbsp +977 9847001111 <br>
                        Viber &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :  &nbsp +977 9847001111 <br>
                        Whatsapp &nbsp  &nbsp &nbsp : &nbsp +977 9847001111
                    </li>
                    <li class="fmobile"> &nbsp &nbsp Contact Us with <a href="https://www.facebook.com/messages/" target="_blank"> Messenger</a> </li>
                    <li class="fmail lastone">nirdoshaurora54@gmail.com<br/>mbhusal108@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="qc" style="max-width: 100%!important;">
                    <form role="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name<span>*</span></label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="width: 100%">
                                    <label for="text">Messages<span>*</span></label>
                                    <textarea class="form-control" id="text"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default btn-red btn-sm">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

        <div class="title-bg">
            <div class="title">Map</div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594584.577061946!2d81.88039934826654!3d28.378902751359405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995e8c77d2e68cf%3A0x34a29abcd0cc86de!2sNepal!5e0!3m2!1sen!2snp!4v1536659767033" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="spacer"></div>

    </div>
@endsection