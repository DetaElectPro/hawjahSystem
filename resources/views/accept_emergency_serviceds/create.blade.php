@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Accept Emergency Serviced
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'acceptEmergencyServiceds.store']) !!}

                        @include('accept_emergency_serviceds.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
