@include('flash::message')


<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"> Save </button>
</div>
