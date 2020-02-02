@extends('layouts.app')
@section('title','Roles')
@section('content')
@section('small_title','Roles')
<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            <!-- Start table   -->
            <a href="{{ route('roles.create') }}" class="btn btn-primary" style="margin-bottom: 20px;"> <i class="fa fa-plus"></i> Create New  </a>

            @include('flash::message')


            <div class="table table-responsive">
               <table class="table">
                   <thead>
                       <th>#</th>
                       <th>Name</th>
                       <th>Display Name</th>
                       <th>Description</th>
                       <th>Edit</th>
                       <th>Delete</th>
                   </thead>
                   <tbody>

                   @if(count($records))

                       @foreach($records as $record)
                           <tr>
                               <td> {{ $loop->iteration }} </td>
                               <td> {{ $record->name }} </td>
                               <td> {{ $record->display_name }} </td>
                               <td> {{ $record->description }} </td>
                               <td><a href="{{ route('roles.edit',$record->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a> </td>
                               <td>


                                   {!! Form::open(['route' =>  ['roles.destroy' , $record->id], 'method' => 'DELETE']) !!}

                                   <div class="form-group">
                                       <button class="btn btn-danger btn-sm" type="submit"> <i class="fa fa-trash"></i> Delete</button>
                                   </div>

                                   {!! Form::close() !!}
                               </td>
                           </tr>
                       @endforeach

                       @else

                       <div class="alert alert-success">
                           <p> Not Data</p>
                       </div>

                       @endif
                   </tbody>

               </table>
           </div>

            <!-- End table   -->
        </div>
    </div>

    <!-- /.card-body -->
</section>
@endsection


