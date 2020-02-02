@include('flash::message')

<div class="form-group">
    {!! Form::label('About App') !!}
    {!! Form::text('app_about',old('app_about'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Email') !!}
    {!! Form::email('email',old('email'),['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::label('Phone') !!}
    {!! Form::text('phone',old('phone'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Facebook') !!}
    {!! Form::text('f_link',old('f_link'),['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::label('Twitter') !!}
    {!! Form::text('t_link',old('t_link'),['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::label('Youtube') !!}
    {!! Form::text('y_link',old('y_link'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Instagrim') !!}
    {!! Form::text('insta_link',old('insta_link'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Whats Number') !!}
    {!! Form::text('whats_number',old('whats_number'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Google Plus') !!}
    {!! Form::text('goole_plus_link',old('goole_plus_link'),['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
</div>
