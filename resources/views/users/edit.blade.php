@extends('layout')
@section('title', 'Add user')
@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="p-5 container">
                    <form class="user" method="post" enctype='multipart/form-data'
                          action="{{ url('admin/users')  }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name" required name="name" value="{{$user->name}}" placeholder="name">
                            </div>
                            <div class="col-sm-6">
                                <label for="image">Image</label>
                                <input type="file" name="image"
                                       class="form-control" value="{{$user->image}}" required id="image">
                                <img height="40" width="40" src="{{$user->image}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text"
                                   class="form-control"
                                   id="phone" required value="{{$user->phone}}" name="phone" placeholder="phone">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text"
                                   class="form-control"
                                   id="email" required value="@if($user->email) {{$user->email}}@endif" name="email"
                                   placeholder="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                   class="form-control"
                                   id="password" required name="password" placeholder="password">
                        </div>

                        <div class="form-group">
                            <label for="accountType">Account Type</label>
                            <select class="form-control" id="accountType">
                                <option value="4">Doctor</option>
                                <option value="3">Provider</option>
                                <option value="5">Pharmacists</option>
                                <option value="6">Nurse</option>
                                <option value="7">Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
