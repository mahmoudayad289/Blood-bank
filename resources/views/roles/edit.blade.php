@extends('layouts.app')
@section('title','Edit Roles')
@section('content')

@section('small_title','Edit Roles')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit Roles</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('includes.errors')

            {!! Form::model($model, ['route' => ['roles.update',$model->id ], 'method' => 'PUT' ]) !!}

                @include('roles.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>
@endsection


