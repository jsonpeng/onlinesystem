<table class="table table-responsive" id="attachInformations-table">
    <thead>
        <tr>
        <th>类型</th>
        <th>内容</th>
        <th>题目</th>
        <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($attachInformations as $attachInformations)
    <?php $infos=$attachInformations->infos; ?>
        <tr>
            <td>{!! $attachInformations->type !!}</td>
            <td>{!! $attachInformations->content !!}</td>
            <td>@if(!empty($infos)) <a href="{!! route('informations.edit', [$infos->id]) !!}" target="_blank">{!! $infos->title !!}</a>@endif</td>
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