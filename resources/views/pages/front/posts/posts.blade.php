@extends("layouts.appFront")

@section("title", " Blog | zakialawi")
@section("meta_description", "Blog of zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Blog | zakialawi.my.id")
@section("og_description", "Blog of zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")

    <!-- HERO BLOG -->
    @include("components.front.heroBlogSearch")

    <main class="w-full">
        <!-- Sticky/Featured/Popular Blog Post -->
        @unless ((request()->has("search") && request()->get("search") != "") || (request()->has("page") && request()->get("page") != 1))
            <div class="pt-4 pb-0">
                <div class="px-3 mx-auto 2xl:container sm:px-4 xl:px-2">
                    <!-- big grid 1 -->
                    <div class="flex flex-row flex-wrap">
                        <!--Start left cover-->
                        <div class="flex-shrink w-full max-w-full pb-1 lg:w-1/2 lg:pb-0 lg:pr-1">
                            @foreach ($featured->take(1) as $article)
                                <div class="relative overflow-hidden hover-img h-full max-h-[25rem]">
                                    <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                        <img class="w-full h-auto max-w-full mx-auto" src="{{ asset($article->cover) }}" alt="{{ $article->title }}" loading="lazy" onerror="this.onerror=null;this.src='http://personal-blog-laravel.test/assets/img/image-placeholder.png';">
                                    </a>
                                    <div class="absolute bottom-0 w-full px-5 pb-5">
                                        <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}">
                                            <h2 class="mb-3 text-3xl font-bold capitalize line-clamp-2 text-light hover:text-info">{{ $article->title }}</h2>
                                        </a>
                                        <p class="line-clamp-3 text-base-100 sm:inline-block">{{ $article->excerpt }}</p>
                                        <div class="pt-2">
                                            <div class="text-base-100">
                                                <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>{{ $article->published_at->format("F j, Y") }}
                                                <div class="inline-block h-3 ml-2 mr-2 border-l-2 border-accent"></div>{{ $article->category->category ?? $article->category_id }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--Start box news-->
                        <div class="flex-shrink w-full max-w-full lg:w-1/2">
                            <div class="flex flex-row flex-wrap">
                                @foreach ($featured->skip(1)->take(4) as $article)
                                    <article class="flex-shrink w-full max-w-full px-1 pb-1 my-1 sm:w-1/2">
                                        <div class="relative h-full overflow-hidden hover-img max-h-48">
                                            <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}">
                                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                                <img class="w-full h-auto max-w-full mx-auto" src="{{ asset($article->cover) }}" alt="{{ $article->title }}" loading="lazy" onerror="this.onerror=null;this.src='http://personal-blog-laravel.test/assets/img/image-placeholder.png';">
                                            </a>
                                            <div class="absolute bottom-0 w-full px-4 pb-4">
                                                <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}">
                                                    <h2 class="mb-1 text-lg font-bold leading-tight capitalize line-clamp-3 text-light hover:text-info">{{ $article->title }}</h2>
                                                </a>
                                                <div class="pt-1">
                                                    <div class="text-base-100">
                                                        <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>{{ $article->published_at->format("F j, Y") }}
                                                        <div class="inline-block h-3 ml-2 mr-2 border-l-2 border-accent"></div>{{ $article->category->category ?? $article->category_id }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endunless


        <!-- Recent Blog Post -->
        <section class="container px-6 py-10 fluid md:px-4">
            <div class="mb-6 text-3xl font-semibold">
                <h2>{{ request()->has("search") && request()->get("search") != "" ? "Search Result" : "Recent Post" }}</h2>
                <div class="w-[50%] md:w-[84%] -translate-y-4 float-end h-[4px] bg-gradient-to-r from-transparent to-secondary -z-1"></div>
            </div>

            @if ($articles->count() == 0)
                <p class="my-2 ">No Article Posts Available</p>
            @else
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($articles as $article)
                        <article>
                            <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset($article->cover) }}" alt="{{ $article->title }}" loading="lazy" onerror="this.onerror=null;this.src='http://personal-blog-laravel.test/assets/img/image-placeholder.png';">

                            <div class="mt-4">
                                <span class="uppercase text-primary">{{ $article->category->category ?? $article->category_id }}</span>

                                <h1 class="mt-4 text-xl font-semibold text-dark hover:underline hover:text-muted">
                                    <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}">
                                        {{ $article->title }}
                                    </a>
                                </h1>

                                <p class="mt-2 text-muted line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>

                                <div class="flex items-center justify-between mt-4">
                                    <div>
                                        <a href="{{ route("article.user", $article->user->username) }}" class="text-lg font-medium text-accent hover:text-info">
                                            {{ $article?->user?->username }}
                                        </a>

                                        <p class="text-sm text-muted">{{ $article->published_at->format("F j, Y") }}</p>
                                    </div>

                                    <a href="{{ route("article.show", ["year" => $article->published_at->format("Y"), "slug" => $article->slug]) }}" class="inline-block underline text-primary hover:text-accent">Read more</a>
                                </div>

                            </div>
                        </article>
                    @endforeach
                </div>
            @endif

            <div class="my-8 mt-20">
                {{ $articles->links() }}
            </div>
        </section>



    </main>

    <!-- Footer -->
    @include("components.front.footer")
@endsection

@push("javascript")
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchParam = urlParams.get('search');
            console.log(searchParam);
            if (searchParam) {
                document.querySelector('#search').value = searchParam;
            }
        });
    </script>
@endpush
