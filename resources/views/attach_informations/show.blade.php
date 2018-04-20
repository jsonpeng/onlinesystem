@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            选项列表
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('attach_informations.show_fields')
                    <a href="{!! route('attachInformations.index') !!}" class="btn btn-default">返回</a>
                </div>
            </div>
        </div>
    </div>
@endsection
