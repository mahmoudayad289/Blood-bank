@extends('front.layouts.app')
@inject('model','App\Models\DonationRequest')
@inject('city','App\Models\City')
@inject('blood_type','App\Models\BloodType')

@section('content')

    <!--Breadcrumb-->
    <nav class="my-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
            <li class="breadcrumb-item"><a href="#">المقالات</a></li>
        </ol>
    </nav><!--End Breadcrumb-->
    </div><!--End container-->

    <section id="sign-up">
        <div class="container">
            <img src="{{asset('imgs/logo.png')}}" alt="">
            {!! Form::model($model,["route" => 'donation.create' ]) !!}

            @include('includes.errors')
            @include('flash::message')

            <section class="signup text-center">
                <div class="container">
                    <div class="py-4 mb-4">
                        <form action="" class="w-75 m-auto">
                            <div>
                                <input type="text" name="name" class="form-control my-3" placeholder="الاسم">
                            </div>
                            <div>
                                <input type="text" name="age" class="form-control my-3" placeholder="العمر">
                            </div>

                            <div>
                                <input type="text" name="number_of_bags" class="form-control my-3" placeholder="عدد الاكياس">
                            </div>

                            <div>
                                <input type="text" name="hospital_name" class="form-control my-3" placeholder=" اسم المستشفه">
                            </div>

                            <div>
                                <input type="text" name="hospital_address" class="form-control my-3" placeholder=" عنوان المستشفه">
                            </div>


                            <div>
                                <input type="text" name="number" class="form-control my-3" placeholder=" الرقم">
                            </div>


                            <div>
                                <textarea name="message" class="form-control my-3">
                                </textarea>
                            </div>

                            <div class="input-group mb-3">
                                {!! Form::select('city_id',$city->all()->pluck('name','id') , null, ['class' => 'form-control custom-select', 'placeholder' => 'select city']) !!}

                                <i class="fas fa-chevron-down"></i>
                            </div>

                            <div class="input-group mb-3">
                                {!! Form::select('blood_type_id',$blood_type->all()->pluck('name','id') , null, ['class' => 'form-control custom-select', 'placeholder' => 'select city']) !!}

                                <i class="fas fa-chevron-down"></i>
                            </div>




                            <br>

                            <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
                        </form>
                    </div>
                </div>
            </section>
            {!! Form::close() !!}

        </div>
    </section>
    <!--End Articles-->

    @push('scripts')

        <script>
            function toggleFavourite(heart) {

                var post_id = heart.id;
                // console.log(post_id);

                $.ajax({

                    url  : '{{ route('toggle.favourite') }}',
                    type : 'get',
                    data : { _token:"{{ csrf_token() }}"  , post_id:post_id },
                    success: function (data) {

                        console.log(data);

                        var currentClass=$(heart).attr('class');

                        if (currentClass.includes('first')) {

                            $(heart).removeClass('first-heart').addClass('second-heart');

                        } else {

                            $(heart).removeClass('second-heart').addClass('first-heart');
                        }
                    }
                });
            }
        </script>

    @endpush

@endsection
