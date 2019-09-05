@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Medical Specialty
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medicalSpecialty, ['route' => ['medicalSpecialties.update', $medicalSpecialty->id], 'method' => 'patch']) !!}

                        @include('medical_specialties.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection