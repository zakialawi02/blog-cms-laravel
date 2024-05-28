<header>
    <div x-data="{ isOpen: false }" class="z-10 flex items-center justify-between w-full px-6 min-h-20 md:px-14 bg-base-100">
        <div id="logo-nav" class="max-w-[15rem] text-dark font-semibold uppercase">
            <a href="{{ route("article.index") }}" class="inline-flex items-center text-xl ">
                <img src="{{ asset("assets/img/logoo.png") }}" alt="Logo" class="w-8 h-8">
                <span class="px-2 ">Blog</span>
            </a>
        </div>

        <div @click="isOpen = !isOpen" @click.away="isOpen = false" class="text-xl font-medium md:hidden" id="hamburger">
            <button id="ham-btn">
                <i class="ri-close-line" x-show="isOpen"></i>
                <i class="ri-menu-line" x-show="!isOpen"></i>
            </button>
        </div>


        <nav :class="[isOpen ? 'block' : 'hidden md:flex']" id="nav-menu"
            class="absolute items-start md:items-center left-0 right-0 flex flex-col p-3 text-[1.1rem] md:w-[50rem] md:flex-wrap lg:w-full md:justify-end font-semibold md:relative top-20 md:flex-row md:opacity-100 md:top-0 md:p-0 text-dark uppercase bg-base-100 md:bg-transparent z-10">
            @foreach (\App\Models\MenuItem::whereNull("parent_id")->with("children")->where("class", "header")->orderBy("order")->get() as $menuItem)
                @if ($menuItem->children->isNotEmpty())
                    <div class="relative py-2 group">
                        <a class="p-2 duration-300 cursor-pointer hover:text-accent">{{ $menuItem->name }}</a>
                        <div class="absolute hidden py-1 mt-2 bg-white rounded shadow-lg min-w-48 left-4 group-hover:block">
                            @foreach ($menuItem->children as $child)
                                <a class="block px-4 py-2 text-gray-800 hover:bg-base-100 hover:text-accent" href="{{ $child->url }}">{{ $child->name }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a class="p-2 duration-300 hover:text-accent" href="{{ $menuItem->url }}">{{ $menuItem->name }}</a>
                @endif
            @endforeach

            <div class="flex flex-col items-start gap-2 ml-2 md:items-center md:flex-row">
                @auth
                    <a class="p-1 px-4 text-white duration-300 border-2 bg-accent border-accent rounded-xl hover:bg-light hover:text-accent" title="Dashboard" href="{{ route("dashboard") }}"><i class="ri-function-line"></i></a>
                    <a class="p-1 px-4 duration-300 border-2 text-secondary border-secondary rounded-xl hover:border-error hover:text-error" title="Logout" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="ri-logout-box-r-line"></i></a>
                    <form id="logout-form" action="{{ route("logout") }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="inline-flex p-1 px-4 duration-300 border-2 text-primary border-primary rounded-xl hover:bg-info hover:border-info hover:text-light" title="Login" href="{{ route("login") }}"><i class="ri-lock-2-fill"></i> Login</a>
                    @endif
                </div>
            </nav>
        </div>

    </header>
