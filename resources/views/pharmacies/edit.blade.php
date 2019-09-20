@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pharmacy
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pharmacy, ['route' => ['pharmacies.update', $pharmacy->id], 'method' => 'patch']) !!}

                        @include('pharmacies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection