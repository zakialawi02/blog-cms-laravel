<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route("dashboard") }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                {{-- <span class="float-right badge badge-pill badge-success">3</span> --}}
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->role == "admin" || Auth::user()->role == "writer")
            <li>
                <a href="{{ route("admin.posts.index") }}" class=" waves-effect">
                    <i class="ri-booklet-line"></i>
                    <span>Posts</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == "admin")
            <li>
                <a href="{{ route("admin.pages.index") }}" class=" waves-effect">
                    <i class="ri-pages-line"></i>
                    <span>Pages</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.categories.index") }}" class=" waves-effect">
                    <i class="ri-folder-reduce-line"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.tags.index") }}" class=" waves-effect">
                    <i class="ri-price-tag-3-line"></i>
                    <span>Tags</span>
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route("admin.mycomments.index") }}" class="waves-effect">
                <i class="ri-message-2-line"></i>
                <span>My Comments</span>
            </a>
        </li>

        @if (Auth::user()->role == "admin" || Auth::user()->role == "writer")
            <li>
                <a href="{{ route("admin.comments.index") }}" class="waves-effect">
                    <i class="ri-discuss-line"></i>
                    <span>Comments</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.myfiles") }}" class="waves-effect">
                    <i class="ri-folder-open-line"></i>
                    <span>My Files</span>
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
        @endif

        <li class="menu-title">Management</li>
        <li>
            <a href="{{ route("admin.notifications") }}" class=" waves-effect">
                <i class="ri-notification-badge-line"></i>
                <span>Notifications</span>
            </a>
        </li>
        @if (Auth::user()->role == "admin")
            <li>
                <a href="{{ route("admin.menu-items.index") }}" class=" waves-effect">
                    <i class="ri-menu-2-line"></i>
                    <span>Menu</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.users.index") }}" class=" waves-effect">
                    <i class="ri-folder-user-line"></i>
                    <span>Users Management</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.newsletter.index") }}" class=" waves-effect">
                    <i class="ri-news-line"></i>
                    <span>Newsletters</span>
                </a>
            </li>
        @endif

    </ul>
</div>
