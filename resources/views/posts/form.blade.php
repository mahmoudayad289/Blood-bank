@include('flash::message')

<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('title',old('title'),['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('Message') !!}
    {!! Form::text('body',old('body'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Image') !!}
    {!! Form::file('image',old('image'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Select Category') !!}

    <select class="form-control" name="category_id" id="category_id">
        <option selected disabled> Add Category </option>
           @foreach(\App\Models\Category::all() as $c)

            <option value="{{ $c->id }}" {{ $c->id === $model->category_id ?  'selected' : ''  }}>
                {{ $c->name }}
            </option>

           @endforeach
    </select>

</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
</div>
