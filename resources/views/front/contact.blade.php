@extends('front.layouts.app')
@section('title',' اتصل بنا')

@section('content')


    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="contact-details">
                        <h5 class="py-3 text-center">اتصل بنا</h5>
                        <div class="text-center py-3"><img src="imgs/logo.png" alt="img-logo"></div>
                        <div class="contact-mail p-3">
                            <p class="py-1">الجوال <span> : {{ $settings->phone }}</span></p>
                            <p class="py-1">فاكس <span> : 4123412</span></p>
                            <p class="py-1">البريد الاليكترونى <span> : {{ $settings->email }}/span></p>
                        </div>
                        <div class="contact-social text-center">
                            <h6 class="py-2"> تواصل معنا</h6>
                            <ul class="list-unstyled d-flex justify-content-center py-md-3">
                                <li class="ml-2"><a class="google" href="{{ $settings->goole_plus_link }}"><i class="fab fa-google-plus-square"></i></a></li>
                                <li class="mx-2"><a class="whatsapp" href="{{ $settings->whats_number }}"><i class="fab fa-whatsapp-square"></i></a></li>
                                <li class="mx-2"><a class="insta" href="{{ $settings->insta_link }}"><i class="fab fa-instagram"></i></a></li>
                                <li class="mx-2"><a class="youtube" href="{{ $settings->y_link }}"><i class="fab fa-youtube-square"></i></a></li>
                                <li class="mx-2"><a class="twitter" href="{{ $settings->t_link }}"><i class="fab fa-twitter-square"></i></li>
                                <li class="mr-2"><a class=" facebook" href="{{ $settings->f_link }}"><i class="fab fa-facebook-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="contact-form text-center">
                        <h5 class="py-3">تواصل معنا</h5>
                        {!! Form::open(['route' => 'contact.us']) !!}
                            <input type="name" name="name" class="form-control my-3" placeholder="الاسم">
                            <input type="email" name="email" class="form-control my-3" placeholder="البريد الاليكترونى">
                            <input type="text" name="phone" class="form-control my-3" placeholder="الجوال">
                            <input type="text" name="subject" class="form-control my-3" placeholder="عنوان الرسالة">
                            <textarea name="message" class="form-control my-4" rows="5" placeholder="نص الرسالة"></textarea>
                            <button type="submit" class="btn py-3 bg w-100 ">ارسال</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
