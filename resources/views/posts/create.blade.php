@extends('layouts.app')
@section('title','Create Post')
@inject('model','App\Models\Post')
@section('content')
@section('title_page','Dashboard')
@section('small_title','Create Post')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Posts Create</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">


            @include('includes.errors')



            {!! Form::model($model, ['route' => 'posts.store', 'files' => 'true']) !!}

            @include('posts.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>
@endsection


