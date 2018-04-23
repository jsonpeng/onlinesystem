<table class="table table-responsive" id="results-table">
    <thead>
        <tr>
            <th>答题用户</th>
            <th>答题结果（0-100）</th>
            <th>类型（科一/科四）</th>
            <th>答题次数(第几次)</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{!! $result->User->name !!}</td>
            <td>{!! $result->result !!}</td>
            <td>{!! $result->type !!}</td>
            <td>{!! $result->times !!}</td>
            <td>
                {!! Form::open(['route' => ['results.destroy', $result->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>