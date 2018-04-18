@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Informations
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informations, ['route' => ['informations.update', $informations->id], 'method' => 'patch']) !!}

                        @include('informations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection