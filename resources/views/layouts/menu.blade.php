@include('partials.filename', ['data' => $data])
<li class="{{ Request::is('ambulances*') ? 'active' : '' }}">
    <a href="{{ route('ambulances.index') }}"><i class="fa fa-edit"></i><span>Ambulances</span></a>
</li>

