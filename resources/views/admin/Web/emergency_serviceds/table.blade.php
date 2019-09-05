<div class="table-responsive">
    <table class="table" id="emergencyServiceds-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Address</th>
        <th>Price Per Day</th>
        <th>Type</th>
        <th>Available Bed</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emergencyServiceds as $emergencyServiced)
            <tr>
                <td>{!! $emergencyServiced->name !!}</td>
            <td>{!! $emergencyServiced->address !!}</td>
            <td>{!! $emergencyServiced->price_per_day !!}</td>
            <td>{!! $emergencyServiced->type !!}</td>
            <td>{!! $emergencyServiced->available !!}</td>
            <td>{!! $emergencyServiced->user_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['emergencyServiceds.destroy', $emergencyServiced->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('emergencyServiceds.show', [$emergencyServiced->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('emergencyServiceds.edit', [$emergencyServiced->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
