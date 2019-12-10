@extends('admin.layouts.admin')

@section('title', 'Ambulance Serviced')

@section('content')
    <div class="row">
        <a class="btn  btn-primary" href="{{ route('ambulances.create') }}"> New Ambulance Serviced</a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name', 'Title',['page' => $ambulances->currentPage()])</th>
                <th>@sortablelink('address', 'address',['page' => $ambulances->currentPage()])</th>
                <th>@sortablelink('created_at', 'created at',['page' => $ambulances->currentPage()])</th>
                <th>@sortablelink('updated_at', 'updated at',['page' => $ambulances->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ambulances as $ambulance)
                <tr>
                    <td>{{ $ambulance->title }}</td>
                    <td>{{ $ambulance->address }}</td>
                    <td>{{ $ambulance->created_at }}</td>
                    <td>{{ $ambulance->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary"
                           href="{{ route('ambulances.show', [$ambulance->id]) }}" data-toggle="tooltip"
                           data-placement="top" data-title="{{ __('views.ambulances.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info"
                           href="{{ route('ambulances.edit', [$ambulance->id]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.ambulances.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('ambulances.destroy', [$ambulance->id]) }}"
                           class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.ambulances.delete') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $ambulances->links() }}
        </div>
    </div>
@endsection