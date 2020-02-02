@extends('layouts.app')
@section('title','Edit Donations')
@section('content')

@section('small_title','Edit Donation')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit donations</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('includes.errors')

            {!! Form::model($model, ['route' => ['donations.update',$model->id ], 'method' => 'PUT' ]) !!}

                @include('donations.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>

@endsection


