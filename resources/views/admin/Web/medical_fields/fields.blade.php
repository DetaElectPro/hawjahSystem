
<div class="form-group col col-md-6 has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name">
    <span class="glyphicon glyphicon-earname form-control-feedback"></span>
    @if ($errors->has('name'))
        <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.Web.medicalFields.index') !!}" class="btn btn-default">Cancel</a>
</div>
