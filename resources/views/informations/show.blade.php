@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            题库列表
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('informations.show_fields')
                    <a href="{!! route('informations.index') !!}" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>
    </div>
@endsection
