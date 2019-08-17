<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<style>
    .select2-container .select2-selection--single {
        height: 34px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
    }

</style>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-group col col-md-6 has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
        <span class="glyphicon glyphicon-earname form-control-feedback"></span>
        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>


    <div class="container">
        <div class="row">
            <form class="col-md-4">
                <label>Select</label>
                <select class="form-control select2">
                    @foreach($field as $item)
                        <option>{{$item->name}}</option>
                        @endforeach

                </select>
            </form>
        </div>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('medicalSpecialties.index') !!}" class="btn btn-default">Cancel</a>
</div>


<script>
    $('.select2').select2();
</script>
