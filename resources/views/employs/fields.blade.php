<!-- Job Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_title', 'Job Title:') !!}
    {!! Form::text('job_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Graduation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('graduation_date', 'Graduation Date:') !!}
    {!! Form::date('graduation_date', null, ['class' => 'form-control','id'=>'graduation_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#graduation_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Birth Of Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_of_date', 'Birth Of Date:') !!}
    {!! Form::date('birth_of_date', null, ['class' => 'form-control','id'=>'birth_of_date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#birth_of_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Years Of Experience Field -->
<div class="form-group col-sm-6">
    {!! Form::label('years_of_experience', 'Years Of Experience:') !!}
    {!! Form::number('years_of_experience', null, ['class' => 'form-control']) !!}
</div>

<!-- Cv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cv', 'Cv:') !!}
    {!! Form::file('cv') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employs.index') !!}" class="btn btn-default">Cancel</a>
</div>
