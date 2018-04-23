<table class="table table-responsive" id="childs-table">
    <thead>
        <tr>
            <th>用户ID</th>
            <th>用户名称</th>
            <th>用户密码</th>
            <th>用户邮箱</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user as $child)
        <tr>
            <td>{!! $child->id !!}</td>
            <td>{!! $child->name !!}</td>
            <td>{!! $child->password !!}</td>
            <td>{!! $child->email !!}</td>
            <td>
        <!--         {!! Form::open(['route' => ['user.destroy', $child->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定吗?')"]) !!}
                </div>
                {!! Form::close() !!} -->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>