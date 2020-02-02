@extends('front.layouts.app')
@section('title','المقالات')

@section('content')

    <!--Breadcrumb-->
    <nav class="my-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">الرئيسيه</a></li>
            <li class="breadcrumb-item"><a href="#">المقالات</a></li>
        </ol>
    </nav><!--End Breadcrumb-->
    </div><!--End container-->

    <!--Articles section-->
    <section class="articles py-5">
        <div class="title">
            <div class="container">
                <h2><span class="py-1"> مقالات </span> </h2>
            </div>
            <hr />
        </div>
        <div class="article-slide mt-3">
            <div class="container">
                <div class="row">
                    @foreach($posts as $p)
                    <div class="col-sm-4">
                            <div class="card" style="margin: 10px;">
                                <img src="{{ asset($p->image_path) }}" class="card-img-top" alt="slick-img">
                                <button id="{{ $p->id }}" onclick="toggleFavourite(this)" class="heart-icon" {{ $p->isFavourite ? 'second-heart' : 'first-heart' }}><i class="far fa-heart"></i></button>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p->title }}</h5>
                                    <p>{{ $p->body }}</p>
                                    <div class="text-center"><a href="{{ route('single.post', $p->id) }}" class="btn bg px-5">التفاصيل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        <!--End container-->
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
