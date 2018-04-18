<li class="{{ Request::is('informations*') ? 'active' : '' }}">
    <a href="{!! route('informations.index') !!}"><i class="fa fa-edit"></i><span>题库列表</span></a>
</li>

<li class="{{ Request::is('attachInformations*') ? 'active' : '' }}">
    <a href="{!! route('attachInformations.index') !!}"><i class="fa fa-edit"></i><span>选项列表</span></a>
</li>



<li class="{{ Request::is('recountInformations*') ? 'active' : '' }}">
    <a href="{!! route('recountInformations.index') !!}"><i class="fa fa-edit"></i><span>答题记录</span></a>
</li>

<li class="{{ Request::is('results*') ? 'active' : '' }}">
    <a href="{!! route('results.index') !!}"><i class="fa fa-edit"></i><span>答题结果</span></a>
</li>

