@extends('layouts.app')
@section('title','Create Governoreate')
@inject('model','App\Models\Governorat')
@section('content')
@section('title_page','Dashboard')
@section('small_title','Create Governorates')

<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Governorates Create</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('includes.errors')



            {!! Form::model($model, ['route' => 'governorates.store']) !!}

            @include('governorates.form')

            {!! Form::close() !!}

        </div>
    </div>

    <!-- /.card-body -->
</section>
@endsection


