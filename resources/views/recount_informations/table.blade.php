<table class="table table-responsive" id="recountInformations-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Result</th>
        <th>Mistake Type</th>
        <th>Mistake Conten</th>
        <th>Times</th>
        <th>Num</th>
            <th colspan="3">Action</th>
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
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>