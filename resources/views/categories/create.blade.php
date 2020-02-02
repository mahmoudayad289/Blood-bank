@extends('layouts.app')
@section('title','Create Categories')
@inject('model','App\Models\Category')
@section('content')

@section('small_title','Create Categories')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Categories </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('includes.errors')



            {!! Form::model($model, ['route' => 'categories.store']) !!}

            @include('categories.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>
@endsection


