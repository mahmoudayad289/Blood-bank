@extends('front.layouts.app')
@section('title',' اتصل بنا')

@section('content')


    <section class="Status-details">
        <div class="container">
            <div class="Status-info p-3 my-4">
                <div class="row">
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">الأسم</p>
                        <p class="status-item float-right p-3">{{ $donation->name }}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">فصيلة الدم</p>
                        <p class="status-item float-right p-3">{{ $donation->bloodType->name }}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">العمر</p>
                        <p class="status-item float-right p-3">{{ $donation->age }}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">عدد الأكياس المطلوبة</p>
                        <p class="status-item float-right p-3">{{ $donation->number_of_bags }}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">المشفى</p>
                        <p class="status-item float-right p-3"> {{ $donation->hospital_name }}</p>
                    </div>
                    <div class="col-md-6 clearfix">
                        <p class="status float-right p-3">رقم الجوال</p>
                        <p class="status-item float-right p-3">{{ $donation->number }}</p>
                    </div>
                </div><!--End row-->
                <div class="text-center my-3"><button type="button" class="btn bg px-5">التفاصيل</button></div>
                <div class="border p-3 my-3">
                    <p class="my-md-2"> {{ $donation->message }}
                    </p>
                </div>
                <!--Location on Google-->
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.244327965891!2d31.23191431511476!3d30.02984758188777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847340c2eaedf%3A0xec8a9d758ecabbf1!2z2YXYs9iq2LTZgdmJINin2KjZiCDYp9mE2LHZiti0INmE2YTYp9i32YHYp9mE!5e0!3m2!1sen!2seg!4v1573594740665!5m2!1sen!2seg" width="100%" height="330" frameborder="0" style="border:1px solid #ddd;" allowfullscreen=""></iframe>                </div>
            </div>
        </div><!--End Container-->
    </section><!--End Status section-->

@endsection
