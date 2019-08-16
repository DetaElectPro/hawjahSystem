<div class="table-responsive">
    <table class="table" id="medicalFields-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicalFields as $medicalField)
            <tr>
                <td>{!! $medicalField->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['medicalFields.destroy', $medicalField->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('medicalFields.show', [$medicalField->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('medicalFields.edit', [$medicalField->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
