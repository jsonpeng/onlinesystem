<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $attachInformations->id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', '选项类型:') !!}
    <p>{!! $attachInformations->type !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', '选项内容:') !!}
    <p>{!! $attachInformations->content !!}</p>
</div>

<!-- Info Id Field -->
<div class="form-group">
    {!! Form::label('info_id', '题目Id:') !!}
    <p>{!! $attachInformations->info_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $attachInformations->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $attachInformations->updated_at !!}</p>
</div>

