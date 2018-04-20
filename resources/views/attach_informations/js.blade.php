@section('scripts')
<script type="text/javascript">
	//编辑的时候
	@if(!empty($attachInformations))
		updateSelectByInfoId({!! $attachInformations->info_id !!});
	@else 
	//创建的时候
		updateSelectByInfoId($('select[name=info_id] > option').eq(0).val());
	@endif

	//编辑和添加的时候都要有的判断逻辑 是我在选题的时候要做的判断
	$('select[name=info_id]').change(function(){
		updateSelectByInfoId($(this).val());
	});

	function updateSelectByInfoId(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            url: '/api/get_info_select/'+id+'/0',
            type: 'GET',
            success: function(data) {
            		if(data.state==0){
            			var select=data.message;
            			//先还原
            			var select_html;
            			var select_arr=['A','B','C','D','E','F'];
            			for(var s=0;s<select_arr.length;s++){
            				select_html += '<option value="'+select_arr[s]+'">'+select_arr[s]+'</option>';
            			}
            			$('select[name=type]').html(select_html);
            			$('select[name=type] > option').each(function(){
            					for(var i=select.length-1;i>=0;i--){
            							if($(this).val()==select[i]){
            								//$(this).attr('disabled','disabled');
            								$(this).remove();
            							}
            					}
            			});
            			console.log(data.message);
            		}
            }
        });
	}
</script>
@endsection