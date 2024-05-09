@extends("layouts.appFront")

@section("title", "{$article->title} | zakialawi")
@section("meta_description", "$article->excerpt ")
@section("meta_author", "zakialawi")

@section("og_title", "{$article->title} | zakialawi.my.id")
@section("og_description", "$article->excerpt")
@section("og_image", asset("assets/img/{$article->cover}"))

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")

    <main class="container w-full p-6 md:p-10">

        <div class="mt-14">

            <div id="breadcrumb" class="">
                <nav aria-label="breadcrumb">
                    <ol class="flex flex-row flex-wrap items-center">
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="/">Home</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ route("article.index") }}">Blog</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ route("article.year", request()->segment(2)) }}">{{ request()->segment(2) }}</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ route("article.category", $article->category->slug) }}">{{ $article->category->category }}</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent" aria-current="page" href="{{ route("article.show", ["year" => request()->segment(2), "slug" => $article->slug]) }}">{{ $article->title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div id="main" class="flex flex-col flex-wrap flex-auto flex-grow gap-4 md:flex-row text-dark">
                <div id="post" class="w-full md:w-[60%] md:flex-grow">
                    <div id="main-content" class="">
                        <div id="post-header" class="py-1 my-2 mb-3">
                            <h1 class="mb-2 text-3xl font-bold">{{ $article->title }}</h1>
                            <div class="inline-flex items-center">
                                <a href="{{ route("article.user", $article->user->username) }}" class="inline-flex items-center after:content-['.'] after:mx-2 after:top-[-3px] after:relative after:px-1 after:font-black after:text-secondary  hover:text-primary gap-1" target="_blank">
                                    <img class="w-6" src="{{ $article->user->profile_photo_path }}" alt="author {{ $article->user->username }}">{{ $article->user->username }}
                                </a>
                                <a href="{{ route("article.month", ["year" => $article->published_at->format("Y"), "month" => $article->published_at->format("m")]) }}" class="hover:text-primary" target="_blank">{{ $article->published_at->format("d M Y") }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="feature-image" class="mb-3">
                        <img class="max-h-[26rem] w-full rounded-lg object-cover object-center" src="{{ asset($article->cover) }}" alt="{{ $article->title }}" loading="lazy" onerror="this.onerror=null;this.src='http://personal-blog-laravel.test/assets/img/image-placeholder.png';">
                    </div>
                    <div id="post-content" class="text-lg">

                        {!! $article->content !!}

                    </div>

                    <div class="py-1 my-2 border-b-2 border-dark border-opacity-40"></div>

                    <div class="post-bottom">
                        <div class="flex items-center justify-between text-secondary">
                            <div class="">
                                <!-- tags -->
                                <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Trending</a>
                                <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Video</a>
                                <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Featured</a>
                            </div>
                            <div class="text-2xl">
                                <p class="text-sm">Share:</p>
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    <a class="a2a_button_telegram"></a>
                                    <a class="a2a_button_x"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>

                    <div id="author">

                    </div>

                </div>

                <div id="sidebar" class="w-full md:w-[30%] mt-10 md:mt-0">
                    <div id="popular-posts" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                        <div class="text-xl font-bold text-center">
                            <h3>Popular Posts</h3>
                        </div>
                        <div class="p-2 mx-auto">

                            <article>
                                <div class="flex items-center gap-2 p-2">
                                    <a href="#" class="block mr-2 shrink-0">
                                        <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                    </a>

                                    <div>
                                        <h3 class="font-medium sm:text-lg line-clamp-2">
                                            <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                        </h3>

                                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                            <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article>
                                <div class="flex items-center gap-2 p-2">
                                    <a href="#" class="block mr-2 shrink-0">
                                        <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                    </a>

                                    <div>
                                        <h3 class="font-medium sm:text-lg line-clamp-2">
                                            <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                        </h3>

                                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                            <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article>
                                <div class="flex items-center gap-2 p-2">
                                    <a href="#" class="block mr-2 shrink-0">
                                        <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                    </a>

                                    <div>
                                        <h3 class="font-medium sm:text-lg line-clamp-2">
                                            <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                        </h3>

                                        <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                            <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                    <div id="categories" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                        <div class="text-xl font-bold text-center">
                            <h3>Categories</h3>
                        </div>
                        <div class="p-2 mx-auto">
                            <ul class="flex flex-col gap-4 p-2 font-semibold">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route("article.category", $category->slug) }}" class="hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>{{ $category->category }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>

    <!-- Footer -->
    @include("components.front.footer")
@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush
