@extends('admin.layouts.admin')

@section('title', 'Emergency Serviced')

@section('content')
    <div class="row">
        <a class="btn  btn-primary" href="{{ route('Emergency Serviced.create') }}"> New Emergency Serviced</a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name', 'name',['page' => $emergencyServiceds->currentPage()])</th>
                <th>Username</th>
                <th>@sortablelink('address', 'address',['page' => $emergencyServiceds->currentPage()])</th>
                <th>@sortablelink('price_per_day', 'price_per_day',['page' => $emergencyServiceds->currentPage()])</th>
                <th>@sortablelink('type', 'type',['page' => $emergencyServiceds->currentPage()])</th>
                <th>@sortablelink('available', 'available',['page' => $emergencyServiceds->currentPage()])</th>
                <th>@sortablelink('created_at', 'created at',['page' => $emergencyServiceds->currentPage()])</th>
                <th>@sortablelink('updated_at', 'updated at',['page' => $emergencyServiceds->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emergencyServiceds as $emergencyServiced)
                <tr>
                    <td>{{ $emergencyServiced->name }}</td>
                    <td>{{ $emergencyServiced->user()->name }}</td>
                    <td>{{ $emergencyServiced->address }}</td>
                    <td>{{ $emergencyServiced->price_per_day }}</td>
                    <td>{{ $emergencyServiced->type }}</td>
                    <td>{{ $emergencyServiced->available }}</td>
                    <td>{{ $emergencyServiced->created_at }}</td>
                    <td>{{ $emergencyServiced->updated_at }}</td>
                    <td>
                        {{-- <a class="btn btn-xs btn-primary" href="{{ route('medicalFields.show', [$emergencyServiced->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.medicalFieldsindex.show') }}">
                            <i class="fa fa-eye"></i>
                        </a> --}}
                        <a class="btn btn-xs btn-info" href="{{ route('emergencyServiceds.edit', [$emergencyServiced->id]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.emergencyServiceds.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('emergencyServiceds.destroy', [$emergencyServiced->id]) }}"
                           class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top"
                           data-title="{{ __('views.emergencyServiceds.delete') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $emergencyServiceds->links() }}
        </div>
    </div>
@endsection