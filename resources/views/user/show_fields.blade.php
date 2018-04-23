<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $result->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', '用户Id:') !!}
    <p>{!! $result->user_id !!}</p>
</div>

<!-- Result Field -->
<div class="form-group">
    {!! Form::label('result', '答题结果(0-100分):') !!}
    <p>{!! $result->result !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', '类型（科目一或科目四）:') !!}
    <p>{!! $result->type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $result->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $result->updated_at !!}</p>
</div>

