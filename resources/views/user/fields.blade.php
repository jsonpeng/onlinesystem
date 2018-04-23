<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', '用户ID:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result', '答题分数(0-100分):') !!}
    {!! Form::number('result', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '类型（科一或科四）:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('results.index') !!}" class="btn btn-default">取消</a>
</div>
