@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="m-b-md">
        Sample users:<br/>
        Admin user: admin.laravel@detaelectronic.com / password: detaelectronic<br/>
        Demo user: demo.laravel@detaelectronic.com / password: demo
    </div>

    
@endsection