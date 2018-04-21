<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', '用户ID:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result', '答题结果:') !!}
    {!! Form::number('result', null, ['class' => 'form-control']) !!}
</div>

<!-- Mistake Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mistake_id', '错误选项:') !!}
    {!! Form::text('mistake_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Times Field -->
<div class="form-group col-sm-6">
    {!! Form::label('times', '答题次数:') !!}
    {!! Form::number('times', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('select_id', '答题序号:') !!}
    {!! Form::number('select_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('recountInformations.index') !!}" class="btn btn-default">取消</a>
</div>
