<table class="table table-responsive" id="recountInformations-table">
    <thead>
        <tr>
            <th>用户Id</th>
            <th>答题结果</th>
             <th>错误选项</th>
             <th>错误内容</th>
            <th>答题次数</th>
            <th>答题序号</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($recountInformations as $recountInformations)
        <tr>
            <td>{!! $recountInformations->user_id !!}</td>
            <td>{!! $recountInformations->result !!}</td>
            <td>{!! $recountInformations->mistake_type !!}</td>
            <td>{!! $recountInformations->mistake_conten !!}</td>
            <td>{!! $recountInformations->times !!}</td>
            <td>{!! $recountInformations->num !!}</td>
            <td>
                {!! Form::open(['route' => ['recountInformations.destroy', $recountInformations->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('recountInformations.show', [$recountInformations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('recountInformations.edit', [$recountInformations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>