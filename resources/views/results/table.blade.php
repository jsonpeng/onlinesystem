<table class="table table-responsive" id="results-table">
    <thead>
        <tr>
            <th>用户Id</th>
            <th>答题结果（0-100）</th>
            <th>类型（科一/科四）</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{!! $result->user_id !!}</td>
            <td>{!! $result->result !!}</td>
            <td>{!! $result->type !!}</td>
            <td>
                {!! Form::open(['route' => ['results.destroy', $result->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('results.show', [$result->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('results.edit', [$result->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>