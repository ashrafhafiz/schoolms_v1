@php
$route_name = Route::current()->getName();
$route_prefix_name = Request::route()->getPrefix();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="logo">
                        <h3><b>SMS</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class=" {{ $route_name == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Manage Users --}}
            <li class="treeview {{ $route_prefix_name == '/users' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('users.view') }}"><i class="ti-more"></i>View Users</a>
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}"><i class="ti-more"></i>Add User</a>
                    </li>
                </ul>
            </li>
            {{-- End Manage Users --}}


            {{-- Manage Profile --}}
            <li class="treeview {{ $route_prefix_name == '/profile' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="folder"></i>
                    <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('profile.view') }}"><i class="ti-more"></i>Update Your Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.password.view') }}"><i class="ti-more"></i>Change Password</a>
                    </li>
                </ul>
            </li>
            {{-- End Manage Profile --}}

            {{-- Setup Management --}}
            <li class="treeview {{ $route_prefix_name == '/setup' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="settings"></i>
                    <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('setup.student.class.view') }}"><i class="ti-more"></i>Student Class</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.student.year.view') }}"><i class="ti-more"></i>Student Year</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.student.group.view') }}"><i class="ti-more"></i>Student Group</a>
                    </li>
                    <li>
                        <a href="{{ route('setup.student.shift.view') }}"><i class="ti-more"></i>Student Shift</a>
                    </li>
                </ul>
            </li>
            {{-- End Setup Management --}}


            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i>
                    <span>Mailbox</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
                    <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a>
                    </li>
                    <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a>
                    </li>
                </ul>
            </li>


            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a>
                    </li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a>
                    </li>
                </ul>
            </li>


            <li class="header nav-small-cap">EXTRA</li>


            <li>
                <a href="{{ route('admin.logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
