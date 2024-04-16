<header>
    <nav x-data="{ isOpen: false }" class="flex items-center justify-between w-full h-20 px-12 md:px-16 bg-primary">
        <div class="max-w-[15rem]">
            <a href="#" class="inline-flex items-center text-xl font-medium">
                <img src="{{ asset('assets/img/thumbs.png') }}" alt="Logo" class="w-8 h-8">
                <span class="px-2 ">Laravel Blog</span>
            </a>
        </div>

        <div @click="isOpen = !isOpen" @click.away="isOpen = false" class="text-xl font-medium md:hidden" id="hamburger">
            <button id="ham-btn">
                <i class="ri-close-line" x-show="isOpen"></i>
                <i class="ri-menu-line" x-show="!isOpen"></i>
            </button>
        </div>


        <div :class="[isOpen ? 'translate-y-0 opacity-100 ' : 'opacity-0 -translate-y-0']" id="nav-menu"
            class=" absolute left-0 right-0 flex flex-col p-3 text-[1.1rem] font-medium md:relative bg-primary top-20 md:flex-row md:opacity-100 md:top-0 md:p-0 text-light ">
            <a class="p-2 duration-300 hover:text-secondary" href="/">Home</a>
            <a class="p-2 duration-300 hover:text-secondary" href="#">About</a>
            <a class="p-2 duration-300 hover:text-secondary" href="#">Contact</a>
            <div class="flex flex-col items-start gap-2 ml-2 md:items-center md:flex-row">
                <a class="p-1 px-4 duration-300 border-2 border-secondary rounded-xl hover:bg-light hover:text-secondary bg-secondary"
                    href="#">Gallery</a>
                <a class="p-1 px-4 text-white duration-300 border-2 border-secondary rounded-xl hover:bg-light hover:text-secondary"
                    href="#"><i class="ri-lock-2-fill"></i> Login</a>
            </div>
        </div>
    </nav>

</header>
