@extends('front.master')

@section('content')

    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{'home'}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{asset('front/imgs/logo.png')}}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{$contact->phone}}</li>
                                    <li><span>فاكس:</span>{{$contact->fax}} </li>
                                    <li><span>البريد الإلكترونى:</span> {{$contact->email}}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/001-facebook.svg')}}"></a>--}}
                                        <li class="mr-2"><a class=" facebook"  href="{{$settings->fb_link}}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/002-twitter.svg')}}"></a>--}}
                                        <li class="mx-2"><a class="twitter" href="{{$settings->tw_link}}" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/003-youtube.svg')}}"></a>--}}
                                        <li class="mx-2"><a class="youtube" href="{{$settings->youtube}}" target="_blank"><i class="fab fa-youtube-square"></i></a></li>

                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/004-instagram.svg')}}"></a>--}}
                                        <li class="mx-2"><a class="insta" href="{{$settings->insta_link}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/005-whatsapp.svg')}}"></a>--}}
                                        <li class="mx-2"><a class="whatsapp" href="{{$settings->whatsup_link}}" target="_blank"><i class="fab fa-whatsapp-square"></i></a></li>
                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{asset('front/imgs/006-google-plus.svg')}}"></a>--}}
                                        <li class="ml-2"><a class="google" href="{{$settings->google_link}}" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <form>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                                <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
