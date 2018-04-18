<table class="table table-responsive" id="attachInformations-table">
    <thead>
        <tr>
            <th>Type</th>
        <th>Content</th>
        <th>Info Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attachInformations as $attachInformations)
        <tr>
            <td>{!! $attachInformations->type !!}</td>
            <td>{!! $attachInformations->content !!}</td>
            <td>{!! $attachInformations->info_id !!}</td>
            <td>
                {!! Form::open(['route' => ['attachInformations.destroy', $attachInformations->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('attachInformations.show', [$attachInformations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('attachInformations.edit', [$attachInformations->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>