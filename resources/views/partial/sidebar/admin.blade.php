<li>
    @php($activeUrl = 'admin/dashboard')
    <a class="{{ $activeUrl != $routeName ?: 'active' }}" href="{{ url($activeUrl) }}">
        <i class="glyphicon glyphicon-dashboard"></i>&nbsp Dashboard
    </a>
</li>
<li>
    @php($activeUrl = 'admin/dentists')
    <a class="{{ $activeUrl != $routeName ?: 'active' }}" href="{{ url($activeUrl) }}">
        <i class="glyphicon glyphicon-user"></i>&nbsp Dentists
    </a>
</li>
<li>
    @php($activeUrl = 'admin/staffs')
    <a class="{{ $activeUrl != $routeName ?: 'active' }}" href="{{ url($activeUrl) }}">
        <i class="glyphicon glyphicon-modal-window"></i>&nbsp Staffs
    </a>
</li>
<li>
    @php($activeUrl = 'admin/branches')
    <a class="{{ $activeUrl != $routeName ?: 'active' }}" href="{{ url($activeUrl) }}">
        <i class="glyphicon glyphicon-map-marker"></i>&nbsp Branches
    </a>
</li>
<li>
    <a href="#"><i class="glyphicon glyphicon-list-alt"></i>&nbsp Reports</a>
</li>
<li>
    <a href="#"><i class="glyphicon glyphicon-log-out"></i>&nbsp Logout</a>
</li>