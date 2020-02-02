@extends('front.layouts.app')
@section('title','حساب جديد')

@inject('model','App\Models\Client')
@section('content')
    <section class="signup text-center">
    <div class="container">
        <div class="py-4 mb-4">


            @include('flash::message')

            {!! Form::open(['route' => 'do.register', 'class' => 'w-75 m-auto']) !!}
                 @include('includes.errors')

               <div>
                    {!! Form::text('name',old('name'), ['class' => 'form-control my-3', 'placeholder' => 'الاسم' ]) !!}
                </div>
                <div>
                    {!! Form::email('email',old('email'), ['class' => 'form-control my-3', 'placeholder' => 'البريد الاليكترونى' ]) !!}
                </div>


                   {!! Form::text('phone',old('phone'), ['class' => 'form-control my-3', 'placeholder' => 'رقم الهاتف' ]) !!}


                <div class="input-group">
                {!! Form::date('data_of_birth',old('data_of_birth'), ['class' => 'form-control my-3', 'placeholder' => 'تاريخ الميلاد' ]) !!}
                <i class="far fa-calendar-alt"></i>
                </div>


            <div class="input-group mb-3">
                {!! Form::date('last_donation_data',old('last_donation_data'), ['class' => 'form-control my-3', 'placeholder' => 'اخر تاريخ تبرع' ]) !!}
                <i class="far fa-calendar-alt"></i>
            </div>

            <div class="input-group mb-3">
                @inject('blood','App\Models\BloodType')
                {!! Form::Select('blood_type_id', $blood->all()->pluck('name' , 'id') , null ,['class'=>'form-control custom-select']) !!}
                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="input-group mb-3">
                @inject('blood','App\Models\City')
                {!! Form::Select('city_id', $blood->all()->pluck('name' , 'id') , null ,['class'=>'form-control custom-select']) !!}
                <i class="fas fa-chevron-down"></i>
            </div>
            {!! Form::password('password', ['class' => 'form-control my-3', 'placeholder' => 'كلمة المرور' ]) !!}
            {!! Form::password('password_confirmed', ['class' => 'form-control my-3', 'placeholder' => 'تأكيد كلمة المرور' ]) !!}
            {!! Form::submit('ارسال', ['class' => 'btn btn-success py-2 w-50']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection
