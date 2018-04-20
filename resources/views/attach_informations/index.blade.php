@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">选项列表</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('attachInformations.create') !!}">新添加</a>
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
                <form id="arrach_informatitons_search">
                    <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="delivery">类型</label>
                        <select name="type" class="form-control">
                                <option value="" @if (!array_key_exists('type', $input)) selected="selected" @endif>全部</option>

                                @foreach($select as $child)
                                    <option value="{{ $child }}" @if (array_key_exists('type', $input) && $input['type']==$child) selected="selected" @endif>{{ $child }}</option>
                                @endforeach
                          
                        </select>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="delivery">选项内容</label>
                       <input type="text" class="form-control" name="content" placeholder="选项内容" @if (array_key_exists('content', $input))value="{{$input['content']}}"@endif>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="delivery">题目</label>
                        <select name="info_id" class="form-control">
                                <option value="" @if (!array_key_exists('info_id', $input)) selected="selected" @endif>全部</option>

                                @foreach($infos as $child)
                                    <option value="{{ $child->id }}" @if (array_key_exists('info_id', $input) && $input['info_id']==$child->id) selected="selected" @endif>{{ $child->title }}</option>
                                @endforeach
                          
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
                    @include('attach_informations.table')
            </div>
        </div>
         <div class="text-center"><?php echo $attachInformations->appends($input)->links() ?></div>
    </div>
@endsection

