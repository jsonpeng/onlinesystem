@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">题库列表</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('informations.create') !!}">新添加</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
              <!--查询搜索框-->
         <div class="box box-default box-solid mb10-xs @if(!$tools) collapsed-box @endif" style="margin-top: 15px;">
            <div class="box-header with-border">
              <h3 class="box-title">查询</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-{!! !$tools?'plus':'minus' !!}"></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="projects_search">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="delivery">题目名称</label>
                       <input type="text" class="form-control" name="title" placeholder="题目名称" @if (array_key_exists('title', $input))value="{{$input['title']}}"@endif>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="delivery">题目类型</label>
                        <select name="type" class="form-control">
                                <option value="" @if (!array_key_exists('type', $input)) selected="selected" @endif>全部</option>
                                <option value="0" @if (array_key_exists('type', $input) && $input['type']=='0') selected="selected" @endif>科目一</option>
                                <option value="1" @if (array_key_exists('type', $input) && $input['type']=='1') selected="selected" @endif>科目四</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-1 col-md-1 hidden-xs hidden-sm" style="padding-top: 25px;">
                        <button type="submit" class="btn btn-primary pull-right "">查询</button>
                    </div>
                    <div class="form-group col-xs-6 visible-xs visible-sm" >
                        <button type="submit" class="btn btn-primary pull-left "">查询</button>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!--/查询搜索框-->
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('informations.table')
            </div>
        </div>
        <div class="text-center"><?php echo $informations->appends($input)->links() ?></div>
    </div>
@endsection

