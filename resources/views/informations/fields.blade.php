<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', '题目:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '类型:') !!}
    <select name="type" class="form-control">

        <option value="0"  @if(!empty($informations) && $informations->type=='0') selected="selected" @endif>科目一</option>
        <option value="1"  @if(!empty($informations) && $informations->type=='1') selected="selected" @endif>科目四</option>
    </select>
   
</div>

<!-- Analysis Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('analysis', '答案分析:') !!}
    {!! Form::textarea('analysis', null, ['class' => 'form-control intro']) !!}
</div>

<!-- Sort Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sort', '排序:') !!}
    {!! Form::number('sort', null, ['class' => 'form-control']) !!}
</div>

<!-- 只有在编辑的时候可以选答案-->

@if(!empty($informations))
<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '答案内容:') !!}
    <?php $select=$informations->select()->orderBy('num','asc')->get(); ?>
    @if(count($select))
        <select name="content" class='form-control'>
            @foreach($select as $child)
                <option value="<?php echo $child->content;?>" @if($informations->content==$child->content) selected="selected" @endif>{{ $child->type }}.{{ $child->content }}</option>
            @endforeach
        </select>
    @else
        <a href="{!! route('attachInformations.create') !!}" target="_blank">添加答案</a>
    @endif
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('informations.index') !!}" class="btn btn-default">取消</a>
</div>
