@extends('layout')
@section('title', 'View User')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User #{{$user->id}}</h6>
                <br>
                <a href="{{route('users.create')}}" class="btn-lg btn-primary">
                    Add <i class="fas fa-pen-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>E-mail</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Start date</th>
                        </tr>

                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->phone}}</th>
                        <th>{{$user->email}}</th>
                        <th><img height="100" width="200" src="{{$user->image}}"></th>
                        @if($user->role ==3)
                            <th>Provider</th>
                        @elseif($user->role ==4)
                            <th>Doctor</th>
                        @elseif($user->role ==5)
                            <th>Pharmacists</th>
                        @elseif($user->role ==6)
                            <th>Nurse</th>
                        @else
                            <th>Other</th>
                        @endif
                        <th>{{$user->created_at}}</th>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
