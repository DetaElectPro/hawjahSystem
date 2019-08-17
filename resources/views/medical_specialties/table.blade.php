<div class="table-responsive">
    <table class="table" id="medicalSpecialties-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Medical Fields</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicalSpecialties as $medicalSpecialty)
            <tr>
                <td>{!! $medicalSpecialty->name !!}</td>
            <td>{!! $medicalSpecialty->medical->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['medicalSpecialties.destroy', $medicalSpecialty->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('medicalSpecialties.show', [$medicalSpecialty->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('medicalSpecialties.edit', [$medicalSpecialty->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $medicalSpecialties->links() }}</div>

</div>
