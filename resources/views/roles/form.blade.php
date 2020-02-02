@include('flash::message')
@inject('perm','App\Permission')
<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Display Name') !!}
    {!! Form::text('display_name',old('display_name'),['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('Description') !!}
    {!! Form::textarea('description',old('description'),['class' => 'form-control']) !!}

</div>

<input id="select-all" type="checkbox"><label for='selectAll'>Select All</label>

<div class="form-group">
    <div class="row">
        @foreach($perm->all() as $permission)

            <div class="col-sm-3">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="permission_list[]" value="{{ $permission->id }}"

                             @if ( $model->hasPermission($permission->name) )

                                 checked

                             @endif

                        >{{ $permission->display_name }}
                    </label>
                </div>

            </div>

        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
</div>

@push('scripts')

    <script>
        $("#select-all").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

    </script>

<div class="form-group">
    <button class="btn btn-primary" type="submit"> Save </button>
</div>
@endpush
