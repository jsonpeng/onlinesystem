<table class="table table-responsive" id="informations-table">
    <thead>
        <tr>
        <th>Title</th>
        <th>Type</th>
        <th>Analysis</th>
        <th>Sort</th>
        <th>Content</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($informations as $informations)
        <tr>
            <td>{!! $informations->title !!}</td>
            <td>{!! $informations->type !!}</td>
            <td>{!! $informations->analysis !!}</td>
            <td>{!! $informations->sort !!}</td>
            <td>{!! $informations->content !!}</td>
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
    @endforeach
    </tbody>
</table>