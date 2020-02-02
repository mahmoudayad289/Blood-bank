@include('flash::message')

<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name',old('name'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Age') !!}
    {!! Form::text('age',old('age'),['class' => 'form-control', 'required' => true]) !!}

</div>


<div class="form-group">
    {!! Form::label('Number of bags ') !!}
    {!! Form::text('number_of_bags',old('number_of_bags'),['class' => 'form-control', 'required' => true]) !!}

</div>

<div class="form-group">
    {!! Form::label('Hospital Name') !!}
    {!! Form::text('hospital_name',old('hospital_name'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Hospital Address') !!}
    {!! Form::text('hospital_address',old('hospital_address'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('latitude') !!}
    {!! Form::text('latitude',old('latitude'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Longitude') !!}
    {!! Form::text('longitude',old('longitude'),['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('Phone') !!}
    {!! Form::text('number',old('number'),['class' => 'form-control', 'required' => true]) !!}

</div>



<div class="form-group">
    {!! Form::label('Message') !!}
    {!! Form::text('message',old('message'),['class' => 'form-control']) !!}

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
