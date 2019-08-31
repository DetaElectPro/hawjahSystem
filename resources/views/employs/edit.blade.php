@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employ
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employ, ['route' => ['employs.update', $employ->id], 'method' => 'patch']) !!}

                        @include('employs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection