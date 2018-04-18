<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result', 'Result:') !!}
    {!! Form::number('result', null, ['class' => 'form-control']) !!}
</div>

<!-- Mistake Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mistake_type', 'Mistake Type:') !!}
    {!! Form::text('mistake_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Mistake Conten Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mistake_conten', 'Mistake Conten:') !!}
    {!! Form::textarea('mistake_conten', null, ['class' => 'form-control']) !!}
</div>

<!-- Times Field -->
<div class="form-group col-sm-6">
    {!! Form::label('times', 'Times:') !!}
    {!! Form::number('times', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num', 'Num:') !!}
    {!! Form::number('num', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('recountInformations.index') !!}" class="btn btn-default">Cancel</a>
</div>
