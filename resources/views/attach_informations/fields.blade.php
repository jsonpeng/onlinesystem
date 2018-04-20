
<!-- Info Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('info_id', '请选择要添加的题目:') !!}
   
    <select name="info_id" class="form-control">
      @foreach($infos as $item)
        <option value="{{ $item->id }}" @if(!empty($attachInformations) && $attachInformations->info_id==$item->id) selected="selected" @endif>{!! $item->title !!}</option>
      @endforeach
    </select>
</div>


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', '类型:') !!}  
     @if(!empty($attachInformations)) 
     <label>
        (当前选:<strong style="color: red;">{!! $attachInformations->type !!}</strong>)</label>
     @endif
   	<select name='type' class='form-control' >
   		
   		@foreach($select as $item)
   			<option value="{!! $item !!}"  @if(!empty($attachInformations) && $attachInformations->type==$item) selected="selected" @endif><?php echo $item; ?></option>
   		@endforeach
   		
   	</select>

</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', '选项内容:') !!}
     @if(!empty($attachInformations)) 
     <label>
        (当前选:<strong style="color: red;">{!! $attachInformations->type !!}</strong>)</label>
     @endif
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('attachInformations.index') !!}" class="btn btn-default">取消</a>
</div>
