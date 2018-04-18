<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', '题目:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '类型:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Analysis Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('analysis', '答案分析:') !!}
    {!! Form::textarea('analysis', null, ['class' => 'form-control']) !!}
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', 'Sort:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('informations.index') !!}" class="btn btn-default">Cancel</a>
</div>
