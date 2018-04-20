@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            选项列表
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'attachInformations.store']) !!}

                        @include('attach_informations.fields',['select'=>$select])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@include('attach_informations.js')