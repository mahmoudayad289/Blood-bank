@include('flash::message')

<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name',old('name'),['class' => 'form-control', 'required' => true]) !!}

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
    {!! Form::label('Password') !!}
    {!! Form::password('password',['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::label('Date Of Birth') !!}
    {!! Form::date('data_of_birth',old('data_of_birth'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Last Donation Date') !!}
    {!! Form::date('last_donation_data',old('last_donation_data'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Select City') !!}

    <select class="form-control" name="city_id" id="city_id">
        <option selected disabled> Add Category </option>
           @foreach(\App\Models\City::all() as $c)

            <option value="{{ $c->id }}" {{ $c->id === $model->city_id ?  'selected' : ''  }}>
                {{ $c->name }}
            </option>

           @endforeach
    </select>

</div>

<div class="form-group">
    {!! Form::label('Select Blood Type') !!}

    <select class="form-control" name="blood_type_id" id="blood_type_id">
        <option selected disabled> Add Category </option>
        @foreach(\App\Models\BloodType::all() as $c)

            <option value="{{ $c->id }}" {{ $c->id === $model->blood_type_id ?  'selected' : ''  }}>
                {{ $c->name }}
            </option>

        @endforeach
    </select>

</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
</div>
