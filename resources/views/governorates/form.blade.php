@include('flash::message')


<div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit"> Save </button>
</div>
