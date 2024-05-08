<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route("dashboard") }}" class="waves-effect">
                <i class="ri-dashboard-line"></i><span class="float-right badge badge-pill badge-success">3</span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route("admin.posts.index") }}" class=" waves-effect">
                <i class="ri-booklet-line"></i>
                <span>Posts</span>
            </a>
        </li>

        <li>
            <a href="{{ route("admin.categories.index") }}" class=" waves-effect">
                <i class="ri-folder-reduce-line"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="">
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-bar-chart-box-line"></i>
                <span>Statistics Views</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route("admin.posts.statsview") }}">Articles Posts</a></li>
                <li><a href="{{ route("admin.posts.statslocation") }}">By Country</a></li>
            </ul>
        </li>

        <li class="menu-title">Users</li>

        <li>
            <a href="{{ route("admin.users.index") }}" class=" waves-effect">
                <i class="ri-folder-user-line"></i>
                <span>Users Management</span>
            </a>
        </li>

        <li class="menu-title">Pages</li>

        <li class="">
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-account-circle-line"></i>
                <span>Authentication</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="auth-login.html">Login</a></li>
                <li><a href="auth-register.html">Register</a></li>
            </ul>
        </li>

    </ul>
</div>
