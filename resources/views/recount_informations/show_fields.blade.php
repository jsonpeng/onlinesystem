<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $recountInformations->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', '用户Id:') !!}
    <p>{!! $recountInformations->user_id !!}</p>
</div>

<!-- Result Field -->
<div class="form-group">
    {!! Form::label('result', '答题结果(0对，1错):') !!}
    <p>{!! $recountInformations->result !!}</p>
</div>

<!-- Mistake Type Field -->
<div class="form-group">
    {!! Form::label('mistake_type', '错误选项:') !!}
    <p>{!! $recountInformations->mistake_type !!}</p>
</div>

<!-- Mistake Conten Field -->
<div class="form-group">
    {!! Form::label('mistake_conten', '错误内容:') !!}
    <p>{!! $recountInformations->mistake_conten !!}</p>
</div>

<!-- Times Field -->
<div class="form-group">
    {!! Form::label('times', '答题次数:') !!}
    <p>{!! $recountInformations->times !!}</p>
</div>

<!-- Num Field -->
<div class="form-group">
    {!! Form::label('num', '答题序号:') !!}
    <p>{!! $recountInformations->num !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', '创建时间:') !!}
    <p>{!! $recountInformations->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', '更新时间:') !!}
    <p>{!! $recountInformations->updated_at !!}</p>
</div>

