@extends('admin.layouts.admin')

@section('title', 'Medical Fields')

@section('content')
    <div class="row">
        <a class="btn button" href="{{ router('medicalFields.create') }}"
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name',  'name',['page' => $medicalFields->currentPage()])</th>
                <th>@sortablelink('created_at', 'created at',['page' => $medicalFields->currentPage()])</th>
                <th>@sortablelink('updated_at', 'updated at',['page' => $medicalFields->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($medicalFields as $medicalField)
                <tr>
                    <td>{{ $medicalField->name }}</td>
                    <td>{{ $medicalField->created_at }}</td>
                    <td>{{ $medicalField->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('medicalFields.show', [$medicalField->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.medicalFieldsindex.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('medicalFields.edit', [$medicalField->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.medicalFieldsindex.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                            <a href="{{ route('medicalFields.destroy', [$medicalField->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.medicalFieldsindex.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $medicalFields->links() }}
        </div>
    </div>
@endsection