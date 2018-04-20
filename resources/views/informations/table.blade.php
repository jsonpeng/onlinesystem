<table class="table table-responsive" id="informations-table">
    <thead>
        <tr>
        <th>题目</th>
        <th>类型</th>

        <th>排序</th>
  
        <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($informations as $informations)
        <?php $select=$informations->select()->orderBy('num','asc')->get();?>
        <tr>
            <td>{!! $informations->title !!}</td>
            <td>{!! $informations->Types !!}</td>
            <td>{!! $informations->sort !!}</td>
            <td>
                {!! Form::open(['route' => ['informations.destroy', $informations->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('informations.show', [$informations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('informations.edit', [$informations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @if(count($select))
           @foreach($select as $item) 
        
                <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{!! route('attachInformations.edit', [$item->id]) !!}" target="_blank">{!! $item->type !!}:{!! $item->content !!}</a></td></tr>
          
           @endforeach

                @if(!empty($informations->content))
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: red;">答案:</strong>{!! $informations->content !!} </td></tr>
                @endif

        @endif

    @endforeach
    </tbody>
</table>