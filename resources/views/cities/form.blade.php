@include('flash::message')

<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Select Governorate') !!}

    <select class="form-control" name="governorate_id" id="governorate_id">
        <option selected disabled> Add Governorate </option>
       @foreach(\App\Models\Governorat::all() as $c)
            <option value="{{ $c->id }}" {{ $c->id === $model->governorate_id ?  'selected' : ''  }}>
                {{ $c->name }}
            </option>
           @endforeach
    </select>

</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit"> Save </button>
</div>
