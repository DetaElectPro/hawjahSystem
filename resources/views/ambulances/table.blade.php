<div class="table-responsive">
    <table class="table" id="ambulances-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Address</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ambulances as $ambulance)
            <tr>
                <td>{{ $ambulance->title }}</td>
            <td>{{ $ambulance->address }}</td>
            <td>{{ $ambulance->longitude }}</td>
            <td>{{ $ambulance->latitude }}</td>
            <td>{{ $ambulance->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['ambulances.destroy', $ambulance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ambulances.show', [$ambulance->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('ambulances.edit', [$ambulance->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
