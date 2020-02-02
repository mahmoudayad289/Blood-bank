@extends('front.layouts.app')
@section('title',' المقالات')

@section('content')

    <!--Breadcrumb-->
    <nav class="my-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسيه</a></li>
            <li class="breadcrumb-item"><a href="#">المقالات</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
        </ol>
    </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="artice-detailes pb-5">
        <div class="container">
            <div class="article-img m-auto">
                <img src="{{ $post->image_path }}" class="card-img-top" alt="article-img">
            </div>
            <div class="article-content my-4">
                <div class="article-header p-2 d-flex justify-content-between">
                    <h6>{{ $post->title }}</h6>
                    <a href="#"><i class="far fa-heart"></i></a>
                </div>
                <div class="article-details p-4">
                    <p class="my-md-4">{{ $post->body }}
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!--Articles section-->


    @inject('posts','App\Models\Post')
    <!--Articles section-->
    <section class="articles py-5">
        <div class="title">
            <div class="container">
                <h2><span class="py-1"> مقالات ذات صله</span> </h2>
            </div>
            <hr />
        </div>
        <div class="article-slide mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="arrow text-left">
                            <button type="button" class="prev-arrow px-2 py-1"><i
                                    class="fas fa-chevron-right"></i></button>
                            <button type="button" class="next-arrow px-2 py-1"><i
                                    class="fas fa-chevron-left"></i></button>
                        </div>
                    </div>
                </div>
                <div class="slick2">
                    @foreach($posts->get() as $p)
                        <div class="slick-cont">
                            <div class="card">
                                <img src="{{ asset($p->image_path) }}" class="card-img-top" alt="slick-img">
                                <button id="{{ $p->id }}" onclick="toggleFavourite(this)" class="heart-icon first-heart"><i class="far fa-heart"></i></button>
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
        </div>
        <!--End container-->
    </section>
    <!--End Articles-->


    @push('scripts')

        <script>

            function toggleFavourite(heart) {


                var post_id = heart.id;

                $.ajax({
                    url : '{{ url(route('toggle.favourite')) }}',
                    type : 'post',
                    data : {_token: "{{ csrf_token() }}", post_id:post_id},
                    success : function (data) {

                        console.log(data);
                        var currentClass = $(heart).attr('class');

                        if(currentClass.includes('first')) {

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
