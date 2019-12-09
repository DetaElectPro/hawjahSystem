@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ambulance
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ambulance, ['route' => ['ambulances.update', $ambulance->id], 'method' => 'patch']) !!}

                        @include('ambulances.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection