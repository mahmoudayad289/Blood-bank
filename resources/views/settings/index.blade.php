@extends('layouts.app')
@section('title','Settings')
@section('content')
@section('small_title','Settings')
<section class="content">
    <!-- /.card-body -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Settings</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>

        <div class="card-body">

            @include('flash::message')


           <div class="table table-responsive">
               <table class="table">
                   <thead>
                       <th>#</th>
                       <th>About App</th>
                       <th>Phone</th>
                       <th>Email</th>
                       <th>Facebook</th>
                       <th>Twitter</th>
                       <th>Youtube</th>
                       <th>Instagram</th>
                       <th>what's</th>
                       <th>Google Plus</th>
                       <th>Edit</th>
                   </thead>
                   <tbody>

                   @if(count($records))

                       @foreach($records as $record)
                           <tr>
                               <td> {{ $loop->iteration }} </td>
                               <td> {{ $record->app_about }} </td>
                               <td> {{ $record->phone }} </td>
                               <td> {{ $record->email }} </td>
                               <td> {{ $record->f_link }} </td>
                               <td> {{ $record->t_link }} </td>
                               <td> {{ $record->y_link }} </td>
                               <td> {{ $record->insta_link }} </td>
                               <td> {{ $record->whats_number }} </td>
                               <td> {{ $record->goole_plus_link }} </td>
                               <td><a href="{{ route('settings.edit',$record->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a> </td>
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


