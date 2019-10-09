<div class="table-responsive">
    <table class="table" id="acceptEmergencyServiceds-table">
        <thead>
            <tr>
                <th>Needing</th>
        <th>Image</th>
        <th>Price</th>
        <th>Emergency Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($acceptEmergencyServiceds as $acceptEmergencyServiced)
            <tr>
                <td>{!! $acceptEmergencyServiced->needing !!}</td>
            <td>{!! $acceptEmergencyServiced->image !!}</td>
            <td>{!! $acceptEmergencyServiced->price !!}</td>
            <td>{!! $acceptEmergencyServiced->emergency_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['acceptEmergencyServiceds.destroy', $acceptEmergencyServiced->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('acceptEmergencyServiceds.show', [$acceptEmergencyServiced->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('acceptEmergencyServiceds.edit', [$acceptEmergencyServiced->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
