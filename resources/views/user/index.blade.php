@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">用户列表</h1>

     
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('user.table')
            </div>
        </div>
        <div class="text-center"><?php echo $user->appends($input)->links() ?></div>
    </div>
@endsection

