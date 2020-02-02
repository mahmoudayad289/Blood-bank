@extends('front.layouts.app')
@section('title','طلبات التبرع ')

@section('content')

    <!--Donation-->
    <section class="donation">
        <h2 class="text-center"><span class="py-1">طلبات التبرع</span> </h2>
        <hr />
        <div class="donation-request py-5">
            <div class="container">
                {!! Form::open(['method' => 'get']) !!}
                <div class="row">

                    <div class="col-md-5">

                        @inject('blood_type','App\Models\BloodType')
                        {!! Form::select('blood_type_id', $blood_type->pluck('name','id')->toArray() , request()->input('blood_type_id'), [
                        'class' => 'custom-select mx-md-3 mx-sm-1',
                        'placeholder' => 'Select Blood Type',
                        ]) !!}

                    </div>

                    <div class="col-md-5">

                        @inject('city','App\Models\City')
                        {!! Form::select('city_id', $city->pluck('name','id')->toArray() , request()->input('city_id'), [
                        'class' => 'custom-select mx-md-3 mx-sm-1',
                        'placeholder' => 'Select City',
                        ]) !!}

                    </div>

                    <div class="col-md-2">
                        <i class="fas fa-search"></i>
                    </div>

                    {!! Form::close() !!}

                </div>
                <!--End selection-->
                <div id="donations" >
                    @foreach($donations as $donation)
                        <div class="req-item my-3">
                            <div class="row">
                                <div class="col-md-9 col-sm-12 clearfix">
                                    <div class="blood-type m-1 float-right">
                                        <h3>{{ $donation->bloodType->name }}</h3>
                                    </div>
                                    <div class="mx-3 float-right pt-md-2">
                                        <p>
                                            Name :    {{ $donation->name }}
                                        </p>
                                        <p>
                                            Hospital :    {{ $donation->hospital_name }}
                                        </p>
                                        <p>
                                            City :    {{ $donation->city->name }}

                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 text-center p-sm-3 pt-md-5">
                                    <a href="{{ route('donation.details', $donation->id) }}" class="btn btn-light px-5 py-3">التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!--End last req-item-->
            </div>
            <!--End container-->
        </div>
        <!--End Donation-request-->


        <nav aria-label="Page navigation example">
            {{ $donations->links() }}
    </section>
    <!--End Donation-->

@endsection
