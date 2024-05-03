@extends("layouts.appFront")

@section("title", " Blog | zakialawi")
@section("meta_description", "Blog of zakialawi.my.id website")
@section("meta_author", "zakialawi")


@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")

    <!-- HERO BLOG -->
    <section class="w-full p-3 bg-gradient-to-tr from-primary to-secondary min-h-[40vh]">
        <div class="container py-8 mx-auto text-center uppercase pt-18 text-light">
            <h1 class="px-3 mb-3 text-3xl font-bold">Blog</h1>
            <p class="capitalize w-[80%] md:w-[50%] px-3 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam cum magni, ipsum facilis fugiat voluptatibus.</p>
        </div>
        <div class="w-full max-w-lg m-3 mx-auto">
            <form id="search-blog" method="get" class="" x-data="{ search: '' }">
                <div class="flex items-center px-1 overflow-hidden bg-white rounded-md shadow ">
                    <input type="search" placeholder="Search" class="px-3 py-3.5 text-dark w-full text-base border-0 ring-0 bg-light outline-none focus:ring-0" x-model="search">
                    <button type="submit" class="px-3 py-2 font-semibold transition-all duration-500 rounded text-light " :class="(search) ? 'bg-secondary hover:bg-primary' : 'bg-muted cursor-not-allowed'" :disabled="!search"><i class="ri-search-line"></i></button>
                </div>
            </form>
            <p class="my-2 text-light">You Serch: keyword</p>
        </div>
    </section>

    <main class="w-full">
        <!-- Sticky/Featured/Popular Blog Post -->
        <div class="pt-4 pb-0">
            <div class="px-3 mx-auto xl:container sm:px-4 xl:px-2">
                <!-- big grid 1 -->
                <div class="flex flex-row flex-wrap">
                    <!--Start left cover-->
                    <div class="flex-shrink w-full max-w-full pb-1 lg:w-1/2 lg:pb-0 lg:pr-1">
                        <div class="relative overflow-hidden hover-img max-h-[25rem]">
                            <a href="#">
                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                <img class="w-full h-auto max-w-full mx-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img1.jpg" alt="Image description">
                            </a>
                            <div class="absolute bottom-0 w-full px-5 pb-5">
                                <a href="#">
                                    <h2 class="mb-3 text-3xl font-bold capitalize text-light hover:text-info">Amazon Shoppers Are Ditching Designer Belts for This Best-Selling</h2>
                                </a>
                                <p class="hidden text-base-100 sm:inline-block">This is a wider card with supporting text below as a natural lead-in to additional content. This very helpfull for generate default content..</p>
                                <div class="pt-2">
                                    <div class="text-base-100">
                                        <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>Europe
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Start box news-->
                    <div class="flex-shrink w-full max-w-full lg:w-1/2">
                        <div class="flex flex-row flex-wrap">
                            <article class="flex-shrink w-full max-w-full px-1 pb-1 my-1 sm:w-1/2">
                                <div class="relative overflow-hidden hover-img max-h-48">
                                    <a href="#">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                        <img class="w-full h-auto max-w-full mx-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img2.jpg" alt="Image description">
                                    </a>
                                    <div class="absolute bottom-0 w-full px-4 pb-4">
                                        <a href="#">
                                            <h2 class="mb-1 text-lg font-bold leading-tight capitalize text-light hover:text-info">News magazines are becoming obsolete, replaced by gadgets</h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-base-100">
                                                <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>Techno
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="flex-shrink w-full max-w-full px-1 pb-1 my-1 sm:w-1/2">
                                <div class="relative overflow-hidden hover-img max-h-48">
                                    <a href="#">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                        <img class="w-full h-auto max-w-full mx-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img3.jpg" alt="Image description">
                                    </a>
                                    <div class="absolute bottom-0 w-full px-4 pb-4">
                                        <a href="#">
                                            <h2 class="mb-1 text-lg font-bold leading-tight capitalize text-light hover:text-info">Minimalist designs are starting to be popular with the next generation</h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-base-100">
                                                <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>Architecture
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="flex-shrink w-full max-w-full px-1 pb-1 my-1 sm:w-1/2">
                                <div class="relative overflow-hidden hover-img max-h-48">
                                    <a href="#">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                        <img class="w-full h-auto max-w-full mx-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img4.jpg" alt="Image description">
                                    </a>
                                    <div class="absolute bottom-0 w-full px-4 pb-4">
                                        <a href="#">
                                            <h2 class="mb-1 text-lg font-bold leading-tight capitalize text-light hover:text-info">Tips for decorating the interior of the living room</h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-base-100">
                                                <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>Interior
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="flex-shrink w-full max-w-full px-1 pb-1 my-1 sm:w-1/2">
                                <div class="relative overflow-hidden hover-img max-h-48">
                                    <a href="#">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-cover"></div>
                                        <img class="w-full h-auto max-w-full mx-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img5.jpg" alt="Image description">
                                    </a>
                                    <div class="absolute bottom-0 w-full px-4 pb-4">
                                        <a href="#">
                                            <h2 class="mb-1 text-lg font-bold leading-tight capitalize text-light hover:text-info">Online taxi users are increasing drastically ahead of the new year</h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-base-100">
                                                <div class="inline-block h-3 mr-2 border-l-2 border-accent"></div>Lifestyle
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Blog Post -->
        <section class="container px-6 py-10 mx-auto md:px-4">
            <div class="mb-6 text-3xl font-semibold">
                <h2>Recent Post</h2>
                <div class="w-[50%] md:w-[84%] -translate-y-4 float-end h-[4px] bg-gradient-to-r from-transparent to-secondary -z-1"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $article)
                    <article>
                        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ asset("assets/img/{$article->cover}") }}" alt="">

                        <div class="mt-4">
                            <span class="uppercase text-primary">{{ $article->category->category }}</span>

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