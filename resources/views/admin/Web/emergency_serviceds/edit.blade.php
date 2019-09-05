@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Emergency Serviced
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($emergencyServiced, ['route' => ['emergencyServiceds.update', $emergencyServiced->id], 'method' => 'patch']) !!}

                        @include('emergency_serviceds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection