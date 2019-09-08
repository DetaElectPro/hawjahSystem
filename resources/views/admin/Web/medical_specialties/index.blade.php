@extends('admin.layouts.admin')

@section('title', 'Medical Specialty')

@section('content')
    <div class="row">
            <a class="btn  btn-primary" href="{{ route('medicalSpecialties.create') }}"> New Specialties</a>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('name', 'name' ,['page' => $medicalSpecialties->currentPage()])</th>
                {{-- <th>Medical fields</th> --}}
                <th>@sortablelink('created_at','Created at',['page' => $medicalSpecialties->currentPage()])</th>
                <th>@sortablelink('updated_at','Updated at',['page' => $medicalSpecialties->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($medicalSpecialties as $medicalSpecialty)
                <tr>
                    <td>{{ $medicalSpecialty->name }}</td>
                    {{-- <td>{{ $medicalSpecialty->medical->pluck('name')->implode(',') }}</td> --}}
                    <td>{{ $medicalSpecialty->created_at }}</td>
                    <td>{{ $medicalSpecialty->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('medicalSpecialties.show', [$medicalSpecialty->id]) }}" data-toggle="tooltip" data-placement="top" data-title="show">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('medicalSpecialties.edit', [$medicalSpecialty->id]) }}" data-toggle="tooltip" data-placement="top" data-title="edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                            <a href="{{ route('medicalSpecialties.destroy', [$medicalSpecialty->id]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="delete">
                                <i class="fa fa-trash"></i>
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $medicalSpecialties->links() }}
        </div>
    </div>
@endsection