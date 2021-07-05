<img class="rounded d-block" src="{{ asset('images/Logo.jpg') }}" width="75%" />
@hasrole('Administrator')
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('todo') }}'><i class='nav-icon la la-question'></i>
        To Do List</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('notification') }}'><i class='nav-icon la la-warning'></i> Notifications</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('trading_account') }}'><i class='nav-icon la la-bar-chart'></i> Trading Accounts</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('support_ticket') }}'><i class='nav-icon la la-support'></i> Service request</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('timer') }}'><i class='nav-icon la la-book'></i>
        Log In Tracker</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('issue') }}'><i class='nav-icon la la-ticket'></i>
        Report Issues</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('deposit') }}'><i class='nav-icon la la-question'></i>
        Transaction Logs</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('portfolio') }}'><i class='nav-icon la la-question'></i>
        Portfolio Cabinet</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
                <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> Settings</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('todos_category') }}'><i class='nav-icon la la-question'></i> TODO categories</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('support_ticket_category') }}'><i class='nav-icon la la-question'></i> Service req. categories</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i>
                Backups</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i>
                Logs</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i>
                <span>Settings</span></a></li>
    </ul>
</li>
@endhasrole

@hasrole('User')
<li class='nav-item'><a class='nav-link' href='{{ route('notifications') }}'><i class='nav-icon la la-warning'></i> My Notifications</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('issues') }}'><i class='nav-icon la la-question'></i>
        My Issues</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('requests') }}'><i class='nav-icon la la-ticket'></i>
        My Requests</a></li>
<li class='nav-item'><a class='nav-link' href='{{ route('accounts') }}'><i class='nav-icon la la-book'></i>
        My Accounts</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ route('logins') }}'><i class='nav-icon la la-terminal'></i>
                Log In Tracker
        </a></li>
@endhasrole
