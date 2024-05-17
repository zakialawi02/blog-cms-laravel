@extends("layouts.appFront")

@section("title", "Posts in " . request()->segment(3) . " | zakialawi")
@section("meta_description", "Blog posts of " . request()->segment(3) . " on the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Posts in " . request()->segment(3) . " | zakialawi.my.id")
@section("og_description", "Blog posts of " . request()->segment(3) . " on the zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")


    <main class="w-full">
        <!-- Recent Blog Post -->
        <section class="container px-6 py-10 md:px-4">
            <div class="mb-6 text-3xl font-semibold">
                <h2>
                    {{ request()->has("search") && request()->get("search") != "" ? "Search Result" : "Archive: " . request()->segment(3) }}
                </h2>
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
                                            {{ $article->user->username }}
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
        // code here
    </script>
@endpush
