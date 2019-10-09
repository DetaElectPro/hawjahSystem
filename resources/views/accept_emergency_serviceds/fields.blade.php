<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Emergency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emergency_id', 'Emergency Id:') !!}
    {!! Form::text('emergency_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acceptEmergencyServiceds.index') !!}" class="btn btn-default">Cancel</a>
</div>
