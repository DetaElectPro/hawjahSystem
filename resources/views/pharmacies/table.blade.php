<div class="table-responsive">
    <table class="table" id="pharmacies-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pharmacies as $pharmacy)
            <tr>
                <td>{!! $pharmacy->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['pharmacies.destroy', $pharmacy->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pharmacies.show', [$pharmacy->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pharmacies.edit', [$pharmacy->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
