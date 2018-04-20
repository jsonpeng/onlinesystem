<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $informations->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', '题目:') !!}
    <p>{!! $informations->title !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', '类型:') !!}
    <p>{!! $informations->type !!}</p>
</div>

<!-- Analysis Field -->
<div class="form-group">
    {!! Form::label('analysis', '答案分析:') !!}
    <p>{!! $informations->analysis !!}</p>
</div>

<!-- Sort Field -->
<div class="form-group">
    {!! Form::label('sort', '排序:') !!}
    <p>{!! $informations->sort !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', '答案内容:') !!}
    <p>{!! $informations->content !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $informations->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $informations->updated_at !!}</p>
</div>

