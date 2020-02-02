@extends('layouts.app')
@section('title','Edit Post')
@section('content')

@section('small_title','Edit Post')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit Post</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('includes.errors')

            {!! Form::model($model, ['route' => ['posts.update',$model->id ], 'method' => 'PUT', 'files' => 'true' ]) !!}

                @include('posts.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>

@endsection


