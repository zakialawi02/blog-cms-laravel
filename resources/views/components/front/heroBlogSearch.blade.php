<!-- HERO BLOG SEARCH -->
<section class="w-full p-3 bg-gradient-to-tr from-primary to-secondary min-h-[40vh]">
    <div class="container py-8 mx-auto text-center uppercase pt-18 text-light">
        <h1 class="px-3 mb-3 text-3xl font-bold">Blog{{ !request()->segment(2) ? ": All Posts" : ": by Category " . request()->segment(3) }}</h1>
        <p class="capitalize w-[80%] md:w-[50%] px-3 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam cum magni, ipsum facilis fugiat voluptatibus.</p>
    </div>
    <div class="w-full max-w-lg m-3 mx-auto">
        <form action="{{ url()->current() }}" id="search-blog" class="">
            <div class="flex items-center px-1 overflow-hidden bg-white rounded-md shadow ">
                <input type="search" placeholder="Search" class="px-3 py-3.5 text-dark w-full text-base border-0 ring-0 bg-light outline-none focus:ring-0" id="search" name="search">
                <button type="submit" class="px-3 py-2 font-semibold transition-all duration-500 rounded text-light bg-secondary hover:bg-primary"><i class="ri-search-line"></i></button>
            </div>
        </form>
        @if (request()->has("search") && request()->get("search") != "")
            <p class="my-2 text-light">You Serch: {{ request()->get("search") }}</p>
        @endif
    </div>
</section>
